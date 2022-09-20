<?php

class Login_model extends Model {
	/**
	 * Constructor
	 */
	function Login_model()
	{
		parent::Model();
	}
	
	// Inisialisasi nama tabel user
	var $table = 'karyawan';
	
	/**
	 * Cek tabel user, apakah ada user dengan username dan password tertentu
	 */
	function check_user($username, $password)
	{
		$query = $this->db->get_where($this->table, array('USERNAME' => $username, 'PASSWORD' => $password), 1, 0);
		
		if ($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function session($username,$password)
	{
		return $this->db->get_where($this->table, array('USERNAME' => $username, 'PASSWORD'=>$password))->row();
	}
}
