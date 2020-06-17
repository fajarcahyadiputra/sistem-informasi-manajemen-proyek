<?php
/**
 * 	
 */
class M_penggajian extends CI_model
{
	public function tampil_penggajian($table, $where = 0){
		if($where === 0){
			return $this->db->get($table)->result();
		}else{
			return $this->db->get_where($table, $where)->row();
		}
	}
	public function id_penggajian($table){
		$this->db->select("RIGHT(tb_gaji.id_gaji,4) as kode", false);
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
	public function tambah_penggajian($table, $data){
		return $this->db->insert($table, $data);
	}
	public function hapus_penggajian($table, $where){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function edit_penggajian($table, $data, $where){
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
}