<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_kavling extends CI_Model
{
	
	function __construct()
	{
		# code...
	}
	public function tampilDataKavling($table){
		return $this->db->get($table)->result();
	}
}