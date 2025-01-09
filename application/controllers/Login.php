<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('view_login');
    }

    public function proses_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if($email == 'admin' && $password == '12345'){
            $ret=array(
                'status' => '1',
                'message' => 'Login Berhasil',
                'email' => $email,
                'password' => $password
            );
        } else if(empty($email)){
            $ret=array(
                'status' => '2',
                'message' => 'Email harus diisi'
            );
        } else if(empty($password)){
            $ret=array(
                'status' => '3',
                'message' => 'Password harus diisi'
            );
        } else if(empty($password) && empty($email)){
            $ret=array(
                'status' => '4',
                'message' => 'Login Gagal'
            );
        }else {
            $ret=array(
                'status' => false,
                'message' => 'login gagal'
            );
        }
        
        echo json_encode($ret);
    }
}