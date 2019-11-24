<?php
class ModRetailer extends CI_Model
{
	
	public function addRetailer($data)
	{
		return $this->db->insert('retailer',$data);
	}
	public function checkRetailer($data)
	{
		return $this->db->get_where('retailer',array('r_name'=>$data['r_name']));
	}
	public function getAllRetailer()
	{
		return $this->db->get_where('retailer',array('rStatus'=>1))->num_rows();
	}
	public function fetchAllRetailer($limit,$start)
	{ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('retailer',array('rStatus'=>1));
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
					$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}
	public function checkRetailerById($rId)				
	{
		return $this->db->get_where('retailer',array('r_id'=>$rId))->result_array();
	}
	public function updateRetailer($data,$rId)
	{
		$this->db->where('r_id',$rId);
		return $this->db->update('retailer',$data);
	}
	public function deleteRetailer($rId)
	{
		$this->db->where('r_id',$rId);
		return $this->db->delete('retailer');
	}
	public function getRetailerImage($rId)
	{
		return $this->db->select('r_img')->from('retailer')
		->where('r_id',$rId)->get()->result_array();
	}
}