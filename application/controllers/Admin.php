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
 		$this->load->library('pdf');
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
 			'konsumen'  => $this->konsumen->tampil_konsumen('tb_konsumen'),
 			'title' => 'Halaman Data Konsumen',
 			'id_tabel' => 'tabel_konsumen'
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/data_konsumen', $data);
 		$this->load->view('admin/templet/footer', $data);
 	}
 	public function halaman_tambah_konsumen(){
 		$data = [
 			'title' => 'Halaman Tambah Konsumen',
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/halaman_tambah_konsumnen');
 		$this->load->view('admin/templet/footer');
 	}
 	public function tambah_konsumen(){

 		$id_konsumen = $this->input->post('id_konsumen');
 		$noktp		 = $this->input->post('noktp');
 		$alamat		 = $this->input->post('alamat');
 		$nama		 = $this->input->post('nama');
 		$status		 = $this->input->post('status');
 		$nohp		 = $this->input->post('nohp');
 		$pekerjaan   = $this->input->post('pekerjaan');

 		$data        = [
 			'id_konsumen' => $id_konsumen,
 			'noktp'       => $noktp,
 			'alamat' 	  => $alamat,
 			'nama'		  => $nama,
 			'status'      => $status,
 			'nohp'		  => $nohp,
 			'pekerjaan'   => $pekerjaan
 		];


 		$tambah = $this->konsumen->tambah_konsumen('tb_konsumen', $data);

 		if($tambah){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
 			redirect('Admin/data_konsumen');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
 			redirect('Admin/data_konsumen');
 		}

 	}
 	public function hapus_konsumen($id){

 		$where = ['id_konsumen' => $id];
 		$hapus = $this->konsumen->hapus_konsumen('tb_konsumen', $where);

 		if($hapus){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
 			redirect('Admin/data_konsumen');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
 			redirect('Admin/data_konsumen');
 		}
 	}
 	public function halaman_edit_konsumen($id){
 		$data = [
 			'konsumen' => $this->konsumen->tampil_konsumen('tb_konsumen',['id_konsumen' => $id]),
 			'title' => 'Halaman Edit Konsumen',
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/halaman_edit_konsumen', $data);
 		$this->load->view('admin/templet/footer');
 	}
 	public function edit_konsumen(){

 		$id_konsumen = $this->input->post('id_konsumen');
 		$noktp		 = $this->input->post('noktp');
 		$alamat		 = $this->input->post('alamat');
 		$nama		 = $this->input->post('nama');
 		$status		 = $this->input->post('status');
 		$nohp		 = $this->input->post('nohp');
 		$pekerjaan   = $this->input->post('pekerjaan');

 		$where       = ['id_konsumen' => $this->input->post('id_konsumen_lama')];

 		$data        = [
 			'id_konsumen' => $id_konsumen,
 			'noktp'       => $noktp,
 			'alamat' 	  => $alamat,
 			'nama'		  => $nama,
 			'status'      => $status,
 			'nohp'		  => $nohp,
 			'pekerjaan'   => $pekerjaan
 		];

 		$edit = $this->konsumen->edit_konsumen('tb_konsumen',$where, $data);

 		if($edit){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
 			redirect('Admin/data_konsumen');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
 			redirect('Admin/data_konsumen');
 		}

 	}

 	public function data_kavling(){
 		$data = [
 			'kavling'  => $this->kavling->tampil_kavling('tb_kavling'),
 			'title' => 'Halaman Data kavling',
 			'id_tabel' => 'tabel_kavling'
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/data_kavling', $data);
 		$this->load->view('admin/templet/footer', $data);
 	}
 	public function halaman_tambah_kavling(){
 		$data = [
 			'title'    => 'Halaman Tambah Data kavling',
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/halaman_tambah_kavling');
 		$this->load->view('admin/templet/footer');
 	}
 	public function tambah_kavling(){
 		$id_kavling 	 = $this->input->post('id_kavling');
 		$noblock		 = $this->input->post('no_block');
 		$luas_tanah		 = $this->input->post('luas_tanah');
 		$no_sertifikat	 = $this->input->post('no_sertifikat');

 		$data        = [
 			'id_block' 	    => $id_kavling,
 			'noblock'   	=> $noblock,
 			'luas_tanah' 	=> $luas_tanah,
 			'no_sertifikat' => $no_sertifikat,
 		];

 		$tambah = $this->kavling->tambah_kavling('tb_kavling', $data);

 		if($tambah){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
 			redirect('Admin/data_kavling');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
 			redirect('Admin/data_kavling');
 		}

 	}
 	public function hapus_kavling($id){
 		$where = ['id_block' => $id];
 		$hapus = $this->kavling->hapus_kavling('tb_kavling', $where);

 		if($hapus){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
 			redirect('Admin/data_kavling');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
 			redirect('Admin/data_kavling');
 		}
 	}
 	public function halaman_edit_kavling($id){
 		$where = ['id_block' => $id];
 		$data = [
 			'kavling'  => $this->kavling->tampil_kavling('tb_kavling', $where),
 			'title'    => 'Halaman Edit Data kavling',
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/halaman_edit_kavling',$data);
 		$this->load->view('admin/templet/footer');
 	}
 	public function edit_kavling(){
 		$id_kavling 	 = $this->input->post('id_kavling');
 		$noblock		 = $this->input->post('no_block');
 		$luas_tanah		 = $this->input->post('luas_tanah');
 		$no_sertifikat	 = $this->input->post('no_sertifikat');

 		$where = ['id_block' => $this->input->post('id_kavling_lama')];

 		$data        = [
 			'id_block' 	    => $id_kavling,
 			'noblock'   	=> $noblock,
 			'luas_tanah' 	=> $luas_tanah,
 			'no_sertifikat' => $no_sertifikat,
 		];

 		$edit = $this->kavling->edit_kavling('tb_kavling',$where, $data);

 		if($edit){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
 			redirect('Admin/data_kavling');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
 			redirect('Admin/data_kavling');
 		}


 	}
 	public function data_tukang(){
 		$data = [
 			'tukang'  => $this->tukang->tampil_tukang('tb_tukang'),
 			'title' => 'Halaman Data Tukang',
 			'id_tabel' => 'tabel_tukang'
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/data_tukang', $data);
 		$this->load->view('admin/templet/footer', $data);
 	}
 	public function halaman_tambah_tukang(){
 		$data = [
 			'title' => 'Halaman Tambah Tukang',
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/halaman_tambah_tukang');
 		$this->load->view('admin/templet/footer', $data);
 	}
 	public function tambah_tukang(){
 		$id_tukang = $this->input->post('id_tukang');
 		$nama 	   = $this->input->post('nama');
 		$jabatan   = $this->input->post('jabatan');
 		$alamat    = $this->input->post('alamat');
 		$nohp 	   = $this->input->post('nohp');

 		$data        = [
 			'id_tukang' 	    => $id_tukang,
 			'nama_tukang'   	=> $nama,
 			'jabatan' 			=> $jabatan,
 			'alamat' 			=> $alamat,
 			'nohp' 				=> $nohp,
 		];

 		$tambah = $this->tukang->tambah_tukang('tb_tukang', $data);

 		if($tambah){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
 			redirect('Admin/data_tukang');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
 			redirect('Admin/data_tukang');
 		}

 	}
 	public function hapus_tukang($id){
 		$where = ['id_tukang' => $id];
 		$hapus = $this->tukang->hapus_tukang('tb_tukang', $where);

 		if($hapus){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
 			redirect('Admin/data_tukang');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
 			redirect('Admin/data_tukang');
 		}
 	}
 	public function halaman_edit_tukang($id){
 		$where = ['id_tukang' => $id];
 		$data = [
 			'tukang'  => $this->tukang->tampil_tukang('tb_tukang', $where),
 			'title'    => 'Halaman Edit Data Tukang',
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/halaman_edit_tukang',$data);
 		$this->load->view('admin/templet/footer');
 	}
 	public function edit_tukang(){
 		$id_tukang = $this->input->post('id_tukang');
 		$nama 	   = $this->input->post('nama');
 		$jabatan   = $this->input->post('jabatan');
 		$alamat    = $this->input->post('alamat');
 		$nohp 	   = $this->input->post('nohp');

 		$where     = ['id_tukang' => $this->input->post('id_tukang_lama')];

 		$data        = [
 			'id_tukang' 	    => $id_tukang,
 			'nama_tukang'   	=> $nama,
 			'jabatan' 			=> $jabatan,
 			'alamat' 			=> $alamat,
 			'nohp' 				=> $nohp,
 		];

 		$edit = $this->tukang->edit_tukang('tb_tukang',$where, $data);

 		if($edit){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
 			redirect('Admin/data_tukang');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
 			redirect('Admin/data_tukang');
 		}

 	}
 	public function pembayaran_cash(){
 		$data = [
 			'cash'  => $this->cash->tampil_cash('tb_cash'),
 			'title' => 'Halaman Data Cash',
 			'id_tabel' => 'tabel_cash'
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/data_cash', $data);
 		$this->load->view('admin/templet/footer', $data);
 	}
 	public function halaman_tambah_cash(){
 		$data = [
 			'konsumen' => $this->konsumen->tampil_konsumen('tb_konsumen'),
 			'block'	   => $this->kavling->tampil_kavling('tb_kavling'),
 			'title' => 'Halaman Tambah Pembayaran Cash',
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/halaman_tambah_cash', $data);
 		$this->load->view('admin/templet/footer');
 	}

 	public function tambah_cash(){

 		$id_cash   		= $this->input->post('id_cash');
 		$id_konsumen   	= $this->input->post('id_konsumen');
 		$block   		= $this->input->post('block');
 		$type   		= $this->input->post('type');
 		$spesifikasi   	= $this->input->post('spesifikasi');
 		$harga   		= $this->input->post('harga');
 		$uang_muka   	= $this->input->post('uang_muka');
 		$pembayaran  	= $this->input->post('pembayaran');
 		$jumblah   		= $this->input->post('jumblah');
 		$keterangan   	= $this->input->post('keterangan');
 		
 		$data           = [
 			'id_cash'   	=> $id_cash,
 			'id_konsumen'   => $id_konsumen,
 			'id_block'   	=> $block,
 			'type'   		=> $type,
 			'spesifikasi'   => $spesifikasi,
 			'harga'   		=> $harga,
 			'dp'   			=> $uang_muka,
 			'pembayaran'   	=> $pembayaran,
 			'jumblah'   	=> $jumblah,
 			'keterangan'   	=> $keterangan,
 		];

 		$tambah             = $this->cash->tambah_cash('tb_cash', $data);

 		if($tambah){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
 			redirect('Admin/pembayaran_cash');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
 			redirect('Admin/pembayaran_cash');
 		}
 	}

 	public function hapus_cash($id){
 		$where = ['id_cash' => $id];
 		$hapus = $this->cash->hapus_cash('tb_cash', $where);

 		if($hapus){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
 			redirect('Admin/pembayaran_cash');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
 			redirect('Admin/pembayaran_cash');
 		}
 	}

 	public function halaman_edit_cash($id){
 		$where        = ['id_cash' => $id];
 		$data = [
 			'cash'     => $this->cash->tampil_cash('tb_cash', $where),
 			'konsumen' => $this->konsumen->tampil_konsumen('tb_konsumen'),
 			'block'	   => $this->kavling->tampil_kavling('tb_kavling'),
 			'title' => 'Halaman Edit Pembayaran Cash',
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/halaman_edit_cash', $data);
 		$this->load->view('admin/templet/footer');
 	}
 	public function edit_cash(){
 		$id_cash   		= $this->input->post('id_cash');
 		$id_konsumen   	= $this->input->post('id_konsumen');
 		$block   		= $this->input->post('block');
 		$type   		= $this->input->post('type');
 		$spesifikasi   	= $this->input->post('spesifikasi');
 		$harga   		= $this->input->post('harga');
 		$uang_muka   	= $this->input->post('uang_muka');
 		$pembayaran  	= $this->input->post('pembayaran');
 		$jumblah   		= $this->input->post('jumblah');
 		$keterangan   	= $this->input->post('keterangan');

 		$where          = ['id_cash' => $this->input->post('id_cash_lama')];
 		
 		$data           = [
 			'id_cash'   	=> $id_cash,
 			'id_konsumen'   => $id_konsumen,
 			'id_block'   	=> $block,
 			'type'   		=> $type,
 			'spesifikasi'   => $spesifikasi,
 			'harga'   		=> $harga,
 			'dp'   			=> $uang_muka,
 			'pembayaran'   	=> $pembayaran,
 			'jumblah'   	=> $jumblah,
 			'keterangan'   	=> $keterangan,
 		];

 		$edit = $this->cash->edit_cash('tb_cash',$where, $data);

 		if($edit){
 			$this->session->set_flashdata('pesan','<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
 			redirect('Admin/pembayaran_cash');
 		}else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
 			redirect('Admin/pembayaran_cash');
 		}
 	}
 	public function halaman_detail_cash($id){
 		$where        = ['id_cash' => $id];
 		$data = [
 			'cash'     => $this->cash->tampil_cash('tb_cash', $where),
 			'title'    => 'Halaman Edit Pembayaran Cash',
 		];

 		$this->load->view('admin/templet/header', $data);
 		$this->load->view('admin/templet/sidebar');
 		$this->load->view('admin/halaman_detail_cash', $data);
 		$this->load->view('admin/templet/footer');
 	}
 	public function cetak_laporan($nama, $table){
 		$model = "tampil_{$nama}";
 		$data = [
 			$nama =>  $this->$nama->$model($table),
 			'role' => $nama,
 			'nama_laporan' => "laporan data {$nama}"
 		];

 		$this->pdf->setPaper('A4', 'potrait');
 		$this->pdf->filename = "laporan_{$nama}.pdf";
 		$this->pdf->load_view('admin/laporan_pdf', $data);
 	}


 }




