<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_pelajaran extends CI_Controller
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
			'content' => 'backend/tahunPelajaranKonten',
			'title' => 'Admin'
		);
		$this->load->view('template', $data);
	}

	public function table_tahun_pelajaran()
	{

		$q = $this->md->getAllTahunPelajaran();
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
		$data = $this->md->getTahunPelajaranByID($id);

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
		$q = $this->md->deleteTahunPelajaran($id);

		if ($q) {
			$ret['status'] = true;
			$ret['message'] = 'Data berhasil dihapus';
		} else {
			$ret['status'] = false;
			$ret['message'] = 'Data gagal dihapus';
		}

		echo json_encode($ret);
	}

	public function save() {
        $id = $this->input->post('id');
        $nama_tahun_pelajaran = $this->input->post('nama_tahun_pelajaran');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $status_tahun_pelajaran = $this->input->post('status_tahun_pelajaran');

        if (empty($nama_tahun_pelajaran) || empty($tanggal_mulai) || empty($tanggal_akhir)) {
            echo json_encode([
                'status' => false,
                'message' => 'Harap isi semua field wajib.'
            ]);
            return;
        }

        $data = [
            'nama_tahun_pelajaran' => $nama_tahun_pelajaran,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_akhir' => $tanggal_akhir,
            'status_tahun_pelajaran' => $status_tahun_pelajaran
        ];

        if (empty($id)) {
            $result = $this->md->insert($data);
        } else {
            $result = $this->md->update($id, $data);
        }

        if ($result) {
            echo json_encode([
                'status' => true,
                'message' => empty($id) ? 'Data berhasil ditambahkan.' : 'Data berhasil diperbarui.'
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.'
            ]);
        }
    }
}