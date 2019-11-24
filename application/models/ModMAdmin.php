<?php

class ModMAdmin extends CI_Model
{

	public function checkAdmin($data)
	{
		return $this->db->get_where('manufacturer',$data)->result_array();
	}
	public function checkProduct($data)
	{
		return $this->db->get_where('product',array('p_name'=>$data['p_name']));
	}
	public function getAllMProducts($madmin)
	{
		return $this->db->get_where('product',array('pStatus'=>1,'p_manuf'=>$madmin ))->num_rows();//&& 'p_manuf'=>$madmin
	}
	public function fetchAllMProducts($limit,$start,$madmin)
	{ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('product',array('pStatus'=>1,'p_manuf'=>$madmin));
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