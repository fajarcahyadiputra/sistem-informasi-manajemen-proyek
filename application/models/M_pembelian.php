<?php
/**
 * 
 */
class M_pembelian extends CI_model
{
	public function tampil_pembelian($table, $where = 0){
		if($where === 0){
			return $this->db->get($table)->result();
		}else{
			return $this->db->get_where($table, $where)->row();
		}
	}
	public function id_pembelian($table){
		$this->db->select("RIGHT(tb_pembelian.id_pembeli,4) as kode", false);
		$this->db->order_by('kode','desc');
		$this->db->limit(1);
		$query = $this->db->get($table);

		if($query->num_rows() > 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
			$kode = 1;
		}

		$date = date('ymd');
		$batas = str_pad($kode,4,'0', STR_PAD_LEFT);
		return $date.$batas;
	}
	public function tambah_pembelian($table, $data){
		return $this->db->insert($table, $data);
	}
	public function hapus_pembelian($table, $where){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function edit_pembelian($table, $data, $where){
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
}