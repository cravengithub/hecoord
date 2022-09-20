<?php

class Karyawan_model extends Model {
	/**
	 * Constructor
	 */
	function Karyawan_model()
	{
		parent::Model();
	}
	
	// Inisialisasi nama tabel yang digunakan
	var $table = 'karyawan';
	
	/**
	 * Menghitung jumlah baris dalam sebuah tabel, ada kaitannya dengan pagination
	 */
	function count_all_num_rows()
	{
		return $this->db->count_all($this->table);
	}
	
	/**
	 * Tampilkan 10 baris karyawan, diurutkan berdasarkan nama (Descending)
	 */
	function get_last_ten_karyawan($limit, $offset)
	{
		$this->db->select('KODE_KARYAWAN, NAMA, ALAMAT, TEMPAT_LAHIR, TANGGAL_LAHIR, JENIS_KELAMIN, AGAMA');
		$this->db->from('karyawan');
		$this->db->order_by('NAMA', 'desc');
		$this->db->limit($limit, $offset);
		return $this->db->get();
	}
	
			
}
