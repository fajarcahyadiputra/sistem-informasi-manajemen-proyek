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