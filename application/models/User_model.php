<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	protected $table = 'user';


	public function __construct()
	{
		parent::__construct();
	}

	public function getUserAll(){
		$q = $this->db->get($this->table);
		return $q->result();
	}

	public function getUserByID($id = null){
		$q = $this->db->where('id', $id)->get($this->table);
		return $q->row_array();
	}

	// public function getUserByUsername($username){
	// 	$this->db->where('username', $username);
    // 	$query = $this->db->get('users'); 

	// 	if ($query->num_rows() > 0) {
	// 		return $query->row_array(); 
	// 	}

	// 	return null; 
	// }

	public function updateUser($id, $data){
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	public function insertUser($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function deleteUser($id = null){
		$this->db->where('id', $id);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}

    public function check_user($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password); 
        $q = $this->db->get('user');
        return $q->row();
    }

}