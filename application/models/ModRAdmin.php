<?php

class ModRAdmin extends CI_Model
{

	public function checkAdmin($data)
	{
		return $this->db->get_where('retailer',$data)->result_array();
	}
	public function checkProduct($data)
	{
		return $this->db->get_where('product',array('p_name'=>$data['p_name']));
	}
	public function getAllRProducts($radmin)
	{
		return $this->db->get_where('product',array('pStatus'=>1,'p_retailer'=>$radmin ))->num_rows();
	}
	public function fetchAllRProducts($limit,$start,$radmin)
	{ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('product',array('pStatus'=>1,'p_retailer'=>$radmin));
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
	public function updateProduct($data,$pId)
	{
		$this->db->where('p_id',$pId);
		return $this->db->update('product',$data);
	}
	public function deleteProduct($pId)
	{
		$this->db->where('p_id',$pId);
		return $this->db->delete('product');
	}
	public function getMProductImage($pimgId)
	{
		return $this->db->select('p_img_id')->from('product_img')
		->where('p_img_id',$pimgId)->get()->result_array();
	}
	public function addMultiImage($data)
	{
		return $this->db->insert('product_img',$data);
	}
}