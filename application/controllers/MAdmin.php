<?php
class MAdmin extends CI_Controller
{
	
	public function index()
	{
		if($this->session->userdata('mId'))
		{
					$this->load->view('madmin/header/header');
					$this->load->view('madmin/header/css');
					$this->load->view('madmin/header/navtop');
					$this->load->view('madmin/header/navleft');
					$this->load->view('madmin/home/index');
					$this->load->view('madmin/header/footer');
		}else
		{
			$this->session->set_flashdata('error','Please Login ..');
			redirect('madmin/login');
		}
	}
	public function login()
	{
		$this->load->view('madmin/login');
	}
	public function checkAdmin()
	{
		$data['m_email'] = $this->input->post('email',true);
		$data['m_password'] = $this->input->post('password',true);
		if(!empty($data['m_email']) && !empty($data['m_password']))
		{
			$admindata = $this->modMAdmin->checkAdmin($data);
			if(count($admindata) == 1)
			{
				//echo "Sucessfully";
				$forSession = array(
					'mId' =>$admindata[0]['m_id'],
					'mName' =>$admindata[0]['m_name'],
					'mEmail' =>$admindata[0]['m_email'],
					'mImg' =>$admindata[0]['m_img'],
				);
				$this->session->set_userdata($forSession);
				if($this->session->userdata('mId'))
				{
					echo 'Logged In';
					redirect('madmin');
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
				setFlashData('alert-danger','Your Email and Password Not found,Please check.','madmin/login');
			}
		}
		else
		{

			//$this->session->set_flashdata('error','Please Check Required Fields.');
			//redirect('admin/login');
			setFlashData('alert-warning','Please Check Required Fields.','madmin/login');
		}
	}
	public function logout()
	{
		if($this->session->userdata('mId'))
		{
			$this->session->set_userdata('mId','');
			//$this->session->set_flashdata('error','You have Sucessfully Logout.');
			//redirect('admin/login');
			setFlashData('alert-success','You have Sucessfully Logout.','madmin/login');
		}else
		{
			//$this->session->set_flashdata('error','Please Login ..');
			//redirect('admin/login');
			setFlashData('alert-warning','Please Login ..','madmin/login');
		}
	}
	public function viewMProducts()
	{
		if (adminMLoggedIn()) {
			$config['base_url'] = site_url('madmin/viewMProducts');
			$madmin = getMAdminName();
			$totalRows = $this->modMAdmin->getAllMProducts($madmin);
			$config['total_rows'] = $totalRows;
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['allMProducts'] = $this->modMAdmin->fetchAllMProducts($config['per_page'],$page,$madmin);	
			$data['links'] = $this->pagination->create_links();
			$this->load->view('madmin/header/header');
			$this->load->view('madmin/header/css');
			$this->load->view('madmin/header/navtop');
			$this->load->view('madmin/header/navleft');
			$this->load->view('madmin/products/viewproducts',$data);
			$this->load->view('madmin/header/footer');
		} else {
			setFlashData('alert-warning','Please Login ..','madmin/login');
		}
		
	}
	public function viewMProfile()
	{
		if (adminMLoggedIn()) {
			$mId = getMAdminId();
			$data['vMdata'] = $this->modMAdmin->checkManufactById($mId);	
			$this->load->view('madmin/header/header');
			$this->load->view('madmin/header/css');
			$this->load->view('madmin/header/navtop');
			$this->load->view('madmin/header/navleft');
			$this->load->view('madmin/profile/viewprofile',$data);
			$this->load->view('madmin/header/footer');
		} else {
			setFlashData('alert-warning','Please Login ..','madmin/login');
		}
		
	}
}