<?php
class ModBrand extends CI_Model
{
	
	public function addBrand($data)
	{
		return $this->db->insert('brand',$data);
	}
	public function checkBrand($data)
	{
		return $this->db->get_where('brand',array('b_name'=>$data['b_name']));
	}
	public function getAllBrands()
	{
		return $this->db->get_where('brand',array('bStatus'=>1))->num_rows();
	}
	public function fetchAllBrands($limit,$start)
	{ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('brand',array('bStatus'=>1));
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
					$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}
	public function checkBrandById($bId)				
	{
		return $this->db->get_where('brand',array('b_id'=>$bId))->result_array();
	}
	public function updateBrand($data,$bId)
	{
		$this->db->where('b_id',$bId);
		return $this->db->update('brand',$data);
	}
	public function deleteBrand($bId)
	{
		$this->db->where('b_id',$bId);
		return $this->db->delete('brand');
	}
	public function getBrandImage($bId)
	{
		return $this->db->select('b_image')->from('brand')
		->where('b_id',$bId)->get()->result_array();
	}
}