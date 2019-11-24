<?php

class Manufact extends CI_Controller
{
	
	public function index()
	{
			if(adminLoggedIn())
			{
					$data['Product'] = $this->modAdmin->getProduct();
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/manufact/newManufact',$data);
					$this->load->view('admin/header/footer');

			}else
			{
				setFlashData('alert-danger','Please Login..','admin/login');
			}	
	}
	public function addManufact()
	{
		if(adminLoggedIn())
		{
			$data['m_name'] = $this->input->post('manufactName',true);
			$data['m_email'] = $this->input->post('manufactEmail',true);
			$data['m_password'] = $this->input->post('manufactPassword',true);
			$data['m_phone'] = $this->input->post('manufactPhone',true);
			$data['m_address'] = $this->input->post('manufactAddress',true);
			$data['m_city'] = $this->input->post('manufactCity',true);
			$data['m_state'] = $this->input->post('manufactState',true);
			$data['m_pincode'] = $this->input->post('manufactPin',true);
			$data['m_product_id'] = $this->input->post('manufactProduct',true);
			$data['m_product_qty'] = $this->input->post('MproductQuant',true);
			if(!empty($data['m_name']) && !empty($data['m_email']) && !empty($data['m_password']) && !empty($data['m_phone']) && !empty($data['m_address']) && !empty($data['m_city']) && !empty($data['m_state']) && !empty($data['m_pincode']) && !empty($data['m_product_id']) && !empty($data['m_product_qty']))
			{
				$path = realpath(APPPATH.'../assets/images/manufact/');
				$config['upload_path'] = $path;
				$config['max_size'] = 1000;
				$config['allowed_types'] = 'gif|png|jpg|jpeg';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('manfactDp'))
				{
					$error = $this->upload->display_errors();
					setFlashData('alert-danger',$error,'Manufact/index');
				}else
				{
					$fileName = $this->upload->data();
					$data['m_img'] = $fileName['file_name'];
					$data['date'] = date('Y-M-d h:i:sa');
					$data['posted_by'] = getAdminName();
				}
					$addData = $this->modManufact->checkManufact($data);
					if ($addData->num_rows() >0) {
						setFlashData('alert-danger','Manufacturer Already Exists.','Manufact/index');
					}else
					{
							$addData = $this->modManufact->addManufact($data);
							if($addData)
							{
								setFlashData('alert-success','You have Sucessfully Added Your Manufacturer.','Manufact/index');
							}else
							{
								setFlashData('alert-danger','You Can\'t Add Your Manufacturer Right Now.','Manufact/index');
							}
					}
				
			}else{
				setFlashData('alert-warning','Manufacturer Name is Required','Manufact/index');
			}

		}else{
			setFlashData('alert-warning','Please Login First to add Manufacturer','admin/login');
		}
	}
	public function allManufact()
	{
		if (adminLoggedIn()) {
			$config['base_url'] = site_url('Manufact/allManufact');
			$totalRows = $this->modManufact->getAllManufact();
			$config['total_rows'] = $totalRows;
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['allManufact'] = $this->modManufact->fetchAllManufact($config['per_page'],$page);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('admin/header/header');
			$this->load->view('admin/header/css');
			$this->load->view('admin/header/navtop');
			$this->load->view('admin/header/navleft');
			$this->load->view('admin/manufact/allManufact',$data);
			$this->load->view('admin/header/footer');
		} else {
			setFlashData('alert-warning','Please Login First .','admin/login');
		}
		
	}
	public function editManufact($mId)
	{
		if(adminLoggedIn())
		{
			if (!empty($mId) && isset($mId)) {
				$data['Manufact'] = $this->modManufact->checkManufactById($mId);
				$data['Product'] = $this->modAdmin->getProduct();
				if (count($data['Manufact']) == 1) {
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/manufact/editManufact',$data);
					$this->load->view('admin/header/footer');
				} else {
					setFlashData('alert-danger','Manufacturer Not Found','Manufact/index');
				}	
			} else {
				setFlashData('alert-danger','Something Went Wrong','Manufact/index');
			}
			

		}else
		{
			setFlashData('alert-warning','Please Login First then Edit Manufacturer','admin/login');
		}
	}
	public function updateManufact()
	{
		if (adminLoggedIn()) {
			$data['m_name'] = $this->input->post('manufactName',true);
			$data['m_email'] = $this->input->post('manufactEmail',true);
			$data['m_password'] = $this->input->post('manufactPassword',true);
			$data['m_phone'] = $this->input->post('manufactPhone',true);
			$data['m_address'] = $this->input->post('manufactAddress',true);
			$data['m_city'] = $this->input->post('manufactCity',true);
			$data['m_state'] = $this->input->post('manufactState',true);
			$data['m_pincode'] = $this->input->post('manufactPin',true);
			$data['m_product_id'] = $this->input->post('manufactProduct',true);
			$data['m_product_qty'] = $this->input->post('MproductQuant',true);
			$mId = $this->input->post('xid',true);
			$oldImg = $this->input->post('oldImg',true);
		if (!empty($data['m_name']) && isset($data['m_name'])) {
			if(isset($_FILES['manfactDp']) && is_uploaded_file($_FILES['manfactDp']['tmp_name'])){
				$path = realpath(APPPATH.'../assets/images/manufact/');
				$config['upload_path'] = $path;
				$config['max_size'] = 1000;
				$config['allowed_types'] = 'gif|png|jpg|jpeg';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('manfactDp'))
				{
					$error = $this->upload->display_errors();
					setFlashData('alert-danger',$error,'Manufact/index');
				}else
				{
					$fileName = $this->upload->data();
					$data['m_img'] = $fileName['file_name'];
				}
			}
			/*$addData = $this->modManufact->checkManufact($data);
			if ($addData->num_rows() >0) {
				setFlashData('alert-danger','Manufacturer Already Exists.','Manufact/index');
			}else
			{*/
			$reply = $this->modManufact->updateManufact($data,$mId);
			if ($reply) {
				if (!empty($data['m_img']) && isset($data['m_img'])) {
					if (file_exists($path.'/'.$oldImg)) {
						unlink($path.'/'.$oldImg);
					} else {
						setFlashData('alert-danger','Something Went Wrong.','Manufact/allManufact');
					}	
				} 
				setFlashData('alert-success','Manufacturer Sucessfully Updated','Manufact/allManufact');
				
			} else {
				setFlashData('alert-danger','You Can\'t Update Manufacturer Right Now.','Manufact/allManufact');
			}
			//}
		} else {
			setFlashData('alert-danger','Manufacturer Name Must Be Required.','Manufact/allManufact');
		}
		
		} else {
			setFlashData('alert-warning','Please Login First then Edit Manufacturer','admin/login');
		}
		
	}
	public function deleteManufact()
	{
		if (adminLoggedIn()) {
			if ($this->input->is_ajax_request()) {
				$this->input->post('id',true);
				$mId = $this->input->post('text',true);
				if (!empty($mId) && isset($mId)) {
					$mId = $this->encryption->decrypt($mId);
					$oldImg = $this->modManufact->getManufactImage($mId);
						if(!empty($oldImg) && count($oldImg) == 1){
							$realImage = $oldImg[0]['m_img'];
						}
					$checkMd = $this->modManufact->deleteManufact($mId);
					if ($checkMd) {
						if(!empty($realImage) && isset($realImage))
							{
								$path = realpath(APPPATH.'../assets/images/manufact/');
								if(file_exists($path.'/'.$realImage)){
									unlink($path.'/'.$realImage);
								}
							}
						$data['return'] = true;
						$data['message'] = 'Sucessfully Deleted';
						echo json_encode($data);
					} else {
						$data['return'] = false;
						$data['message'] = 'You Can\'t Delete your Manufacturer Right Now.';
						echo json_encode($data);
						}
				} else {
						$data['return'] = false;
						$data['message'] = 'Value Not Exists.';
						echo json_encode($data);
					
				}	
			} else {
				setFlashData('alert-warning','Something Went Wrong.','Manufact');
			}	
		} else {
			setFlashData('alert-warning','Please Login First then Delete Manufacturer','admin/login');
		}
	}
	  public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}