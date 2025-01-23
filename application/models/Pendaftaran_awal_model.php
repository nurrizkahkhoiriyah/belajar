<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_awal_model extends CI_Model{

    protected $tableTahunPelajaran = 'data_tahun_pelajaran';
	protected $tableKelas = 'data_kelas';
	protected $tableJurusan = 'data_jurusan';
    protected $tableDataKelas = 'pendaftaran_awal_kelas';
	protected $tableDataSiswa = 'pendaftaran_awal_data_siswa';
	protected $tableDataOrtu = 'pendaftaran_awal_data_ortu';
	protected $tablePendaftaranAwal = 'pendaftaran_awal';

    public function __construct(){
		parent::__construct();
	}


    //pendaftaran awal
	public function getAllPendaftaranAwalNotDeleted(){
        $this->db->select($this->tablePendaftaranAwal . '.*, ' . $this->tableTahunPelajaran . '.nama_tahun_pelajaran, ' . $this->tableJurusan . '.nama_jurusan' . $this->tableKelas . '.nama_kelas');
		$this->db->join($this->tableJurusan, $this->tableJurusan . '.id = ' . $this->tablePendaftaranAwal . '.id_jurusan');
		$this->db->join($this->tableTahunPelajaran, $this->tableTahunPelajaran . '.id = ' . $this->tablePendaftaranAwal . '.id_tahun_pelajaran');
		$this->db->join($this->tableKelas, $this->tableKelas . '.id = ' . $this->tablePendaftaranAwal . '.id_kelas');
		$this->db->where('deleted_at', 0);
		return $this->db->get($this->tablePendaftaranAwal);
	}

	public function getPendaftaranAwalByID($id){
		$this->db->where($this->tablePendaftaranAwal . '.id', $id);
		return $this->db->get($this->tablePendaftaranAwal);
	}

    public function updatePendaftaranAwal($id, $data){
        $this->db->where('id', $id);
		$this->db->update($this->tablePendaftaranAwal, $data);
		return $this->db->affected_rows();
    }

    public function insertPendaftaranAwal($data){
        $this->db->insert($this->tablePendaftaranAwal, $data);
		return $this->db->insert_id();
    }

    public function getAllTahunPelajaranNotDeleted(){
        $this->db->where('deleted_at', 0);
		return  $this->db->get($this->tableTahunPelajaran);
    }

    public function getJurusanByTahunPelajaranID($id){
        $this->db->where('deleted_at', 0);
		$this->db->where('id_tahun_pelajaran', $id);
		return $this->db->get($this->tableJurusan);
    }

    public function getTableDataKelas(){
        $this->db->select('no_pendaftaran, id_tahun_pelajaran, id_jurusan, id_kelas');
        $this->db->from($this->tablePendaftaranAwal); 
        $query = $this->db->get();
        return $query;
    }

}
