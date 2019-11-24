<?php

class ModAdmin extends CI_Model
{

	public function checkAdmin($data)
	{
		return $this->db->get_where('admin',$data)->result_array();
	}
	public function addCateogry($data)
	{
		return $this->db->insert('cateogrie',$data);
	}
	public function checkCateogry($data)
	{
		return $this->db->get_where('cateogrie',array('cName'=>$data['cName']));
	}
	public function getAllCateogries()
	{
		return $this->db->get_where('cateogrie',array('cStatus'=>1))->num_rows();
	}
	public function fetchAllCateogries($limit,$start)
	{ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('cateogrie',array('cStatus'=>1));
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
					$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}
	public function checkCateogryById($cId)				
	{
		return $this->db->get_where('cateogrie',array('cId'=>$cId))->result_array();
	}
	public function updateCateogry($data,$cId)
	{
		$this->db->where('cId',$cId);
		return $this->db->update('cateogrie',$data);
	}
	public function deleteCateogry($cId)
	{
		$this->db->where('cId',$cId);
		return $this->db->delete('cateogrie');
	}
	public function getCateogriesImage($cId)
	{
		return $this->db->select('cDp')->from('cateogrie')
		->where('cId',$cId)->get()->result_array();
	}
	public function getCateogries()
	{
		return $this->db->get_where('cateogrie',array('cStatus'=>1));
	}
	public function getSubCateogries()
	{
		return $this->db->get_where('sub_category',array('scStatus'=>1));
	}
	public function getBrands()
	{
		return $this->db->get_where('brand',array('bStatus'=>1));
	}
	public function getProduct()
	{
		return $this->db->get_where('product',array('pStatus'=>1));
	}
	public function getManufacturer()
	{
		return $this->db->get_where('manufacturer',array('mStatus'=>1));
	}
	public function getRetailer()
	{
		return $this->db->get_where('retailer',array('rStatus'=>1));
	}
}