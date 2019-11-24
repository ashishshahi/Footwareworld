<?php
class ModProducts extends CI_Model
{
	
	public function addProduct($data)
	{
		return $this->db->insert('product',$data);
	}
	public function checkProduct($data)
	{
		return $this->db->get_where('product',array('p_name'=>$data['p_name']));
	}
	public function getAllProducts()
	{
		return $this->db->get_where('product',array('pStatus'=>1))->num_rows();
	}
	public function fetchAllProducts($limit,$start)
	{ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('product',array('pStatus'=>1));
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
					$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}
	public function checkProductById($pId)				
	{
		return $this->db->get_where('product',array('p_id'=>$pId))->result_array();
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
	public function getProductImage($pimgId)
	{
		return $this->db->select('p_img_id')->from('product_img')
		->where('p_img_id',$pimgId)->get()->result_array();
	}
	public function addMultiImage($data)
	{
		return $this->db->insert('product_img',$data);
	}
}