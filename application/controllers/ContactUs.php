<?php

class ContactUs extends CI_Controller
{
	
	public function index()
	{
			if(adminLoggedIn())
			{
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/contactus/AddContactUs');
					$this->load->view('admin/header/footer');

			}else
			{
				setFlashData('alert-danger','Please Login..','admin/login');
			}
		
	}
	public function AddContactUs()
	{
			if(adminLoggedIn())
			{
					$data['title'] = $this->input->post('ctitle',true);
					$data['address'] = $this->input->post('caddress',true);
					$data['phone'] = $this->input->post('cphone',true);
					$data['mobile'] = $this->input->post('cmob',true);
					$data['email'] = $this->input->post('cemail',true);
					$data['web'] = $this->input->post('cweb',true);
					if (!empty($data['title']) && !empty($data['address']) && !empty($data['address']) && !empty($data['phone']) && !empty($data['mobile']) && !empty($data['email']) && !empty($data['web'])) {
						$path = realpath(APPPATH.'../assets/images/contactus');
						$config['upload_path'] = $path;
						$config['max_size'] = 1000;
						$config['allowed_types'] = 'gif|png|jpg|jpeg';
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload('poster'))
						{
							$error = $this->upload->display_errors();
							setFlashData('alert-danger',$error,'ContactUs/index');
						}else{
							$fileName = $this->upload->data();
							$data['banner'] = $fileName['file_name'];
							$data['date'] = date('Y-M-d h:i:sa');
							$data['posted_by'] = getAdminName();
						}
						$addData = $this->modDisp->checkContactUsTitle($data);
						if ($addData->num_rows() >0)
						 {
							setFlashData('alert-danger','Contact Us Title Already Exists.','ContactUs/index');
						 }else {
							$addData = $this->modDisp->addContactus($data);
							if($addData)
							{
								setFlashData('alert-success','You have Sucessfully Added Your Data.','ContactUs/index');
							}else
							{
								setFlashData('alert-danger','You Can\'t Add Your Data Right Now.','ContactUs/index');
							}
						}	
					} else {
						setFlashData('alert-warning','Data Should Be Required','ContactUs/index');
					}		
			}else
			{
				setFlashData('alert-danger','Please Login First to add your About Us','admin/login');
			}
	}
	public function EditContactus()
	{
		if (adminLoggedIn()) {
				$data['ContactUs'] = $this->modDisp->checkContactusById('1');
				if (count($data['ContactUs']) == 1) {
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/contactus/editcontactus',$data);
					$this->load->view('admin/header/footer');
				} else {
					setFlashData('alert-danger','Contact Us  Title Not Found','ContactUs/EditContactus');
				}
		} else {
			setFlashData('alert-danger','Please Login First then Edit Contact Us','admin/login');
		}
		
	}
	public function UpdateContactUs()
	{
		if (adminLoggedIn()) {
				$cId = $this->input->post('xid',true);
				$data['title'] = $this->input->post('ctitle',true);
				$data['address'] = $this->input->post('caddress',true);
				$data['phone'] = $this->input->post('cphone',true);
				$data['mobile'] = $this->input->post('cmob',true);
				$data['email'] = $this->input->post('cemail',true);
				$data['web'] = $this->input->post('cweb',true);
				if (!empty($data['title']) && !empty($data['address']) && !empty($data['address']) && !empty($data['phone']) && !empty($data['mobile']) && !empty($data['email']) && !empty($data['web'])) {
					$reply = $this->modDisp->updateContactUs($data,$cId);
					if ($reply) {
						setFlashData('alert-success','Contact Us Sucessfully Updated','ContactUs/EditContactus');
						
					} else {
						setFlashData('alert-danger','You Can\'t Update Contact Us Right Now.','ContactUs/EditContactus');
					}
				} else {
					setFlashData('alert-danger','Contact Us Title Must Be Required.','ContactUs/EditContactus');
				}
				
		} else {
			setFlashData('alert-danger','Please Login First then Edit Contact Us','admin/login');
		}
		
	}
	  public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}