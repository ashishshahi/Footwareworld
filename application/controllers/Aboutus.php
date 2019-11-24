<?php

class Aboutus extends CI_Controller
{
	
	public function index()
	{
			if(adminLoggedIn())
			{
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/aboutus/AddAboutUs');
					$this->load->view('admin/header/footer');

			}else
			{
				setFlashData('alert-danger','Please Login..','admin/login');
			}
		
	}
	public function AddAboutUs()
	{
			if(adminLoggedIn())
			{
					$data['a_title'] = $this->input->post('atitle',true);
					$data['a_desciption'] = $this->input->post('autext',true);
					if (!empty($data['a_title']) && !empty($data['a_desciption'])) {
						$data['date'] = date('Y-M-d h:i:sa');
						$data['posted_by'] = getAdminName();
						$addData = $this->modDisp->checkAboutUsTitle($data);
						if ($addData->num_rows() >0) {
							setFlashData('alert-danger','About Us Title Already Exists.','AboutUs/index');
						} else {
							$addData = $this->modDisp->addAboutus($data);
							if($addData)
							{
								setFlashData('alert-success','You have Sucessfully Added Your Data.','AboutUs/index');
							}else
							{
								setFlashData('alert-danger','You Can\'t Add Your Data Right Now.','Aboutus/index');
							}
						}	
					} else {
						setFlashData('alert-warning','Data Should Be Required','Aboutus/index');
					}		
			}else
			{
				setFlashData('alert-danger','Please Login First to add your About Us','admin/login');
			}
	}
	public function EditAboutus()
	{
		if (adminLoggedIn()) {
			/*if (!empty($eid) && isset($eid)) {*/
				$data['AboutUs'] = $this->modDisp->checkAboutusById('1');
				if (count($data['AboutUs']) == 1) {
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/aboutus/editaboutus',$data);
					$this->load->view('admin/header/footer');
				} else {
					setFlashData('alert-danger','About Us  Title Not Found','Aboutus/EditAboutus');
				}
				
				
			/*} else {
				setFlashData('alert-danger','Something Went Wrong','Aboutus/EditAboutus');
			}*/
		} else {
			setFlashData('alert-danger','Please Login First then Edit About Us','admin/login');
		}
		
	}
	public function UpdateAboutUs()
	{
		if (adminLoggedIn()) {
				$data['a_title'] = $this->input->post('atitle',true);
				$data['a_desciption'] = $this->input->post('autext',true);
				$aId = $this->input->post('xid',true);
				if (!empty($data['a_title']) && isset($data['a_desciption'])) {
					$reply = $this->modDisp->updateAboutUs($data,$aId);
					if ($reply) {
						setFlashData('alert-success','About Us Sucessfully Updated','Aboutus/EditAboutus');
						
					} else {
						setFlashData('alert-danger','You Can\'t Update About Us Right Now.','Aboutus/EditAboutus');
					}
				} else {
					setFlashData('alert-danger','About Us Title Must Be Required.','Aboutus/EditAboutus');
				}
				
		} else {
			setFlashData('alert-danger','Please Login First then Edit About Us','admin/login');
		}
		
	}
	  public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}