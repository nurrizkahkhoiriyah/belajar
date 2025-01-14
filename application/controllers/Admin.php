<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

        if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	public function index()
	{

		$data = array(
			'menu' => 'backend/menu',
			'content' => 'backend/adminKonten',
			'title' => 'Admin'
		);
		$this->load->view('template', $data);
	}

    public function logout() {
        $this->session->sess_destroy();
        echo json_encode(['status' => true, 'message' => 'Logout berhasil.']);
    }
}
