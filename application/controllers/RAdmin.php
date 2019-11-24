<?php
class RAdmin extends CI_Controller
{
	
	public function index()
	{
		if($this->session->userdata('rId'))
		{
					$this->load->view('radmin/header/header');
					$this->load->view('radmin/header/css');
					$this->load->view('radmin/header/navtop');
					$this->load->view('radmin/header/navleft');
					$this->load->view('radmin/home/index');
					$this->load->view('radmin/header/footer');
		}else
		{
			$this->session->set_flashdata('error','Please Login ..');
			redirect('radmin/login');
		}
	}
	public function login()
	{
		$this->load->view('radmin/login');
	}
	public function checkAdmin()
	{
		$data['r_email'] = $this->input->post('email',true);
		$data['r_password'] = $this->input->post('password',true);
		if(!empty($data['r_email']) && !empty($data['r_password']))
		{
			$admindata = $this->modRAdmin->checkAdmin($data);
			if(count($admindata) == 1)
			{
				//echo "Sucessfully";
				$forSession = array(
					'rId' =>$admindata[0]['r_id'],
					'rName' =>$admindata[0]['r_name'],
					'rEmail' =>$admindata[0]['r_email'],
					'rImg' =>$admindata[0]['r_img']
				);
				$this->session->set_userdata($forSession);
				if($this->session->userdata('rId'))
				{
					echo 'Logged In';
					redirect('radmin');
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
				setFlashData('alert-danger','Your Email and Password Not found,Please check.','radmin/login');
			}
		}
		else
		{

			//$this->session->set_flashdata('error','Please Check Required Fields.');
			//redirect('admin/login');
			setFlashData('alert-warning','Please Check Required Fields.','radmin/login');
		}
	}
	public function logout()
	{
		if($this->session->userdata('rId'))
		{
			$this->session->set_userdata('rId','');
			//$this->session->set_flashdata('error','You have Sucessfully Logout.');
			//redirect('admin/login');
			setFlashData('alert-success','You have Sucessfully Logout.','radmin/login');
		}else
		{
			//$this->session->set_flashdata('error','Please Login ..');
			//redirect('admin/login');
			setFlashData('alert-warning','Please Login ..','radmin/login');
		}
	}
	public function viewRProducts()
	{
		if (adminRLoggedIn()) {
			$config['base_url'] = site_url('radmin/viewRProducts');
			$radmin = getRAdminName();
			$totalRows = $this->modRAdmin->getAllRProducts($radmin);
			$config['total_rows'] = $totalRows;
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['allRProducts'] = $this->modRAdmin->fetchAllRProducts($config['per_page'],$page,$radmin);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('radmin/header/header');
			$this->load->view('radmin/header/css');
			$this->load->view('radmin/header/navtop');
			$this->load->view('radmin/header/navleft');
			$this->load->view('radmin/products/viewproducts',$data);
			$this->load->view('radmin/header/footer');
		} else {
			setFlashData('alert-warning','Please Login ..','radmin/login');
		}
		
	}
	public function viewRProfile()
	{
		if (adminRLoggedIn()) {
			$rId = getRAdminId();
			$data['vRdata'] = $this->modRAdmin->checkRetailerById($rId);	
			$this->load->view('radmin/header/header');
			$this->load->view('radmin/header/css');
			$this->load->view('radmin/header/navtop');
			$this->load->view('radmin/header/navleft');
			$this->load->view('radmin/profile/viewprofile',$data);
			$this->load->view('radmin/header/footer');
		} else {
			setFlashData('alert-warning','Please Login ..','radmin/login');
		}
		
	}
}