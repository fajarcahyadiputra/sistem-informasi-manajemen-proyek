<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *ini adalah model dari user
 */
class M_user extends CI_Model
{
	public function tampil_user($table, $where = 0){
		if($where == 0){
			return $this->db->get($table)->result();
		}else{
			return $this->db->get_where($table, $where)->row();
		}
	}
	public function tambah_user($table, $data){
		return $this->db->insert($table, $data);
	}
	public function hapus_user($table, $where){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function edit_user($table, $where, $data ){
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
}
