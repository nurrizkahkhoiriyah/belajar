<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterdata_model extends CI_Model
{

	protected $tableTahunPelajaran = 'data_tahun_pelajaran';
	protected $tableKelas = 'data_kelas';
	protected $tableJurusan = 'data_jurusan';

	public function __construct()
	{
		parent::__construct();
	}


	public function getAllTahunPelajaran()
	{
		return  $this->db->get($this->tableTahunPelajaran);
	}

	public function getTahunPelajaranByID($id = null){
		// $this->db->where('id', $id);
        // $this->db->where('deleted_at IS NULL'); // Data yang sudah dihapus tidak akan diambil
        // $query = $this->db->get($this->tableTahunPelajaran);
        // return $query->row_array(); 

		$q = $this->db->where('id', $id)->get($this->tableTahunPelajaran);
		return $q;
	}

	public function getAllKelas() {
		return  $this->db->get($this->tableKelas);
	}

	public function getKelasByID($id = null){
		// $this->db->where('id', $id);
        // $this->db->where('deleted_at IS NULL'); // Data yang sudah dihapus tidak akan diambil
        // $query = $this->db->get($this->tableTahunPelajaran);
        // return $query->row_array(); 

		$q = $this->db->where('id', $id)->get($this->tableTahunPelajaran);
		return $q;
	}

	public function getAllJurusan() {
		return  $this->db->get($this->tableJurusan);
	}

	public function getJurusanByID($id = null){
		// $this->db->where('id', $id);
        // $this->db->where('deleted_at IS NULL'); // Data yang sudah dihapus tidak akan diambil
        // $query = $this->db->get($this->tableTahunPelajaran);
        // return $query->row_array(); 

		$q = $this->db->where('id', $id)->get($this->tableTahunPelajaran);
		return $q;
	}

	public function deleteTahunPelajaran($id = null)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->tableTahunPelajaran);
		return $this->db->affected_rows();
	}

	public function deleteJurusan($id = null)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->tableJurusan);
		return $this->db->affected_rows();
	}

	public function deleteKelas($id = null)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->tableJurusan);
		return $this->db->affected_rows();
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

}
