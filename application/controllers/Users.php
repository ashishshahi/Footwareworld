<?php

class Users extends CI_Controller
{
	
	public function index()
	{
			if(adminLoggedIn())
			{
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/users/newUsers');
					$this->load->view('admin/header/footer');

			}else
			{
				setFlashData('alert-danger','Please Login..','admin/login');
			}	
	}
	public function addUsers()
	{
		if(adminLoggedIn())
		{
			$data['uFirstName'] = $this->input->post('uFname',true);
			$data['uLastName'] = $this->input->post('uLName',true);
			$data['uEmail'] = $this->input->post('uEmail',true);
			$data['uPassword'] = $this->input->post('uPasswrod',true);
			$data['uLink'] = $this->input->post('uLink',true);
			if(!empty($data['uFirstName']) && !empty($data['uLastName']) && !empty($data['uEmail']) && !empty($data['uPassword']) && !empty($data['uLink']))
			{
					$data['uDate'] = date('Y-M-d h:i:sa');
					$data['uPosted'] = getAdminName();
					$addData = $this->modUsers->checkUsers($data);
					if ($addData->num_rows() >0) {
						setFlashData('alert-danger','User Already Exists.','Users/index');
					}else
					{
							$addData = $this->modUsers->addUser($data);
							if($addData)
							{
								setFlashData('alert-success','You have Sucessfully Added New User.','Users/index');
							}else
							{
								setFlashData('alert-danger','You Can\'t Add Your New User Right Now.','Users/index');
							}
					}
				
			}else{
				setFlashData('alert-warning','Users Name is Required','Users/index');
			}

		}else{
			setFlashData('alert-warning','Please Login First to add your Products','admin/login');
		}
	}
	public function allUsers()
	{
		if (adminLoggedIn()) {
			$config['base_url'] = site_url('Users/allUsers');
			$totalRows = $this->modUsers->getAllUsers();
			$config['total_rows'] = $totalRows;
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['allusers'] = $this->modUsers->fetchAllUsers($config['per_page'],$page);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('admin/header/header');
			$this->load->view('admin/header/css');
			$this->load->view('admin/header/navtop');
			$this->load->view('admin/header/navleft');
			$this->load->view('admin/users/allUsers',$data);
			$this->load->view('admin/header/footer');
		} else {
			setFlashData('alert-warning','Please Login First .','admin/login');
		}
		
	}
	public function editUser($UId)
	{
		if(adminLoggedIn())
		{
			if (!empty($UId) && isset($UId)) {
				$data['User'] = $this->modUsers->checkUserById($UId);
				if (count($data['User']) == 1) {
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/users/editUsers',$data);
					$this->load->view('admin/header/footer');
				} else {
					setFlashData('alert-danger','User Not Found','Users/index');
				}	
			} else {
				setFlashData('alert-danger','Something Went Wrong','Users/index');
			}
			

		}else
		{
			setFlashData('alert-warning','Please Login First then Add Users','admin/login');
		}
	}
	public function updateUsers()
	{
		if (adminLoggedIn()) {
			$data['uFirstName'] = $this->input->post('uFname',true);
			$data['uLastName'] = $this->input->post('uLName',true);
			$data['uEmail'] = $this->input->post('uEmail',true);
			$data['uPassword'] = $this->input->post('uPasswrod',true);
			$data['uLink'] = $this->input->post('uLink',true);
			$uId = $this->input->post('xid',true);
		if (!empty($data['uFirstName']) && isset($data['uFirstName'])) {
			/*$addData = $this->modProducts->checkProduct($data);
			if ($addData->num_rows() >0) {
				setFlashData('alert-danger','Product Already Exists.','Products/index');
			}else
			{*/
			$reply = $this->modUsers->updateUser($data,$uId);
			if ($reply) {
				setFlashData('alert-success','Users Sucessfully Updated','Users/allusers');
				
			} else {
				setFlashData('alert-danger','You Can\'t Update Users Right Now.','Users/allusers');
			}
			//}
		} else {
			setFlashData('alert-danger','Users Name Must Be Required.','Users/allusers');
		}
		
		} else {
			setFlashData('alert-warning','Please Login First then Edit Users','admin/login');
		}
		
	}
	public function deleteUser()
	{
		if (adminLoggedIn()) {
			if ($this->input->is_ajax_request()) {
				$this->input->post('id',true);
				$uId = $this->input->post('text',true);
				if (!empty($uId) && isset($uId)) {
					$uId = $this->encryption->decrypt($uId);
					$checkMd = $this->modUsers->deleteUser($uId);
					if ($checkMd) {
						$data['return'] = true;
						$data['message'] = 'Sucessfully Deleted';
						echo json_encode($data);
					} else {
						$data['return'] = false;
						$data['message'] = 'You Can\'t Delete your Users Right Now.';
						echo json_encode($data);
						}
				} else {
						$data['return'] = false;
						$data['message'] = 'Value Not Exists.';
						echo json_encode($data);
					
				}	
			} else {
				setFlashData('alert-warning','Something Went Wrong.','Users');
			}	
		} else {
			setFlashData('alert-warning','Please Login First then Delete User','admin/login');
		}
	}
	  public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}