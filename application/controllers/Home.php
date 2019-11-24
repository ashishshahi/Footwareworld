<?php

class Home extends CI_Controller 
{
	public function index()
	{
		$this->load->view('header/header');
		$this->load->view('header/css');
		$this->load->view('header/navbar');
		$this->load->view('home/mainHome');
		$this->load->view('header/footer');
	}
	public function aboutus()
	{
		$this->load->view('header/header');
		$this->load->view('header/css');
		$this->load->view('header/navbar');
		$this->load->view('about/mainAbout');
		$this->load->view('header/footer');
		
	}
	public function login()
	{
		$this->load->view('header/header');
		$this->load->view('header/css');
		$this->load->view('header/navbar');
		$this->load->view('login/index');
		$this->load->view('header/footer');
	}
}