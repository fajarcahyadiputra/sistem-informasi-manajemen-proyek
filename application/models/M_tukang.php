<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_tukang extends CI_Model
{
	
	function __construct()
	{
		# code...
	}
	public function tampil_tukang($table, $where = 0){
		if($where === 0){
			return $this->db->get($table)->result();
		}else{
			return $this->db->get_where($table, $where)->row();
		}	
	}
	public function id_tukang($table){
		$this->db->select("RIGHT(tb_tukang.id_tukang,4) as kode", false);
		$this->db->order_by('kode','desc');
		$this->db->limit(1);
		$query = $this->db->get($table);

		if($query->num_rows() > 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode = 1;
		}

		$date = date('him');
		$batas = str_pad($kode,4,'0', STR_PAD_LEFT);
		return $date.$batas;
	}
	public function tambah_tukang($table, $data){
		return $this->db->insert($table, $data);
	}
	public function hapus_tukang($table, $where){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function edit_tukang($table, $where, $data){
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
}