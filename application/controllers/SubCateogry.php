<?php 
class SubCateogry extends CI_Controller
{
	public function newSubCateogry()
	{
		if(adminLoggedIn())
		{
					$data['cateogries'] = $this->modAdmin->getCateogries();
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/home/newSubCateogry',$data);
					$this->load->view('admin/header/footer');
		}else
		{
			setFlashData('alert-warning','Please Login First.','admin/login');
		}
	}
	public function addsubCateogry()
	{
		if(adminLoggedIn())
		{
			$data['subcat_name'] = $this->input->post('subcatName',true);
			$data['cat_name'] = $this->input->post('subcatId',true);

			if(!empty($data['subcat_name']) && !empty($data['cat_name']))
			{
				$path = realpath(APPPATH.'../assets/images/subcateogries');
				$config['upload_path'] = $path;
				$config['max_size'] = 1000;
				$config['allowed_types'] = 'gif|png|jpg|jpeg';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('subcatDp'))
				{
					$error = $this->upload->display_errors();
					setFlashData('alert-danger',$error,'SubCateogry/newSubCateogry');
				}else
				{
					$fileName = $this->upload->data();
					$data['subcat_img'] = $fileName['file_name'];
					$data['date'] = date('Y-M-d h:i:sa');
					$data['posted_by'] = getAdminName();
				}
				$addData = $this->modSubCateogry->checksubCateogry($data);
				if ($addData->num_rows() >0) {
					setFlashData('alert-danger','Sub cateogries Already Exists.','SubCateogry/newSubCateogry');
				}else
				{
						$addsubData = $this->modSubCateogry->addsubCateogry($data);
						if($addsubData)
						{
							setFlashData('alert-success','You have Sucessfully Added Your Sub Cateogry.','SubCateogry/newSubCateogry');
						}else
						{
							setFlashData('alert-danger','You Can\'t Add Your Sub Cateogry Right Now.','SubCateogry/newSubCateogry');
						}
				}
				
			}else{
				setFlashData('alert-warning','Please Check The Required Fields','SubCateogry/newSubCateogry');
			}

		}else{
			setFlashData('alert-warning','Please Login First to add your Cateogry','admin/login');
		}
	}
	public function allSubCateogrie()
	{
		if (adminLoggedIn()) {
			$config['base_url'] = site_url('SubCateogry/allSubCateogrie');
			$totalRows = $this->modSubCateogry->getAllSubCateogries();
			$config['total_rows'] = $totalRows;
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['allsubCateogries'] = $this->modSubCateogry->fetchAllSubCateogries($config['per_page'],$page);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('admin/header/header');
			$this->load->view('admin/header/css');
			$this->load->view('admin/header/navtop');
			$this->load->view('admin/header/navleft');
			$this->load->view('admin/home/allSubCateogrie',$data);
			$this->load->view('admin/header/footer');
		} else {
			setFlashData('alert-warning','Please Login First to add your Cateogry','admin/login');
		}
		
	}
	public function editSubCateogry($cId)
	{
		if(adminLoggedIn())
		{
			if (!empty($cId) && isset($cId)) {
				$data['SubCateogry'] = $this->modSubCateogry->checkSubCateogryById($cId);
				if (count($data['SubCateogry']) == 1) {
					$data['cateogries'] = $this->modAdmin->getCateogries();
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/home/editSubCateogrie',$data);
					$this->load->view('admin/header/footer');
				} else {
					setFlashData('alert-danger','Sub Cateogry Not Found','SubCateogry/allSubCateogrie');
				}	
			} else {
				setFlashData('alert-danger','Something Went Wrong','SubCateogry/allSubCateogrie');
			}
			

		}else
		{
			setFlashData('alert-warning','Please Login First then Edit Sub Cateogry','admin/login');
		}
	}
	public function updateSubCateogry()
	{
		if (adminLoggedIn()) {
		$data['subcat_name'] = $this->input->post('subcateogryName',true);
		$data['cat_name'] = $this->input->post('subcatId',true);
		$cId = $this->input->post('xid',true);
		$catName = $this->input->post('subcat',true);
		$oldImg = $this->input->post('oldImgs',true);
		if (!empty($data['subcat_name']) && isset($data['subcat_name'])) {
			if(isset($_FILES['simg']) && is_uploaded_file($_FILES['simg']['tmp_name'])){
				$path = realpath(APPPATH.'../assets/images/subcateogries');
				$config['upload_path'] = $path;
				$config['max_size'] = 1000;
				$config['allowed_types'] = 'gif|png|jpg|jpeg';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('simg'))
				{
					$error = $this->upload->display_errors();
					setFlashData('alert-danger',$error,'SubCateogry/allSubCateogrie');
				}else
				{
					$fileName = $this->upload->data();
					$data['subcat_img'] = $fileName['file_name'];
				}
			}//images checking here
			$addData = $this->modSubCateogry->checksubCateogry($data);
			if ($addData->num_rows() >0) {
				setFlashData('alert-danger','Sub cateogries Already Exists.','SubCateogry/newSubCateogry');
			}else
			{
			$reply = $this->modSubCateogry->updateSubCateogry($data,$cId);
			if ($reply) {
				if (!empty($data['subcat_img']) && isset($data['subcat_img'])) {
					if (file_exists($path.'/'.$oldImg)) {
						unlink($path.'/'.$oldImg);
					} else {
						setFlashData('alert-danger','Something Went Wrong.','SubCateogry/allSubCateogrie');
					}	
				} 
				setFlashData('alert-success','Sub Cateogries Name Sucessfully Updated.','SubCateogry/allSubCateogrie');
				
			} else {
				setFlashData('alert-danger','You Can\'t Update Sub cateogries Right Now.','SubCateogry/allSubCateogrie');
			}
			}
		} else {
			setFlashData('alert-danger','Sub cateogries Name Must Be Required.','SubCateogry/allSubCateogrie');
		}
		
		} else {
			setFlashData('alert-warning','Please Login First then Edit Sub Cateogry','admin/login');
		}		
	}
	public function deleteSubCateogry()
	{
		if (adminLoggedIn()) {
			if ($this->input->is_ajax_request()) {
				$this->input->post('id',true);
				$cId = $this->input->post('text',true);
				if (!empty($cId) && isset($cId)) {
					$cId = $this->encryption->decrypt($cId);
					$oldImg = $this->modSubCateogry->getSubCateogriesImage($cId);
						if(!empty($oldImg) && count($oldImg) == 1){
							$realImage = $oldImg[0]['subcat_img'];
						}
					$checkMd = $this->modSubCateogry->deleteSubCateogry($cId);
					if ($checkMd) {
							if(!empty($realImage) && isset($realImage))
							{
								$path = realpath(APPPATH.'../assets/images/cateogries/');
								if(file_exists($path.'/'.$realImage)){
									unlink($path.'/'.$realImage);
								}
							}
						$data['return'] = true;
						$data['message'] = 'Sucessfully Deleted';
						echo json_encode($data);
					} else {
						$data['return'] = false;
						$data['message'] = 'You Can\'t Delete your Sub Cateogry Right Now.';
						echo json_encode($data);
						}
				} else {
						$data['return'] = false;
						$data['message'] = 'Value Not Exists.';
						echo json_encode($data);
					
				}	
			} else {
				setFlashData('alert-warning','Something Went Wrong.','SubCateogry');
			}	
		} else {
			setFlashData('alert-warning','Please Login First then Delete Sub Cateogry','admin/login');
		}
	}	
	 public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}