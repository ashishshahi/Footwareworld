<?php 

class ModSubCateogry extends CI_Model
{
	public function addsubCateogry($data)
	{
		return $this->db->insert('sub_category',$data);
	}
	public function checksubCateogry($data)
	{
		return $this->db->get_where('sub_category',array('subcat_name'=>$data['subcat_name']));
	}
	public function getAllSubCateogries()
	{
		return $this->db->get_where('sub_category',array('scStatus'=>1))->num_rows();
	}
	public function fetchAllSubCateogries($limit,$start)
	{ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('sub_category',array('scStatus'=>1));
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
					$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}
	public function checkSubCateogryById($cId)				
	{
		return $this->db->get_where('sub_category',array('subcat_id'=>$cId))->result_array();
	}
	public function updateSubCateogry($data,$cId)
	{
		$this->db->where('subcat_id',$cId);
		return $this->db->update('sub_category',$data);
	}
	public function deleteSubCateogry($cId)
	{
		$this->db->where('subcat_id',$cId);
		return $this->db->delete('sub_category');
	}
	public function getSubCateogriesImage($cId)
	{
		return $this->db->select('subcat_img')->from('sub_category')
		->where('subcat_id',$cId)->get()->result_array();
	}
}