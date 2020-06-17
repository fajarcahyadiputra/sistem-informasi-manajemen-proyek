<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 ini adalah conyroller admin
 */
class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user', 'user');
		$this->load->model('M_konsumen', 'konsumen');
		$this->load->model('M_kavling', 'kavling');
		$this->load->model('M_tukang', 'tukang');
		$this->load->model('M_cash', 'cash');
		$this->load->model('M_hutang', 'hutang');
		$this->load->model('M_penggajian', 'penggajian');
		$this->load->model('M_proses', 'proses');
		$this->load->model('M_pembelian', 'pembelian');
		$this->load->model('M_pengeluaran', 'pengeluaran');
		$this->load->model('M_inventaris', 'inventaris');
		$this->load->model('M_stok', 'stok');
		$this->load->library('pdf');
	}
	public function index()
	{
		$data = [
			'title' => 'Halaman Dashboard'
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/templet/footer');
	}
	public function data_user()
	{
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
	public function halaman_tambah_user()
	{
		$data = [
			'title' => 'Halaman Tambah User',
			'kode'  => $this->user->id_user('tb_user'),
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_user', $data);
		$this->load->view('admin/templet/footer');
	}
	public function tambah_user()
	{

		$data = [
			'id_user' => htmlspecialchars($this->input->post('id_user')),
			'username' => htmlspecialchars(trim($this->input->post('username'))),
			'password' => htmlspecialchars(sha1($this->input->post('password')))
		];

		$tambah = $this->user->tambah_user('tb_user', $data);

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/data_user');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/data_user');
		}
	}
	public function hapus_user($id)
	{
		$where = ['id_user' => $id];

		$delete = $this->user->hapus_user('tb_user', $where);
		if ($delete) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/data_user');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/data_user');
		}
	}
	public function halaman_edit_user($id)
	{
		$data = [
			'user' => $this->user->tampil_user('tb_user', ['id_user' => $id]),
			'title' => 'Halaman Edit User',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_edit_user', $data);
		$this->load->view('admin/templet/footer');
	}
	public function edit_user()
	{
		$id_user_lama  = htmlspecialchars($this->input->post('id_user_lama'));
		$id_user_baru  = htmlspecialchars($this->input->post('id_user'));
		$username      = htmlspecialchars($this->input->post('username'));
		$password_baru = htmlspecialchars($this->input->post('password'));
		$password_lama = htmlspecialchars($this->input->post('password_lama'));

		if ($password_baru == '') {
			$password = $password_lama;
		} else {
			$password = sha1($password_baru);
		}

		$where = ['id_user' => $id_user_lama];

		$data = [
			'id_user' => $id_user_baru,
			'username' => $username,
			'password' => $password
		];

		$edit = $this->user->edit_user('tb_user', $where, $data);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/data_user');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/data_user');
		}
	}

	public function data_konsumen()
	{
		$data = [
			'konsumen'  => $this->konsumen->tampil_konsumen('tb_konsumen'),
			'title' => 'Halaman Data Konsumen',
			'id_tabel' => 'tabel_konsumen',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/data_konsumen', $data);
		$this->load->view('admin/templet/footer', $data);
	}
	public function halaman_tambah_konsumen()
	{
		$data = [
			'title' => 'Halaman Tambah Konsumen',
			'kode'     => $this->konsumen->id_konsumen('tb_konsumen'),
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_konsumnen', $data);
		$this->load->view('admin/templet/footer');
	}
	public function tambah_konsumen()
	{

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

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/data_konsumen');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/data_konsumen');
		}
	}
	public function hapus_konsumen($id)
	{

		$where = ['id_konsumen' => $id];
		$hapus = $this->konsumen->hapus_konsumen('tb_konsumen', $where);

		if ($hapus) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/data_konsumen');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/data_konsumen');
		}
	}
	public function halaman_edit_konsumen($id)
	{
		$data = [
			'konsumen' => $this->konsumen->tampil_konsumen('tb_konsumen', ['id_konsumen' => $id]),
			'title' => 'Halaman Edit Konsumen',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_edit_konsumen', $data);
		$this->load->view('admin/templet/footer');
	}
	public function edit_konsumen()
	{

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

		$edit = $this->konsumen->edit_konsumen('tb_konsumen', $where, $data);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/data_konsumen');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/data_konsumen');
		}
	}

	public function data_kavling()
	{
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
	public function halaman_tambah_kavling()
	{
		$data = [
			'title'    => 'Halaman Tambah Data kavling',
			'kode'	   =>  $this->kavling->id_kavling('tb_kavling'),
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_kavling', $data);
		$this->load->view('admin/templet/footer');
	}
	public function tambah_kavling()
	{
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

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/data_kavling');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/data_kavling');
		}
	}
	public function hapus_kavling($id)
	{
		$where = ['id_block' => $id];
		$hapus = $this->kavling->hapus_kavling('tb_kavling', $where);

		if ($hapus) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/data_kavling');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/data_kavling');
		}
	}
	public function halaman_edit_kavling($id)
	{
		$where = ['id_block' => $id];
		$data = [
			'kavling'  => $this->kavling->tampil_kavling('tb_kavling', $where),
			'title'    => 'Halaman Edit Data kavling',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_edit_kavling', $data);
		$this->load->view('admin/templet/footer');
	}
	public function edit_kavling()
	{
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

		$edit = $this->kavling->edit_kavling('tb_kavling', $where, $data);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/data_kavling');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/data_kavling');
		}
	}
	public function data_tukang()
	{
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
	public function halaman_tambah_tukang()
	{
		$data = [
			'title' => 'Halaman Tambah Tukang',
			'kode'	=>  $this->tukang->id_tukang('tb_tukang'),
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_tukang', $data);
		$this->load->view('admin/templet/footer');
	}
	public function tambah_tukang()
	{
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

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/data_tukang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/data_tukang');
		}
	}
	public function hapus_tukang($id)
	{
		$where = ['id_tukang' => $id];
		$hapus = $this->tukang->hapus_tukang('tb_tukang', $where);

		if ($hapus) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/data_tukang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/data_tukang');
		}
	}
	public function halaman_edit_tukang($id)
	{
		$where = ['id_tukang' => $id];
		$data = [
			'tukang'  => $this->tukang->tampil_tukang('tb_tukang', $where),
			'title'    => 'Halaman Edit Data Tukang',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_edit_tukang', $data);
		$this->load->view('admin/templet/footer');
	}
	public function edit_tukang()
	{
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

		$edit = $this->tukang->edit_tukang('tb_tukang', $where, $data);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/data_tukang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/data_tukang');
		}
	}
	public function pembayaran_cash()
	{
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
	public function halaman_tambah_cash()
	{
		$data = [
			'konsumen' => $this->konsumen->tampil_konsumen('tb_konsumen'),
			'block'	   => $this->kavling->tampil_kavling('tb_kavling'),
			'title'    => 'Halaman Tambah Pembayaran Cash',
			'kode'     => $this->cash->id_cash('tb_cash')
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_cash', $data);
		$this->load->view('admin/templet/footer');
	}

	public function tambah_cash()
	{

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
		$total   		= $this->input->post('total');

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
			'total'			=> $total
		];

		$tambah             = $this->cash->tambah_cash('tb_cash', $data);

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/pembayaran_cash');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/pembayaran_cash');
		}
	}

	public function hapus_cash($id)
	{
		$where = ['id_cash' => $id];
		$hapus = $this->cash->hapus_cash('tb_cash', $where);

		if ($hapus) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/pembayaran_cash');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/pembayaran_cash');
		}
	}

	public function halaman_edit_cash($id)
	{
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
	public function edit_cash()
	{
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
		$total   	= $this->input->post('total');


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
			'total'			=> $total
		];

		$edit = $this->cash->edit_cash('tb_cash', $where, $data);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/pembayaran_cash');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/pembayaran_cash');
		}
	}
	public function halaman_detail_cash($id)
	{
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
	public function pembayaran_hutang()
	{
		$data = [
			'hutang'     => $this->hutang->tampil_hutang('tb_hutang'),
			'title' 	=> 'Halaman Pembayaran Hutang',
			'id_tabel' => 'tabel_hutang'
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/data_hutang', $data);
		$this->load->view('admin/templet/footer', $data);
	}
	public function halaman_tambah_hutang()
	{
		$data = [
			'title' 	=> 'Halaman Tambah Hutang',
			'kode'		=> $this->hutang->id_hutang('tb_hutang'),
			'konsumen'	=> $this->konsumen->tampil_konsumen('tb_konsumen'),
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_hutang', $data);
		$this->load->view('admin/templet/footer');
	}
	public function	tambah_hutang()
	{
		$id_hutang    = $this->input->post('id_hutang');
		$id_konsumen  = $this->input->post('id_konsumen');
		$hutang  	  = $this->input->post('hutang');
		$bayar  	  = $this->input->post('bayar');
		$sisa_hutang  = $this->input->post('sisa_hutang');
		$keterangan   = $this->input->post('keterangan');

		$data         = [
			'id_hutang'    => $id_hutang,
			'id_konsumen'  => $id_konsumen,
			'hutang'  	   => $hutang,
			'bayar'  	   => $bayar,
			'sisa_hutang'  => $sisa_hutang,
			'keterangan'   => $keterangan,
		];

		$tambah = $this->hutang->tambah_hutang('tb_hutang', $data);

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/pembayaran_hutang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/pembayaran_hutang');
		}
	}
	public function hapus_hutang($id)
	{
		$where = ['id_hutang' => $id];
		$hapus = $this->hutang->hapus_hutang('tb_hutang', $where);

		if ($hapus) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/pembayaran_hutang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/pembayaran_hutang');
		}
	}
	public function halaman_edit_hutang($id)
	{
		$where        = ['id_hutang' => $id];
		$data = [
			'hutang'     	=> $this->hutang->tampil_hutang('tb_hutang', $where),
			'konsumen' 		=> $this->konsumen->tampil_konsumen('tb_konsumen'),
			'title' 		=> 'Halaman Edit Pembayaran hutang',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_edit_hutang', $data);
		$this->load->view('admin/templet/footer');
	}
	public function edit_hutang()
	{
		$id_hutang    = $this->input->post('id_hutang');
		$id_konsumen  = $this->input->post('id_konsumen');
		$hutang  	  = $this->input->post('hutang');
		$bayar  	  = $this->input->post('bayar');
		$sisa_hutang  = $this->input->post('sisa_hutang');
		$keterangan   = $this->input->post('keterangan');

		$where        = ['id_hutang	' => $this->input->post('id_hutang_lama')];

		$data         = [
			'id_hutang'    => $id_hutang,
			'id_konsumen'  => $id_konsumen,
			'hutang'  	   => $hutang,
			'bayar'  	   => $bayar,
			'sisa_hutang'  => $sisa_hutang,
			'keterangan'   => $keterangan,
		];

		$edit = $this->hutang->edit_hutang('tb_hutang', $data, $where);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/pembayaran_hutang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/pembayaran_hutang');
		}
	}
	public function penggajian_tukang()
	{
		$data = [
			'penggajian' => $this->penggajian->tampil_penggajian('tb_gaji'),
			'title'      => 'Halaman Penggajian Tukang',
			'id_tabel' => 'tabel_penggajain'
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/data_penggajian', $data);
		$this->load->view('admin/templet/footer');
	}
	public function halaman_tambah_penggajian()
	{
		$data = [
			'tukang' 	 => $this->tukang->tampil_tukang('tb_tukang'),
			'title'      => 'Halaman Edit Penggajian',
			'kode'       => $this->penggajian->id_penggajian('tb_gaji'),
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_penggajian', $data);
		$this->load->view('admin/templet/footer');
	}
	public function tambah_penggajian()
	{

		$id_gaji     	= $this->input->post('id_gaji');
		$id_tukang      = $this->input->post('id_tukang');
		$jabatan     	= $this->input->post('jabatan');
		$gaji     		= $this->input->post('gaji');
		$jumblah     	= $this->input->post('jumblah');
		$total_gaji     = $this->input->post('total_gaji');
		$cashbon     	= $this->input->post('cashbon');
		$sisa_gaji     	= $this->input->post('sisa_gaji');

		$data           = [
			'id_gaji'	=> $id_gaji,
			'id_tukang'	=> $id_tukang,
			'jabatan'	=> $jabatan,
			'gaji'		=> $gaji,
			'jumblah'	=> $jumblah,
			'total_gaji' => $total_gaji,
			'cashbon'	=> $cashbon,
			'sisa_gaji'	=> $sisa_gaji,
		];

		$tambah          = $this->penggajian->tambah_penggajian('tb_gaji', $data);

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/penggajian_tukang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/penggajian_tukang');
		}
	}
	public function hapus_penggajian($id)
	{
		$where = ['id_gaji' => $id];
		$hapus = $this->penggajian->hapus_penggajian('tb_gaji', $where);

		if ($hapus) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/penggajian_tukang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/penggajian_tukang');
		}
	}
	public function halaman_edit_penggajian($id)
	{
		$where        = ['id_gaji' => $id];
		$data = [
			'penggajian'    => $this->penggajian->tampil_penggajian('tb_gaji', $where),
			'tukang' 		=> $this->tukang->tampil_tukang('tb_tukang'),
			'title' 		=> 'Halaman Edit Penggajian Tukang',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_edit_penggajian', $data);
		$this->load->view('admin/templet/footer');
	}
	public function edit_penggajian()
	{
		$id_gaji     	= $this->input->post('id_gaji');
		$id_tukang      = $this->input->post('id_tukang');
		$jabatan     	= $this->input->post('jabatan');
		$gaji     		= $this->input->post('gaji');
		$jumblah     	= $this->input->post('jumblah');
		$total_gaji     = $this->input->post('total_gaji');
		$cashbon     	= $this->input->post('cashbon');
		$sisa_gaji     	= $this->input->post('sisa_gaji');

		$where			= ['id_gaji' => $this->input->post('id_gaji_lama')];

		$data           = [
			'id_gaji'	=> $id_gaji,
			'id_tukang'	=> $id_tukang,
			'jabatan'	=> $jabatan,
			'gaji'		=> $gaji,
			'jumblah'	=> $jumblah,
			'total_gaji' => $total_gaji,
			'cashbon'	=> $cashbon,
			'sisa_gaji'	=> $sisa_gaji,
		];

		$edit          = $this->penggajian->edit_penggajian('tb_gaji', $data, $where);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/penggajian_tukang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/penggajian_tukang');
		}
	}
	public function proses_pembangunan()
	{

		$data = [
			'proses' => $this->proses->tampil_proses('tb_proses'),
			'title'      => 'Halaman Proses Pembangunan',
			'id_tabel' => 'tabel_proses'
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/data_pengeluaran_material', $data);
		$this->load->view('admin/templet/footer');
	}
	public function halaman_tambah_proses()
	{
		$data = [
			'kode' 		=> $this->proses->id_proses('tb_proses'),
			'block'	   	=> $this->kavling->tampil_kavling('tb_kavling'),
			'tukang' 	=> $this->tukang->tampil_tukang('tb_tukang'),
			'title'      => 'Halaman Tambah Proses Pembangunan',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_proses', $data);
		$this->load->view('admin/templet/footer');
	}
	public function tambah_proses()
	{

		$id_proses 			= $this->input->post('id_proses');
		$id_tukang 			= $this->input->post('id_tukang');
		$id_block 			= $this->input->post('block');
		$bulan 				= $this->input->post('bulan');
		$proses 			= $this->input->post('proses');


		$data 				= [
			'id_proses' 	=> $id_proses,
			'id_tukang' 	=> $id_tukang,
			'id_block' 		=> $id_block,
			'bulan' 		=> $bulan,
			'proses' 		=> $proses,
		];

		$tambah = $this->proses->tambah_proses('tb_proses', $data);

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/proses_pembangunan');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/proses_pembangunan');
		}
	}
	public function hapus_proses($id)
	{
		$where = ['id_proses' => $id];
		$hapus = $this->proses->hapus_proses('tb_proses', $where);

		if ($hapus) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/proses_pembangunan');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/proses_pembangunan');
		}
	}
	public function halaman_edit_proses($id)
	{
		$where = ['id_proses' => $id];
		$data = [
			'proses' 		=> $this->proses->tampil_proses('tb_proses', $where),
			'block'	   		=> $this->kavling->tampil_kavling('tb_kavling'),
			'tukang' 		=> $this->tukang->tampil_tukang('tb_tukang'),
			'title'     	=> 'Halaman Edit Proses Pembangunan',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_edit_proses', $data);
		$this->load->view('admin/templet/footer');
	}
	public function edit_proses()
	{

		$id_proses 			= $this->input->post('id_proses');
		$id_tukang 			= $this->input->post('id_tukang');
		$id_block 			= $this->input->post('block');
		$bulan 				= $this->input->post('bulan');
		$proses 			= $this->input->post('proses');

		$where 				= ['id_proses' => $this->input->post('id_proses_lama')];

		$data 				= [
			'id_proses' 	=> $id_proses,
			'id_tukang' 	=> $id_tukang,
			'id_block' 		=> $id_block,
			'bulan' 		=> $bulan,
			'proses' 		=> $proses,
		];

		$edit = $this->proses->edit_proses('tb_proses', $data, $where);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/proses_pembangunan');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/proses_pembangunan');
		}
	}
	public function data_pembelian_material()
	{
		$data = [
			'pembelian' => $this->pembelian->tampil_pembelian('tb_pembelian'),
			'title'     => 'Halaman Pembelian Material',
			'id_tabel' 	=> 'tabel_pembelian'
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/data_pembelian', $data);
		$this->load->view('admin/templet/footer');
	}
	public function halaman_tambah_pembelian()
	{
		$data = [
			'kode' 		=> $this->pembelian->id_pembelian('tb_pembelian'),
			'title'     => 'Halaman Tambah Pembelian',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_pembelian', $data);
		$this->load->view('admin/templet/footer');
	}
	public function tambah_pembelian()
	{
		$id_pembelian		= $this->input->post('id_pembelian');
		$nama_barang		= $this->input->post('nama_barang');
		$jumblah			= $this->input->post('jumblah');
		$harga				= $this->input->post('harga');
		$total				= $this->input->post('total');
		$keterangan			= $this->input->post('keterangan');

		$data 				= [
			'id_pembeli'	=> $id_pembelian,
			'nama_barang'	=> $nama_barang,
			'jumblah'		=> $jumblah,
			'harga'			=> $harga,
			'total'			=> $total,
			'keterangan'	=> $keterangan,
		];

		$tambah = $this->pembelian->tambah_pembelian('tb_pembelian', $data);

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/data_pembelian_material');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/data_pembelian_material');
		}
	}
	public function hapus_pembelian($id)
	{
		$where = ['id_pembeli' => $id];
		$hapus = $this->pembelian->hapus_pembelian('tb_pembelian', $where);

		if ($hapus) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/data_pembelian_material');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/data_pembelian_material');
		}
	}

	public function halaman_edit_pembelian($id)
	{
		$where 			= ['id_pembeli' => $id];
		$data = [
			'pem' 		=> $this->pembelian->tampil_pembelian('tb_pembelian', $where),
			'title'     => 'Halaman Edit Pembelian',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_edit_pembelian', $data);
		$this->load->view('admin/templet/footer');
	}
	public function edit_pembelian()
	{
		$id_pembelian		= $this->input->post('id_pembelian');
		$nama_barang		= $this->input->post('nama_barang');
		$jumblah			= $this->input->post('jumblah');
		$harga				= $this->input->post('harga');
		$total				= $this->input->post('total');
		$keterangan			= $this->input->post('keterangan');

		$where 				= ['id_pembeli' => $this->input->post('id_pembelian_lama')];

		$data 				= [
			'id_pembeli'	=> $id_pembelian,
			'nama_barang'	=> $nama_barang,
			'jumblah'		=> $jumblah,
			'harga'			=> $harga,
			'total'			=> $total,
			'keterangan'	=> $keterangan,
		];

		$edit = $this->pembelian->edit_pembelian('tb_pembelian', $data, $where);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/data_pembelian_material');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/data_pembelian_material');
		}
	}
	public function data_pengeluaran_material()
	{
		$data = [
			'pengeluaran' => $this->pengeluaran->tampil_pengeluaran('tb_pengeluaran'),
			'title'      => 'Halaman Pengeluaran Material',
			'id_tabel' => 'tabel_pengeluaran'
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/data_pengeluaran_material', $data);
		$this->load->view('admin/templet/footer');
	}
	public function halaman_tambah_pengeluaran()
	{
		$data = [
			'kode' => $this->pengeluaran->id_pengeluaran('tb_pengeluaran'),
			'block'	   => $this->kavling->tampil_kavling('tb_kavling'),
			'title'      => 'Halaman Tambah Pengeluaran',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_pengeluaran', $data);
		$this->load->view('admin/templet/footer');
	}
	public function tambah_pengeluaran()
	{
		$id_keluar				= $this->input->post("id_pengeluaran");
		$id_block				= $this->input->post("block");
		$nama_material			= $this->input->post("nama_material");
		$jumblah				= $this->input->post("jumblah");
		$harga					= $this->input->post("harga");
		$total					= $this->input->post("total");

		$data					= [
			'id_keluar'			=> $id_keluar,
			'id_block'			=> $id_block,
			'nama_material'		=> $nama_material,
			'jumblah'			=> $jumblah,
			'harga'				=> $harga,
			'total'				=> $total,
		];

		$tambah = $this->pengeluaran->tambah_pengeluaran('tb_pengeluaran', $data);

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/data_pengeluaran_material');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/data_pengeluaran_material');
		}
	}
	public function hapus_pengeluaran($id)
	{
		$where = ['id_keluar' => $id];
		$hapus = $this->pengeluaran->hapus_pengeluaran('tb_pengeluaran', $where);

		if ($hapus) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/data_pengeluaran_material');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/data_pengeluaran_material');
		}
	}
	public function	halaman_edit_pengeluaran($id)
	{
		$where = ['id_keluar' => $id];
		$data = [
			'pengeluaran' => $this->pengeluaran->tampil_pengeluaran('tb_pengeluaran', $where),
			'block'	   	  => $this->kavling->tampil_kavling('tb_kavling'),
			'title'       => 'Halaman Edit Pengeluaran',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_edit_pengeluaran', $data);
		$this->load->view('admin/templet/footer');
	}
	public function edit_pengeluaran()
	{
		$id_keluar				= $this->input->post("id_pengeluaran");
		$id_block				= $this->input->post("block");
		$nama_material			= $this->input->post("nama_material");
		$jumblah				= $this->input->post("jumblah");
		$harga					= $this->input->post("harga");
		$total					= $this->input->post("total");

		$where = ['id_keluar' => $this->input->post('id_pengeluaran_lama')];

		$data					= [
			'id_keluar'			=> $id_keluar,
			'id_block'			=> $id_block,
			'nama_material'		=> $nama_material,
			'jumblah'			=> $jumblah,
			'harga'				=> $harga,
			'total'				=> $total,
		];

		$edit = $this->pengeluaran->edit_pengeluaran('tb_pengeluaran', $data, $where);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/data_pengeluaran_material');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/data_pengeluaran_material');
		}
	}
	public function data_inventaris_barang()
	{
		$data = [
			'inventaris' => $this->inventaris->tampil_inventaris('tb_inventaris'),
			'title'      => 'Halaman Inventaris Barang',
			'id_tabel' 	 => 'tabel_inventaris'
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/data_inventaris_barang', $data);
		$this->load->view('admin/templet/footer');
	}
	public function halaman_tambah_inventaris()
	{
		$data = [
			'kode' => $this->inventaris->id_inventaris('tb_inventaris'),
			'title'      => 'Halaman Tambah Inventaris Barang',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_inventaris', $data);
		$this->load->view('admin/templet/footer');
	}
	public function tambah_inventaris()
	{
		$id_inventaris		= $this->input->post('id_inventaris');
		$nama_barang		= $this->input->post('nama_barang');
		$jumblah			= $this->input->post('jumblah');
		$keterangan			= $this->input->post('keterangan');

		$data               = [
			'id_inventaris'		=> $id_inventaris,
			'nama_barang'		=> $nama_barang,
			'jumblah'			=> $jumblah,
			'keterangan'		=> $keterangan,
		];

		$tambah = $this->inventaris->tambah_inventaris('tb_inventaris', $data);

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/data_inventaris_barang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/data_inventaris_barang');
		}
	}
	public function hapus_inventaris($id)
	{
		$where = ['id_inventaris' => $id];
		$hapus = $this->inventaris->hapus_inventaris('tb_inventaris', $where);

		if ($hapus) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/data_inventaris_barang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/data_inventaris_barang');
		}
	}
	public function halaman_edit_inventaris($id)
	{
		$data = [
			'inven' => $this->inventaris->tampil_inventaris('tb_inventaris', ['id_inventaris' => $id]),
			'title'      => 'Halaman Edit Inventaris Barang',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_edit_inventaris', $data);
		$this->load->view('admin/templet/footer');
	}
	public function edit_inventaris()
	{
		$id_inventaris		= $this->input->post('id_inventaris');
		$nama_barang		= $this->input->post('nama_barang');
		$jumblah			= $this->input->post('jumblah');
		$keterangan			= $this->input->post('keterangan');

		$where = ['id_inventaris' => $this->input->post('id_inventaris_lama')];

		$data               = [
			'id_inventaris'		=> $id_inventaris,
			'nama_barang'		=> $nama_barang,
			'jumblah'			=> $jumblah,
			'keterangan'		=> $keterangan,
		];

		$edit = $this->inventaris->edit_inventaris('tb_inventaris', $data, $where);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/data_inventaris_barang');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/data_inventaris_barang');
		}
	}
	public function data_stok_material()
	{
		$data = [
			'stok' => $this->stok->tampil_stok('tb_stokmaterial'),
			'title'      => 'Halaman Data Stok Material',
			'id_tabel' 	 => 'tabel_stok'
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/data_stok_material', $data);
		$this->load->view('admin/templet/footer');
	}
	public function halaman_tambah_stok()
	{
		$data = [
			'kode' 		=> $this->stok->id_stok('tb_stokmaterial'),
			'title'      => 'Halaman Tambah Data Stok Material',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_tambah_stok', $data);
		$this->load->view('admin/templet/footer');
	}
	public function tambah_stok()
	{
		$id_stok		= $this->input->post('id_stok');
		$nama_material	= $this->input->post('nama_material');
		$jumblah		= $this->input->post('jumblah');

		$data 			= [
			'id_stok'		=> $id_stok,
			'nama_material'	=> $nama_material,
			'jumblah'		=> $jumblah,
		];

		$tambah = $this->stok->tambah_stok('tb_stokmaterial', $data);

		if ($tambah) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI MASUKAN</div>');
			redirect('Admin/data_stok_material');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI MASUKAN</div>');
			redirect('Admin/data_stok_material');
		}
	}
	public function hapus_stok($id)
	{
		$where = ['id_stok' => $id];
		$hapus = $this->stok->hapus_stok('tb_stokmaterial', $where);

		if ($hapus) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI HAPUS</div>');
			redirect('Admin/data_stok_material');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI HAPUS</div>');
			redirect('Admin/data_stok_material');
		}
	}
	public function halaman_edit_stok($id)
	{
		$data = [
			'stok' 		=> $this->stok->tampil_stok('tb_stokmaterial', ['id_stok' => $id]),
			'title'      => 'Halaman Edit Data Stok Material',
		];

		$this->load->view('admin/templet/header', $data);
		$this->load->view('admin/templet/sidebar');
		$this->load->view('admin/halaman_edit_stok', $data);
		$this->load->view('admin/templet/footer');
	}
	public function edit_stok()
	{
		$id_stok		= $this->input->post('id_stok');
		$nama_material	= $this->input->post('nama_material');
		$jumblah		= $this->input->post('jumblah');

		$data 			= [
			'id_stok'		=> $id_stok,
			'nama_material'	=> $nama_material,
			'jumblah'		=> $jumblah,
		];

		$where = ['id_stok' => $this->input->post('id_stok_lama')];

		$edit = $this->stok->edit_stok('tb_stokmaterial', $data, $where);

		if ($edit) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" style="width: 100%; text-align: center">SELAMAT DATA BERHASIL DI EDIT</div>');
			redirect('Admin/data_stok_material');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" style="width: 100%;text-align: center">DATA GAGAL DI EDIT</div>');
			redirect('Admin/data_stok_material');
		}
	}





	//untuk report pdf
	public function cetak_laporan($nama, $table)
	{
		$model = "tampil_{$nama}";
		$data = [
			$nama =>  $this->$nama->$model($table),
			'role' => $nama,
			'nama_laporan' => "laporan data {$nama}"
		];

		if ($nama === 'cash') {
			$this->pdf->setPaper('A3', 'potrait');
		} else {
			$this->pdf->setPaper('A4', 'potrait');
		}

		$this->pdf->filename = "laporan_{$nama}.pdf";
		$this->pdf->load_view('admin/laporan_pdf', $data);
	}
}
