<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
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
			'content' => 'backend/kelasKonten',
			'title' => 'Admin'
		);
		$this->load->view('template', $data);
	}

	public function table_kelas()
	{

		$q = $this->md->getAllKelas();
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

	public function edit($id = null)
	{
		$id = $this->input->post('id');
		// $edit = $this->md->getTahunPelajaranByID($id);
		// echo json_encode($edit);
		

		 // ID dikirimkan melalui request POST
		$data = $this->md->getKelasByID($id);

		if (!$id) {
			echo json_encode(['status' => false, 'message' => 'ID tidak valid.']);
			return;
    	}

		if ($data) {
			echo json_encode(['status' => true, 'data' => $data]);
		} else {
			echo json_encode(['status' => false, 'message' => 'Data tidak ditemukan atau sudah dihapus.']);
		}
	}
	
	public function delete()
	{

		$id = $this->input->post('id');
		$q = $this->md->deleteKelas($id);

		if ($q) {
			$ret['status'] = true;
			$ret['message'] = 'Data berhasil dihapus';
		} else {
			$ret['status'] = false;
			$ret['message'] = 'Data gagal dihapus';
		}

		echo json_encode($ret);
	}
}
