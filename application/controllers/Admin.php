<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 ini adalah conyroller admin
 */
 class Admin extends CI_Controller
 {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('M_user','user');
 		$this->load->model('M_konsumen','konsumen');
 		$this->load->model('M_kavling','kavling');
 		$this->load->model('M_tukang','tukang');
 		$this->load->model('M_cash','cash');
 	}
 	public function index(){
 		$data = [
 			'title' => 'Halaman Dashboard'
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/dashboard');
 		$this->load->view('admin/templet/footer');
 	}
 	public function data_user(){
 		$data = [
 			'user'  => $this->user->tampil_user('tb_user'),
 			'title' => 'Halaman Data User',
 			'id_tabel' => 'tabel_user'
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/data_user', $data);
 		$this->load->view('admin/templet/footer', $data);
 	}
 	public function halaman_tambah_user(){
 		$data = [
 			'title' => 'Halaman Tambah User',
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/halaman_tambah_user');
 		$this->load->view('admin/templet/footer');
 	}
 	public function tambah_user(){

 		$data = [
 			'id_user' => htmlspecialchars($this->input->post('id_user')),
 			'username' =>htmlspecialchars(trim($this->input->post('username'))),
 			'password' => htmlspecialchars(sha1($this->input->post('password')))
 		];

 		$tambah = $this->user->tambah_user('tb_user', $data);

 		if($tambah){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
 			redirect('Admin/data_user');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
 			redirect('Admin/data_user');
 		}

 	}
 	public function hapus_user($id){
 		$where = ['id_user'=> $id];

 		$delete = $this->user->hapus_user('tb_user', $where);
 		if($delete){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
 			redirect('Admin/data_user');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
 			redirect('Admin/data_user');
 		}
 	}
 	public function halaman_edit_user($id){
 		$data = [
 			'user' => $this->user->tampil_user('tb_user',['id_user' => $id]),
 			'title' => 'Halaman Edit User',
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/halaman_edit_user', $data);
 		$this->load->view('admin/templet/footer');
 	}
 	public function edit_user(){
 		$id_user_lama  = htmlspecialchars($this->input->post('id_user_lama'));
 		$id_user_baru  = htmlspecialchars($this->input->post('id_user'));
 		$username      = htmlspecialchars($this->input->post('username'));
 		$password_baru = htmlspecialchars($this->input->post('password'));
 		$password_lama = htmlspecialchars($this->input->post('password_lama'));

 		if($password_baru == ''){
 			$password = $password_lama;
 		}else{
 			$password = sha1($password_baru);
 		}

 		$where = ['id_user' => $id_user_lama];

 		$data = [
 			'id_user' => $id_user_baru,
 			'username' => $username,
 			'password' => $password
 		];

 		$edit = $this->user->edit_user('tb_user', $where, $data);

 		if($edit){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
 			redirect('Admin/data_user');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
 			redirect('Admin/data_user');
 		}

 	}
 	public function data_konsumen(){
 		$data = [
 			'konsumen'  => $this->konsumen->tampilDataKonsumen('tb_konsumen'),
 			'title' => 'Halaman Data Konsumen',
 			'id_tabel' => 'tabel_konsumen'
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/data_konsumen', $data);
 		$this->load->view('admin/templet/footer', $data);
 	}
 	public function halaman_tambah_konsumen(){
 		echo "hu";
 	}
 	public function tambah_konsumen(){

 	}
 	public function hapus_konsumen(){

 	}
 	public function halaman_edit_konsumen(){

 	}
 	public function edit_konsumen(){

 	}
 	public function data_kavling(){
 		$data = [
 			'kavling'  => $this->kavling->tampilDataKavling('tb_kavling'),
 			'title' => 'Halaman Data kavling',
 			'id_tabel' => 'tabel_kavling'
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/data_kavling', $data);
 		$this->load->view('admin/templet/footer', $data);
 	}
 	public function halaman_tambah_kavling(){
 		echo "hu";
 	}
 	public function tambah_kavling(){

 	}
 	public function hapus_kavling(){

 	}
 	public function halaman_edit_kavling(){

 	}
 	public function edit_kavling(){

 	}
 	public function data_tukang(){
 		$data = [
 			'tukang'  => $this->tukang->tampilDataTukang('tb_tukang'),
 			'title' => 'Halaman Data Tukang',
 			'id_tabel' => 'tabel_tukang'
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/data_tukang', $data);
 		$this->load->view('admin/templet/footer', $data);
 	}
 	public function halaman_tambah_tukang(){
 		echo "hu";
 	}
 	public function tambah_tukang(){

 	}
 	public function hapus_tukang(){

 	}
 	public function halaman_edit_tukang(){

 	}
 	public function edit_tukang(){

 	}
 	public function pembayaran_cash(){
 		$data = [
 			'tukang'  => $this->cash->tampilDataCash('tb_cash'),
 			'title' => 'Halaman Data Cash',
 			'id_tabel' => 'tabel_cash'
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/data_cash', $data);
 		$this->load->view('admin/templet/footer', $data);
 	}


 }