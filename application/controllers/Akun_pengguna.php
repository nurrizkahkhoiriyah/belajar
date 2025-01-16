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
        $q = $this->md->getAllUserDeleted();
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

	public function save()
	{	
		$id = $this->input->post('id');
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['created_at'] = date('Y-m-d H:i:s');
		$data['updated_at'] = date('Y-m-d H:i:s');
		$data['deleted_at'] = 0;

		if ($data['username']) {
			$cek = $this->md->cekUsernameDuplicate($data['username'], $id);
			if ($cek->num_rows() > 0) {
				$ret['status'] = false;
				$ret['message'] = 'Username sudah ada';
				$ret['query'] = $this->db->last_query();
			} else {

				if ($id) {
					$update = $this->md->updateUser($id, $data);
					if ($update) {
						$ret = array(
							'status' => true,
							'message' => 'Data berhasil diupdate'
						);
					} else {
						$ret = array(
							'status' => false,
							'message' => 'Data gagal diupdate'
						);
					}
				} else {
					$insert = $this->md->insertUser($data);

					if ($insert) {
						$ret = array(
							'status' => true,
							'message' => 'Data berhasil disimpan'
						);
					} else {
						$ret = array(
							'status' => false,
							'message' => 'Data gagal disimpan'
						);
					}
				}
			
			}
		} else {
			$ret['status'] = false;
			$ret['message'] = 'Data tidak boleh kosong';
            $ret['query'] = $this->db->last_query();
		}
		echo json_encode($ret);
	}

	public function edit()
	{

		$id = $this->input->post('id');
		$q = $this->md->getUsernameByID($id);

		if ($q->num_rows() > 0) {
			$ret = array(
				'status' => true,
				'data' => $q->row(),
				'message' => '',
			);
		} else {
			$ret = array(
				'status' => false,
				'data' => [],
				'message' => 'Data tidak ditemukan',
				'query' => $this->db->last_query()
			);
		}

		echo json_encode($ret);
	}

	public function delete()
	{

		$id = $this->input->post('id');
		$q = $this->md->deleteUser($id);

		if ($q) {
			$ret['status'] = true;
			$ret['message'] = 'Data berhasil dihapus';
		} else {
			$ret['status'] = false;
			$ret['message'] = 'Data gagal dihapus';
		}

		echo json_encode($ret);
	}


	public function logout() {
        $this->session->sess_destroy();
        echo json_encode(['status' => true, 'message' => 'Logout berhasil.']);
    }

}