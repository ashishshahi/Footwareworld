<?php
class Admin extends CI_Controller
{
	
	public function index()
	{
		if($this->session->userdata('aId'))
		{
					$this->load->view('admin/header/header');
					$this->load->view('admin/header/css');
					$this->load->view('admin/header/navtop');
					$this->load->view('admin/header/navleft');
					$this->load->view('admin/home/index');
					$this->load->view('admin/header/footer');
		}else
		{
			$this->session->set_flashdata('error','Please Login ..');
			redirect('admin/login');
		}
	}
	public function login()
	{
		$this->load->view('admin/login');
	}
	public function checkAdmin()
	{
		$data['aEmail'] = $this->input->post('email',true);
		$data['aPassword'] = $this->input->post('password',true);
		if(!empty($data['aEmail']) && !empty($data['aPassword']))
		{
			$admindata = $this->modAdmin->checkAdmin($data);
			if(count($admindata) == 1)
			{
				//echo "Sucessfully";
				$forSession = array(
					'aId' =>$admindata[0]['aID'],
					'aName' =>$admindata[0]['aName'],
					'aEmail' =>$admindata[0]['aEmail'],
				);
				$this->session->set_userdata($forSession);
				if($this->session->userdata('aId'))
				{
					echo 'Logged In';
					redirect('admin');
				}
				else 
				{
					echo 'Session Not Created';
				}
				var_dump($admindata);

			}else
			{
				
				//$this->session->set_flashdata('error','Your Email and Password Not found,Please check.');
			//redirect('admin/login');
				setFlashData('alert-danger','Your Email and Password Not found,Please check.','admin/login');
			}
		}
		else
		{

			//$this->session->set_flashdata('error','Please Check Required Fields.');
			//redirect('admin/login');
			setFlashData('alert-warning','Please Check Required Fields.','admin/login');
		}
	}
	public function logout()
	{
		if($this->session->userdata('aId'))
		{
			$this->session->set_userdata('aId','');
			//$this->session->set_flashdata('error','You have Sucessfully Logout.');
			//redirect('admin/login');
			setFlashData('alert-success','You have Sucessfully Logout.','admin/login');
		}else
		{
			//$this->session->set_flashdata('error','Please Login ..');
			//redirect('admin/login');
			setFlashData('alert-warning','Please Login ..','admin/login');
		}
	}
}