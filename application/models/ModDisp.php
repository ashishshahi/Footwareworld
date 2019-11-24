<?php
class ModDisp extends CI_Model
{
	
	public function checkAboutUsTitle($data)
	{
		return $this->db->get_where('aboutus',array('a_title'=>$data['a_title']));
	}
	public function addAboutus($data)
	{
		return $this->db->insert('aboutus',$data);
	}
	public function checkAboutusById($eId)				
	{
		return $this->db->get_where('aboutus',array('a_id'=>$eId))->result_array();
	}
	public function updateAboutUs($data,$aId)
	{
		$this->db->where('a_id',$aId);
		return $this->db->update('aboutus',$data);
	}

	//contact us 
	public function checkContactUsTitle($data)
	{
		return $this->db->get_where('contact',array('title'=>$data['title']));
	}
	public function addContactus($data)
	{	
		return $this->db->insert('contact',$data);
	}
	public function checkContactusById($cId)				
	{
		return $this->db->get_where('contact',array('id'=>$cId))->result_array();
	}
	public function updateContactUs($data,$cId)
	{
		$this->db->where('id',$cId);
		return $this->db->update('contact',$data);
	}
}