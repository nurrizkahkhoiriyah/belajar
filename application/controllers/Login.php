<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        
    }

    public function index(){
        $this->load->view('view_login');
    }


    public function proses_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'trim|required', array('required' => '%s harus diisi'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => '%s harus diisi'));

		if ($this->form_validation->run() == FALSE) {
			$ret['status'] = false;
			foreach ($_POST as $key => $value) {
				$ret['error'][$key] = form_error($key);
			}
		} else {
			$q = $this->User_model->login($username, $password);
			if ($q->num_rows() > 0) {

				$sess = array(
					'is_login' => TRUE,
					'username' => $q->row()->username
				);

				$this->session->set_userdata($sess);

				$ret = array(
					'username' => $username,
					'password' => $password,
					'error' => '',
					'status' => true,
					'message' => 'Login Berhasil',
				);
			} else {
				$ret = array(
					'element' => '',
					'error' => '',
					'status' => false,
					'message' => 'Username atau Password Salah'
				);
			}
		}
    
        // Validasi input kosong
        // if (empty($username) && empty($password)) {
        //     $ret = array(
        //         'status' => '5',
        //         'usernameMessage' => 'Username harus diisi',
        //         'passwordMessage' => 'Password harus diisi'
        //     );
        // } else if (empty($username)) {
        //     $ret = array(
        //         'status' => '2',
        //         'usernameMessage' => 'Username harus diisi'
        //     );
        // } else if (empty($password)) {
        //     $ret = array(
        //         'status' => '3',
        //         'passwordMessage' => 'Password harus diisi'
        //     );
        // } else {
        //     // Cek database
        //     $user = $this->User_model->check_user($username, $password);
        //     if ($user) {
        //         // Simpan data user di session jika diperlukan
        //         //$this->session->set_flashdata('success', 'Selamat datang, ' . $user->username . '!');
        //         $this->session->set_userdata('user_id', $user->id);
        //         $this->session->set_userdata('username', $user->username);
        //         $this->session->set_flashdata('login_success', 'Selamat Datang di Dashboard!');
        //         $ret = array(
        //             'status' => '1',
        //             'message' => 'Login berhasil',
        //             'redirect' => base_url('admin') 
        //         );
        //     } else {
        //         $ret = array(
        //             'status' => '4',
        //             'message' => 'Login gagal. Username atau password salah.'
        //         );
        //     }
    
        echo json_encode($ret);
    
    }

    public function logout() {
        $this->session->sess_destroy();
        echo json_encode(['status' => true, 'message' => 'Logout berhasil.']);
    }
 

}