<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_cash extends CI_Model
{
	
	function __construct()
	{
		# code...
	}
	public function tampilDataCash($table){
		return $this->db->get($table)->result();
	}
}