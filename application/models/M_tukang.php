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
	public function tampilDataTukang($table){
		return $this->db->get($table)->result();
	}
}