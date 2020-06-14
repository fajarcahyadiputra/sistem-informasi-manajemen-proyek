<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 ini adalah model dari controller auth
 */
class M_auth extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	public function cek_login($table, $where){
		return $this->db->get_where($table, $where);
	}
}