<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_konsumen extends CI_Model
{
	
	function __construct()
	{
		# code...
	}
	public function tampilDataKonsumen($table){
		return $this->db->get($table)->result();
	}
}