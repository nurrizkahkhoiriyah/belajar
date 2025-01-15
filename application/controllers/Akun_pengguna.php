<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Masterdata_model', 'md');
	}

	public function index()
	{

		$data = array(
			'menu' => 'backend/menu',
			'content' => 'backend/akunPengguna',
			'title' => 'Admin'
		);
		$this->load->view('template', $data);
	}

    public function table_user(){
        $q = $this->md->getUserAll();
		$dt = [];
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$dt[] = $row;
			}

			$ret['status'] = true;
			$ret['data'] = $dt;
			$ret['message'] = '';
		} else {
			$ret['status'] = false;
			$ret['data'] = [];
			$ret['message'] = 'Data tidak tersedia';
		}

		echo json_encode($ret);
    }


	public function get_all(){
		$q = $this->md->getUserAll(); 
		echo json_encode($q); 
	}

	public function save(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
	
		$this->md->insertUser($data);
		$users = $this->md->getUserAll();
		echo json_encode($users);
	}


	public function update_user(){
		$id = $this->input->post('id');

		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$update = $this->md->updateUser($id, $data);
		echo json_encode($update);
	}

	public function edit($id = null){
		$edit = $this->md->getUserByID($id);
		echo json_encode($edit);
	}

	public function delete($id = null){
		$id = $this->input->post('id');

		$delete = $this->md->deleteUser($id);
		echo json_encode($delete);

	}

	public function logout() {
        $this->session->sess_destroy();
        echo json_encode(['status' => true, 'message' => 'Logout berhasil.']);
    }

}