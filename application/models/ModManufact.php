<?php
class ModManufact extends CI_Model
{
	
	public function addManufact($data)
	{
		return $this->db->insert('manufacturer',$data);
	}
	public function checkManufact($data)
	{
		return $this->db->get_where('manufacturer',array('m_name'=>$data['m_name']));
	}
	public function getAllManufact()
	{
		return $this->db->get_where('manufacturer',array('mStatus'=>1))->num_rows();
	}
	public function fetchAllManufact($limit,$start)
	{ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('manufacturer',array('mStatus'=>1));
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
					$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}
	public function checkManufactById($mId)				
	{
		return $this->db->get_where('manufacturer',array('m_id'=>$mId))->result_array();
	}
	public function updateManufact($data,$mId)
	{
		$this->db->where('m_id',$mId);
		return $this->db->update('manufacturer',$data);
	}
	public function deleteManufact($mId)
	{
		$this->db->where('m_id',$mId);
		return $this->db->delete('manufacturer');
	}
	public function getManufactImage($mId)
	{
		return $this->db->select('m_img')->from('manufacturer')
		->where('m_id',$mId)->get()->result_array();
	}
}