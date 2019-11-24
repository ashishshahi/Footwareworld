<?php 

class Cateogry extends CI_Controller
{
	public function index()
	{
		if(adminLoggedIn())
		{
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/home/newCateogry');
					$this->load->view('admin/header/footer');
		}else
		{
			setFlashData('alert-danger','Please Login First to add your Cateogry','admin/login');
		}
	}
	public function newCateogry()
	{
		if(adminLoggedIn())
		{
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/home/newCateogry');
					$this->load->view('admin/header/footer');
		}else
		{
			setFlashData('alert-danger','Please Login First to add your Cateogry','admin/login');
		}
	}
	public function addCateogry()
	{
		if(adminLoggedIn())
		{
			$data['cName'] = $this->input->post('cateogryName',true);
			if(!empty($data['cName']))
			{
				$path = realpath(APPPATH.'../assets/images/cateogries');
				$config['upload_path'] = $path;
				$config['max_size'] = 1000;
				$config['allowed_types'] = 'gif|png|jpg|jpeg';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('catDp'))
				{
					$error = $this->upload->display_errors();
					setFlashData('alert-danger',$error,'Cateogry/newCateogry');
				}else
				{
					$fileName = $this->upload->data();
					$data['cDp'] = $fileName['file_name'];
					$data['cDate'] = date('Y-M-d h:i:sa');
					$data['adminId'] = getAdminId();
				}
				$addData = $this->modAdmin->checkCateogry($data);
				if ($addData->num_rows() >0) {
					setFlashData('alert-danger','cateogries Already Exists.','Cateogry/newCateogry');
				}else
				{
						$addData = $this->modAdmin->addCateogry($data);
						if($addData)
						{
							setFlashData('alert-success','You have Sucessfully Added Your Cateogry.','Cateogry/newCateogry');
						}else
						{
							setFlashData('alert-danger','You Can\'t Add Your Cateogry Right Now.','Cateogry/newCateogry');
						}
				}
				
			}else{
				setFlashData('alert-warning','Cateogry Name is Required','Cateogry/newCateogry');
			}

		}else{
			setFlashData('alert-warning','Please Login First to add your Cateogry','admin/login');
		}
	}
	public function allCateogries()
	{
		if (adminLoggedIn()) {
			$config['base_url'] = site_url('Cateogry/allCateogries');
			$totalRows = $this->modAdmin->getAllCateogries();
			$config['total_rows'] = $totalRows;
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['allCateogries'] = $this->modAdmin->fetchAllCateogries($config['per_page'],$page);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('admin/header/header');
			$this->load->view('admin/header/css');
			$this->load->view('admin/header/navtop');
			$this->load->view('admin/header/navleft');
			$this->load->view('admin/home/allCateogries',$data);
			$this->load->view('admin/header/footer');
		} else {
			setFlashData('alert-warning','Please Login First to add your Cateogry','admin/login');
		}
		
	}
	public function editCateogry($cId)
	{
		if(adminLoggedIn())
		{
			if (!empty($cId) && isset($cId)) {
				$data['Cateogry'] = $this->modAdmin->checkCateogryById($cId);
				if (count($data['Cateogry']) == 1) {
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/home/editCateogrie',$data);
					$this->load->view('admin/header/footer');
				} else {
					setFlashData('alert-danger','Cateogry Not Found','Cateogry/allCateogries');
				}	
			} else {
				setFlashData('alert-danger','Something Went Wrong','Cateogry/allCateogries');
			}
			

		}else
		{
			setFlashData('alert-warning','Please Login First then Edit Cateogry','admin/login');
		}
	}
	public function updateCateogry()
	{
		if (adminLoggedIn()) {
		$data['cName'] = $this->input->post('cateogryName',true);
		$cId = $this->input->post('xid',true);
		$oldImg = $this->input->post('oldImg',true);
		if (!empty($data['cName']) && isset($data['cName'])) {
			if(isset($_FILES['catDp']) && is_uploaded_file($_FILES['catDp']['tmp_name'])){
				$path = realpath(APPPATH.'../assets/images/cateogries');
				$config['upload_path'] = $path;
				$config['max_size'] = 1000;
				$config['allowed_types'] = 'gif|png|jpg|jpeg';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('catDp'))
				{
					$error = $this->upload->display_errors();
					setFlashData('alert-danger',$error,'Cateogry/allCateogries');
				}else
				{
					$fileName = $this->upload->data();
					$data['cDp'] = $fileName['file_name'];
				}
			}//images checking here
			$addData = $this->modAdmin->checkCateogry($data);
			if ($addData->num_rows() >0) {
				setFlashData('alert-danger','cateogries Already Exists.','Cateogry/newCateogry');
			}else
			{
			$reply = $this->modAdmin->updateCateogry($data,$cId);
			if ($reply) {
				if (!empty($data['cDp']) && isset($data['cDp'])) {
					if (file_exists($path.'/'.$oldImg)) {
						unlink($path.'/'.$oldImg);
					} else {
						setFlashData('alert-danger','Something Went Wrong.','Cateogry/allCateogries');
					}	
				} 
				setFlashData('alert-success','Cateogries Name Sucessfully Updated','Cateogry/allCateogries');
				
			} else {
				setFlashData('alert-danger','You Can\'t Update cateogries Right Now.','admin/allCateogries');
			}
			}
		} else {
			setFlashData('alert-danger','cateogries Name Must Be Required.','Cateogry/allCateogries');
		}
		
		} else {
			setFlashData('alert-warning','Please Login First then Edit Cateogry','admin/login');
		}
		
	}
	public function deleteCateogry()
	{
		if (adminLoggedIn()) {
			if ($this->input->is_ajax_request()) {
				$this->input->post('id',true);
				$cId = $this->input->post('text',true);
				if (!empty($cId) && isset($cId)) {
					$cId = $this->encryption->decrypt($cId);
					$oldImg = $this->modAdmin->getCateogriesImage($cId);
						if(!empty($oldImg) && count($oldImg) == 1){
							$realImage = $oldImg[0]['cDp'];
						}
					$checkMd = $this->modAdmin->deleteCateogry($cId);
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
						$data['message'] = 'You Can\'t Delete your Cateogry Right Now.';
						echo json_encode($data);
						}
				} else {
						$data['return'] = false;
						$data['message'] = 'Value Not Exists.';
						echo json_encode($data);
					
				}	
			} else {
				setFlashData('alert-warning','Something Went Wrong.','Cateogry');
			}	
		} else {
			setFlashData('alert-warning','Please Login First then Delete Cateogry','admin/login');
		}
	}
	  public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }	
}