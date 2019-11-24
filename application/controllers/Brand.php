<?php

class Brand extends CI_Controller
{
	
	public function index()
	{
			if(adminLoggedIn())
			{
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/brands/newBrand');
					$this->load->view('admin/header/footer');

			}else
			{
				setFlashData('alert-danger','Please Login..','admin/login');
			}	
	}
	public function addBrand()
	{
		if(adminLoggedIn())
		{
			$data['b_name'] = $this->input->post('brandName',true);
			if(!empty($data['b_name']))
			{
				$path = realpath(APPPATH.'../assets/images/brands');
				$config['upload_path'] = $path;
				$config['max_size'] = 1000;
				$config['allowed_types'] = 'gif|png|jpg|jpeg';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('brandDp'))
				{
					$error = $this->upload->display_errors();
					setFlashData('alert-danger',$error,'Brand/index');
				}else
				{
					$fileName = $this->upload->data();
					$data['b_image'] = $fileName['file_name'];
					$data['date'] = date('Y-M-d h:i:sa');
					$data['posted_by'] = getAdminName();
				}
				$addData = $this->modBrand->checkBrand($data);
				if ($addData->num_rows() >0) {
					setFlashData('alert-danger','Brand Already Exists.','Brand/index');
				}else
				{
						$addData = $this->modBrand->addBrand($data);
						if($addData)
						{
							setFlashData('alert-success','You have Sucessfully Added Your Brand.','Brand/index');
						}else
						{
							setFlashData('alert-danger','You Can\'t Add Your Brand Right Now.','Brand/index');
						}
				}
				
			}else{
				setFlashData('alert-warning','Brand Name is Required','Brand/index');
			}

		}else{
			setFlashData('alert-warning','Please Login First to add your Brands','admin/login');
		}
	}
	public function allBrands()
	{
		if (adminLoggedIn()) {
			$config['base_url'] = site_url('Brand/allBrands');
			$totalRows = $this->modBrand->getAllBrands();
			$config['total_rows'] = $totalRows;
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['allBrands'] = $this->modBrand->fetchAllBrands($config['per_page'],$page);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('admin/header/header');
			$this->load->view('admin/header/css');
			$this->load->view('admin/header/navtop');
			$this->load->view('admin/header/navleft');
			$this->load->view('admin/brands/allBrands',$data);
			$this->load->view('admin/header/footer');
		} else {
			setFlashData('alert-warning','Please Login First .','admin/login');
		}
		
	}
	public function editBrand($bId)
	{
		if(adminLoggedIn())
		{
			if (!empty($bId) && isset($bId)) {
				$data['brands'] = $this->modBrand->checkBrandById($bId);
				if (count($data['brands']) == 1) {
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/brands/editBrand',$data);
					$this->load->view('admin/header/footer');
				} else {
					setFlashData('alert-danger','Brand Not Found','Brand/index');
				}	
			} else {
				setFlashData('alert-danger','Something Went Wrong','Brand/index');
			}
			

		}else
		{
			setFlashData('alert-warning','Please Login First then Edit Cateogry','admin/login');
		}
	}
	public function updateBrand()
	{
		if (adminLoggedIn()) {
		$data['b_name'] = $this->input->post('brandName',true);
		$bId = $this->input->post('xid',true);
		$oldImg = $this->input->post('oldImgs',true);
		if (!empty($data['b_name']) && isset($data['b_name'])) {
			if(isset($_FILES['brandDp']) && is_uploaded_file($_FILES['brandDp']['tmp_name'])){
				$path = realpath(APPPATH.'../assets/images/brands');
				$config['upload_path'] = $path;
				$config['max_size'] = 1000;
				$config['allowed_types'] = 'gif|png|jpg|jpeg';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('brandDp'))
				{
					$error = $this->upload->display_errors();
					setFlashData('alert-danger',$error,'Brand/allBrands');
				}else
				{
					$fileName = $this->upload->data();
					$data['b_image'] = $fileName['file_name'];
				}
			}//images checking here
			$addData = $this->modBrand->checkBrand($data);
			if ($addData->num_rows() >0) {
				setFlashData('alert-danger','Brand Already Exists.','Brand/index');
			}else
			{
			$reply = $this->modBrand->updateBrand($data,$bId);
			if ($reply) {
				if (!empty($data['b_image']) && isset($data['b_image'])) {
					if (file_exists($path.'/'.$oldImg)) {
						unlink($path.'/'.$oldImg);
					} else {
						setFlashData('alert-danger','Something Went Wrong.','Brand/allBrands');
					}	
				} 
				setFlashData('alert-success','Brand Name Sucessfully Updated','Brand/allBrands');
				
			} else {
				setFlashData('alert-danger','You Can\'t Update Brand Right Now.','Brand/allBrands');
			}
			}
		} else {
			setFlashData('alert-danger','Brand Name Must Be Required.','Brand/allBrands');
		}
		
		} else {
			setFlashData('alert-warning','Please Login First then Edit Brand','admin/login');
		}
		
	}
	public function deleteBrand()
	{
		if (adminLoggedIn()) {
			if ($this->input->is_ajax_request()) {
				$this->input->post('id',true);
				$bId = $this->input->post('text',true);
				if (!empty($bId) && isset($bId)) {
					$bId = $this->encryption->decrypt($bId);
					$oldImg = $this->modBrand->getBrandImage($bId);
						if(!empty($oldImg) && count($oldImg) == 1){
							$realImage = $oldImg[0]['b_image'];
						}
					$checkMd = $this->modBrand->deleteBrand($bId);
					if ($checkMd) {
							if(!empty($realImage) && isset($realImage))
							{
								$path = realpath(APPPATH.'../assets/images/brands/');
								if(file_exists($path.'/'.$realImage)){
									unlink($path.'/'.$realImage);
								}
							}
						$data['return'] = true;
						$data['message'] = 'Sucessfully Deleted';
						echo json_encode($data);
					} else {
						$data['return'] = false;
						$data['message'] = 'You Can\'t Delete your Brands Right Now.';
						echo json_encode($data);
						}
				} else {
						$data['return'] = false;
						$data['message'] = 'Value Not Exists.';
						echo json_encode($data);
					
				}	
			} else {
				setFlashData('alert-warning','Something Went Wrong.','Brand');
			}	
		} else {
			setFlashData('alert-warning','Please Login First then Delete Brand','admin/login');
		}
	}
	  public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}