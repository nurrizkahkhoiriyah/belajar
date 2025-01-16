<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seragam extends CI_Controller
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
			'content' => 'backend/seragamKonten',
			'title' => 'Admin'
		);
		$this->load->view('template', $data);
	}

	public function tabel_seragam()
	{

		$q = $this->md->getAllSeragamNotDeleted();
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

	public function saveSeragam(){
		$id = $this->input->post('id');
		$nama_seragam = $this->input->post('nama_seragam');

		$data = array(
			'nama_seragam' => $nama_seragam,

			'updated_at' => date('Y-m-d H:i:s'),
			'deleted_at' => 0
		);

		if ($id) {
			$q = $this->md->updateSeragam($id, $data);
			if ($q) {
				$ret['status'] = true;
				$ret['message'] = 'Data berhasil diupdate';
			} else {
				$ret['status'] = false;
				$ret['message'] = 'Data gagal diupdate';
			}
		} else {
			$data['created_at'] = date('Y-m-d H:i:s');
			$q = $this->md->insertSeragam($data);

			if ($q) {
				$ret['status'] = true;
				$ret['message'] = 'Data berhasil disimpan';
			} else {
				$ret['status'] = false;
				$ret['message'] = 'Data gagal disimpan';
			}
		}


		echo json_encode($ret);
	}
	

    public function editSeragam()
	{

		$id = $this->input->post('id');
		$q = $this->md->getSeragamByID($id);

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

    public function deleteSeragam()
	{

		$id = $this->input->post('id');
		$q = $this->md->deleteSeragam($id);

		if ($q) {
			$ret['status'] = true;
			$ret['message'] = 'Data berhasil dihapus';
		} else {
			$ret['status'] = false;
			$ret['message'] = 'Data gagal dihapus';
		}

		echo json_encode($ret);
	}


    // stok
    public function table_stok()
	{

		$q = $this->md->getAllStokNotDeleted();
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

    public function option_tahun_pelajaran()
	{
		$q = $this->md->getAllTahunPelajaranNotDeleted();
		$ret = '<option value="">Pilih Tahun Pelajaran</option>';
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$ret .= '<option value="' . $row->id . '">' . $row->nama_tahun_pelajaran . '</option>';
			}
		}
		echo $ret;
	}

	public function option_jurusan($id)
	{

		$q = $this->md->getJurusanByTahunPelajaranID($id);
		$ret = '<option value="">Pilih Jurusan</option>';
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$ret .= '<option value="' . $row->id . '">' . $row->nama_jurusan . '</option>';
			}
		}
		echo $ret;
	}

    public function option_kelas($id)
	{

		$q = $this->md->getKelasByJurusanID($id);
		$ret = '<option value="">Pilih Kelas</option>';
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$ret .= '<option value="' . $row->id . '">' . $row->nama_kelas . '</option>';
			}
		}
		echo $ret;
	}

    public function option_seragam()
	{

		$q = $this->md->getAllSeragamNotDeleted();
		$ret = '<option value="">Pilih Seragam</option>';
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$ret .= '<option value="' . $row->id . '">' . $row->nama_seragam . '</option>';
			}
		}
		echo $ret;
	}

    public function saveStok()
	{	
		$id = $this->input->post('id');
		$data['id_seragam'] = $this->input->post('id_seragam');
		$data['id_tahun_pelajaran'] = $this->input->post('id_tahun_pelajaran');
		$data['id_jurusan'] = $this->input->post('id_jurusan');
		$data['id_kelas'] = $this->input->post('id_kelas');
		$data['ukuran'] = $this->input->post('ukuran');
		$data['stok'] = $this->input->post('stok');

		$data['updated_at'] = date('Y-m-d H:i:s');
		$data['deleted_at'] = 0;

		if ($id) {
			$q = $this->md->updateStok($id, $data);
			if ($q) {
				$ret['status'] = true;
				$ret['message'] = 'Data berhasil diupdate';
			} else {
				$ret['status'] = false;
				$ret['message'] = 'Data gagal diupdate';
			}
		} else {
			$data['created_at'] = date('Y-m-d H:i:s');
			$q = $this->md->insertStok($data);

			if ($q) {
				$ret['status'] = true;
				$ret['message'] = 'Data berhasil disimpan';
			} else {
				$ret['status'] = false;
				$ret['message'] = 'Data gagal disimpan';
			}
		}
    	echo json_encode($ret);
    }

    public function editStok()
	{

		$id = $this->input->post('id');
		$q = $this->md->getStokByID($id);

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

    public function deleteStok()
	{

		$id = $this->input->post('id');
		$q = $this->md->deleteStok($id);

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