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
    
        // Validasi input kosong
        if (empty($username) && empty($password)) {
            $ret = array(
                'status' => '5',
                'usernameMessage' => 'Username harus diisi',
                'passwordMessage' => 'Password harus diisi'
            );
        } else if (empty($username)) {
            $ret = array(
                'status' => '2',
                'usernameMessage' => 'Username harus diisi'
            );
        } else if (empty($password)) {
            $ret = array(
                'status' => '3',
                'passwordMessage' => 'Password harus diisi'
            );
        } else {
            // Cek database
            $user = $this->User_model->check_user($username, $password);
            if ($user) {
                // Simpan data user di session jika diperlukan
                //$this->session->set_flashdata('success', 'Selamat datang, ' . $user->username . '!');
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('username', $user->username);
                $this->session->set_flashdata('login_success', 'Selamat Datang di Dashboard!');
                $ret = array(
                    'status' => '1',
                    'message' => 'Login berhasil',
                    'redirect' => base_url('dashboard') 
                );
            } else {
                $ret = array(
                    'status' => '4',
                    'message' => 'Login gagal. Username atau password salah.'
                );
            }
            // $this->form_validation->set_rules('username', 'Username', 'required|trim');
            // $this->form_validation->set_rules('password', 'Password', 'required|trim');

            // if ($this->form_validation->run() == FALSE) {
            //     $this->load->view('login'); // Kembali ke form login jika validasi gagal
            // } else {
            //     $username = $this->input->post('username');
            //     $password = $this->input->post('password');

            //     // Panggil model untuk cek pengguna
            //     $this->load->model('User_model');
            //     $user = $this->User_model->check_user($username, $password);

            //     if ($user) {
            //         // Login sukses, set session
            //         $this->session->set_userdata('user_id', $user->id);
            //         $this->session->set_userdata('username', $user->username);

            //         redirect('dashboard'); // Alihkan ke halaman dashboard
            //     } else {
            //         // Login gagal, tampilkan pesan error
            //         $this->session->set_flashdata('error', 'Username atau password salah!');
            //         redirect('login');
            //     }
            // }
    
        echo json_encode($ret);
        }
    }

    public function logout() {
        // Hapus semua session dan logout
        $this->session->sess_destroy();
        redirect('login');
    }
    

        // $user = $this->User_model->get_user($username, $password);
        // if ($user) {
        //     $this->session->set_userdata('user', $user);
        //     redirect('dashboard');
        // } else {
        //     $this->session->set_flashdata('error', 'Username atau password salah');
        //     redirect('login');
        // }
        

}
