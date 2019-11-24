<?php
class ModUsers extends CI_Model
{
	
	public function addUser($data)
	{
		return $this->db->insert('users',$data);
	}
	public function checkUsers($data)
	{
		return $this->db->get_where('users',array('uFirstName'=>$data['uFirstName'] ,'uLastName'=>$data['uLastName']));
	}
	public function getAllUsers()
	{
		return $this->db->get_where('users',array('uStatus'=>1))->num_rows();
	}
	public function fetchAllUsers($limit,$start)
	{ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('users',array('uStatus'=>1));
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
					$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}
	public function checkUserById($uId)				
	{
		return $this->db->get_where('users',array('uid'=>$uId))->result_array();
	}
	public function updateUser($data,$uId)
	{
		$this->db->where('uid',$uId);
		return $this->db->update('users',$data);
	}
	public function deleteUser($uId)
	{
		$this->db->where('uid',$uId);
		return $this->db->delete('users');
	}
}