<?php

class Retailer extends CI_Controller
{
	
	public function index()
	{
			if(adminLoggedIn())
			{
					$data['Product'] = $this->modAdmin->getProduct();
					$data['Manufacturer'] = $this->modAdmin->getManufacturer();
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/retailer/newRetailer',$data);
					$this->load->view('admin/header/footer');

			}else
			{
				setFlashData('alert-danger','Please Login..','admin/login');
			}	
	}
	public function addRetailer()
	{
		if(adminLoggedIn())
		{
			$data['r_name'] = $this->input->post('retailerName',true);
			$data['r_email'] = $this->input->post('retailerEmail',true);
			$data['r_password'] = $this->input->post('retailerPassword',true);
			$data['r_phone'] = $this->input->post('retailerPhone',true);
			$data['r_address'] = $this->input->post('retailerAddress',true);
			$data['r_city'] = $this->input->post('retailerCity',true);
			$data['r_state'] = $this->input->post('retailerState',true);
			$data['r_pincode'] = $this->input->post('retailerPin',true);
			$data['r_product_id'] = $this->input->post('retailerProduct',true);
			$data['r_product_qty'] = $this->input->post('retailerPQuant',true);
			$data['r_manufacturer_id'] = $this->input->post('retailerManufact',true);
			if(!empty($data['r_name']) && !empty($data['r_email']) && !empty($data['r_password']) && !empty($data['r_phone']) && !empty($data['r_address']) && !empty($data['r_city']) && !empty($data['r_state']) && !empty($data['r_pincode']) && !empty($data['r_product_id']) && !empty($data['r_product_qty']) && !empty($data['r_manufacturer_id']))
			{
				$path = realpath(APPPATH.'../assets/images/retailer/');
				$config['upload_path'] = $path;
				$config['max_size'] = 1000;
				$config['allowed_types'] = 'gif|png|jpg|jpeg';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('retailerDp'))
				{
					$error = $this->upload->display_errors();
					setFlashData('alert-danger',$error,'Retailer/index');
				}else
				{
					$fileName = $this->upload->data();
					$data['r_img'] = $fileName['file_name'];
					$data['date'] = date('Y-M-d h:i:sa');
					$data['posted_by'] = getAdminName();
				}
					$addData = $this->modRetailer->checkRetailer($data);
					if ($addData->num_rows() >0) {
						setFlashData('alert-danger','Retailer Already Exists.','Retailer/index');
					}else
					{
							$addData = $this->modRetailer->addRetailer($data);
							if($addData)
							{
								setFlashData('alert-success','You have Sucessfully Added Your Retailer.','Retailer/index');
							}else
							{
								setFlashData('alert-danger','You Can\'t Add Your Retailer Right Now.','Retailer/index');
							}
					}
				
			}else{
				setFlashData('alert-warning','Retailer Name is Required','Retailer/index');
			}

		}else{
			setFlashData('alert-warning','Please Login First to add Retailer','admin/login');
		}
	}
	public function allRetailer()
	{
		if (adminLoggedIn()) {
			$config['base_url'] = site_url('Retailer/allRetailer');
			$totalRows = $this->modRetailer->getAllRetailer();
			$config['total_rows'] = $totalRows;
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['allRetailers'] = $this->modRetailer->fetchAllRetailer($config['per_page'],$page);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('admin/header/header');
			$this->load->view('admin/header/css');
			$this->load->view('admin/header/navtop');
			$this->load->view('admin/header/navleft');
			$this->load->view('admin/retailer/allRetailer',$data);
			$this->load->view('admin/header/footer');
		} else {
			setFlashData('alert-warning','Please Login First .','admin/login');
		}
		
	}
	public function editRetailer($rId)
	{
		if(adminLoggedIn())
		{
			if (!empty($rId) && isset($rId)) {
				$data['Retailer'] = $this->modRetailer->checkRetailerById($rId);
				$data['Product'] = $this->modAdmin->getProduct();
				$data['Manufacturer'] = $this->modAdmin->getManufacturer();
				if (count($data['Retailer']) == 1) {
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/retailer/editRetailer',$data);
					$this->load->view('admin/header/footer');
				} else {
					setFlashData('alert-danger','Retailer Not Found','Retailer/index');
				}	
			} else {
				setFlashData('alert-danger','Something Went Wrong','Retailer/index');
			}
			

		}else
		{
			setFlashData('alert-warning','Please Login First then Edit Retailer','admin/login');
		}
	}
	public function updateRetailer()
	{
		if (adminLoggedIn()) {
			$data['r_name'] = $this->input->post('retailerName',true);
			$data['r_email'] = $this->input->post('retailerEmail',true);
			$data['r_password'] = $this->input->post('retailerPassword',true);
			$data['r_phone'] = $this->input->post('retailerPhone',true);
			$data['r_address'] = $this->input->post('retailerAddress',true);
			$data['r_city'] = $this->input->post('retailerCity',true);
			$data['r_state'] = $this->input->post('retailerState',true);
			$data['r_pincode'] = $this->input->post('retailerPin',true);
			$data['r_product_id'] = $this->input->post('retailerProduct',true);
			$data['r_product_qty'] = $this->input->post('retailerPQuant',true);
			$data['r_manufacturer_id'] = $this->input->post('retailerManufact',true);
			$rId = $this->input->post('xid',true);
			$oldImg = $this->input->post('oldImg',true);
		if (!empty($data['r_name']) && isset($data['r_name'])) {
			if(isset($_FILES['retailerDp']) && is_uploaded_file($_FILES['retailerDp']['tmp_name'])){
				$path = realpath(APPPATH.'../assets/images/retailer/');
				$config['upload_path'] = $path;
				$config['max_size'] = 1000;
				$config['allowed_types'] = 'gif|png|jpg|jpeg';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('retailerDp'))
				{
					$error = $this->upload->display_errors();
					setFlashData('alert-danger',$error,'Retailer/index');
				}else
				{
					$fileName = $this->upload->data();
					$data['r_img'] = $fileName['file_name'];
				}
			}
			/*$addData = $this->modManufact->checkManufact($data);
			if ($addData->num_rows() >0) {
				setFlashData('alert-danger','Manufacturer Already Exists.','Manufact/index');
			}else
			{*/
			$reply = $this->modRetailer->updateRetailer($data,$rId);
			if ($reply) {
				if (!empty($data['r_img']) && isset($data['r_img'])) {
					if (file_exists($path.'/'.$oldImg)) {
						unlink($path.'/'.$oldImg);
					} else {
						setFlashData('alert-danger','Something Went Wrong.','Retailer/allRetailer');
					}	
				} 
				setFlashData('alert-success','Retailer Sucessfully Updated','Retailer/allRetailer');
				
			} else {
				setFlashData('alert-danger','You Can\'t Update Retailer Right Now.','Retailer/allRetailer');
			}
			//}
		} else {
			setFlashData('alert-danger','Retailer Name Must Be Required.','Retailer/allRetailer');
		}
		
		} else {
			setFlashData('alert-warning','Please Login First then Edit Retailer','admin/login');
		}
		
	}
	public function deleteRetailer()
	{
		if (adminLoggedIn()) {
			if ($this->input->is_ajax_request()) {
				$this->input->post('id',true);
				$rId = $this->input->post('text',true);
				if (!empty($rId) && isset($rId)) {
					$rId = $this->encryption->decrypt($rId);
					$oldImg = $this->modRetailer->getRetailerImage($rId);
						if(!empty($oldImg) && count($oldImg) == 1){
							$realImage = $oldImg[0]['r_img'];
						}
					$checkMd = $this->modRetailer->deleteRetailer($rId);
					if ($checkMd) {
						if(!empty($realImage) && isset($realImage))
							{
								$path = realpath(APPPATH.'../assets/images/retailer/');
								if(file_exists($path.'/'.$realImage)){
									unlink($path.'/'.$realImage);
								}
							}
						$data['return'] = true;
						$data['message'] = 'Sucessfully Deleted';
						echo json_encode($data);
					} else {
						$data['return'] = false;
						$data['message'] = 'You Can\'t Delete your Retailer Right Now.';
						echo json_encode($data);
						}
				} else {
						$data['return'] = false;
						$data['message'] = 'Value Not Exists.';
						echo json_encode($data);
					
				}	
			} else {
				setFlashData('alert-warning','Something Went Wrong.','Retailer');
			}	
		} else {
			setFlashData('alert-warning','Please Login First then Delete Retailer','admin/login');
		}
	}
	  public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}