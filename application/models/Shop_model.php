<?php 
/**
 * 
 */
class Shop_model extends CI_Model
{
	public function dologin($user,$psw)
	{
		return $q = $this->db->select('
            users.username,
            users.email,
            users.password')
          ->from('users')
          ->where("(users.email = '$user' OR users.username = '$user')")
          ->where('password', $psw)->get()->result_array();
	}

	public function create_acc($data)
	{
		return	$this->db->insert('users',$data);
	}
}
 ?>