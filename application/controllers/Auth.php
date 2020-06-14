<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 ini adalah controller login semua logic di sini
 */
class Auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth', 'auth');
	}
	public function index(){
		$this->load->view('login');
	}
	public function proses_login(){

		$this->form_validation->set_rules("username","username","required|trim",[
			'required' => 'Username Harus Di isi'
		]);
		$this->form_validation->set_rules("password","password","required|trim",[
			'required' => 'Password Harus Di isi'
		]);

		if($this->form_validation->run()  === false){
			$this->load->view('login');
		}else{
			$username =trim(htmlspecialchars($this->input->post('username')));
			$password =sha1($this->input->post('password'));

			$where  = ['username' => $username, 'password' => $password];

			$cek_login = $this->auth->cek_login('tb_user', $where);

			if($cek_login->num_rows() > 0){
				
				$data_admin = $cek_login->row();

				$userdata = [
					'username' => $data_admin->username,
					'Logged_in' => true
				];

				$this->session->set_userdata($userdata);

				redirect('Admin');

			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Maaf Password/Username Anda Salah</div>');
				redirect('Auth');
			}
		}

	}
}