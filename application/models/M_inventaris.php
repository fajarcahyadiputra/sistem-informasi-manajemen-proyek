<?php

/**
 * 	
 */
class M_inventaris extends CI_Model
{
	public function tampil_inventaris($table, $where = 0)
	{
		if ($where === 0) {
			return $this->db->get($table)->result();
		} else {
			return $this->db->get_where($table, $where)->row();
		}
	}
	public function id_inventaris($table)
	{
		$this->db->select("RIGHT(tb_inventaris.id_inventaris,4) as kode", false);
		$this->db->order_by('kode', 'desc');
		$this->db->limit(1);
		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$date = date('him');
		$batas = str_pad($kode, 4, '0', STR_PAD_LEFT);
		return $date . $batas;
	}
	public function tambah_inventaris($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	public function hapus_inventaris($table, $where)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function edit_inventaris($table, $data, $where)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
}
