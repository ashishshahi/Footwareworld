<?php 

function setFlashData($class,$message,$url)
{
	$CI = get_instance();
	$CI->load->library('session');
	$CI->session->set_flashdata('class',$class);
	$CI->session->set_flashdata('message',$message);
	redirect($url);
}
function adminLoggedIn()
{
	$CI = get_instance();
	$CI->load->library('session');
	if ($CI->session->userdata('aId')) {
		return TRUE;
	}else
	{
		return FALSE;
	}
}
function getAdminId()
{
	$CI = get_instance();
	$CI->load->library('session');
	if ($CI->session->userdata('aId')) {
		return $CI->session->userdata('aId');
	}else
	{
		return FALSE;
	}
}
function getAdminName()
{
	$CI = get_instance();
	$CI->load->library('session');
	if ($CI->session->userdata('aId')) {
		return $CI->session->userdata('aName');
	}else
	{
		return FALSE;
	}
}
//Manufacturer
function adminMLoggedIn()
{
	$CI = get_instance();
	$CI->load->library('session');
	if ($CI->session->userdata('mId')) {
		return TRUE;
	}else
	{
		return FALSE;
	}
}
function getMAdminId()
{
	$CI = get_instance();
	$CI->load->library('session');
	if ($CI->session->userdata('mId')) {
		return $CI->session->userdata('mId');
	}else
	{
		return FALSE;
	}
}
function getMAdminName()
{
	$CI = get_instance();
	$CI->load->library('session');
	if ($CI->session->userdata('mId')) {
		return $CI->session->userdata('mName');
	}else
	{
		return FALSE;
	}
}
function getMAdminImg()
{
	$CI = get_instance();
	$CI->load->library('session');
	if ($CI->session->userdata('mId')) {
		return $CI->session->userdata('mImg');
	}else
	{
		return FALSE;
	}
}

//For Retailer
function adminRLoggedIn()
{
	$CI = get_instance();
	$CI->load->library('session');
	if ($CI->session->userdata('rId')) {
		return TRUE;
	}else
	{
		return FALSE;
	}
}
function getRAdminId()
{
	$CI = get_instance();
	$CI->load->library('session');
	if ($CI->session->userdata('rId')) {
		return $CI->session->userdata('rId');
	}else
	{
		return FALSE;
	}
}
function getRAdminName()
{
	$CI = get_instance();
	$CI->load->library('session');
	if ($CI->session->userdata('rId')) {
		return $CI->session->userdata('rName');
	}else
	{
		return FALSE;
	}
}
function getRAdminImg()
{
	$CI = get_instance();
	$CI->load->library('session');
	if ($CI->session->userdata('rId')) {
		return $CI->session->userdata('rImg');
	}else
	{
		return FALSE;
	}
}
?>