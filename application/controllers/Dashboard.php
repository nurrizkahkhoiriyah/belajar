<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');

		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
		
	}


	public function index(){
		$loggedInUserId = $this->session->userdata('user_id');
		$data['loggedInUserId'] = $loggedInUserId;

		$q = $this->User_model->getUserAll();
		$data['users'] = $q;

		$this->load->view('view_dashboard', $data);
	}

	public function get_all(){
		$q = $this->User_model->getUserAll(); 
		echo json_encode($q); 
	}

	public function save(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
	
		$this->User_model->insertUser($data);
		$users = $this->User_model->getUserAll();
		echo json_encode($users);
	}


	public function update_user(){
		$id = $this->input->post('id');

		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$update = $this->User_model->updateUser($id, $data);
		echo json_encode($update);
	}

	public function edit($id = null){
		$edit = $this->User_model->getUserByID($id);
		echo json_encode($edit);
	}

	public function delete($id = null){
		$id = $this->input->post('id');

		$delete = $this->User_model->deleteUser($id);
		echo json_encode($delete);

	}

	public function logout() {
        $this->session->sess_destroy();
        echo json_encode(['status' => true, 'message' => 'Logout berhasil.']);
    }
}