<?php

class Barang_model extends Model {
	/**
	 * Constructor
	 */
	function Barang_model()
	{
		parent::Model();
	}
	
	// Inisialisasi nama tabel yang digunakan
	var $table = 'barang';
	
	/**
	 * Menghitung jumlah baris dalam sebuah tabel, ada kaitannya dengan pagination
	 */
	function count_all_num_rows()
	{
		return $this->db->count_all($this->table);
	}
	
	/**
	 * Tampilkan 10 baris barang terkini, diurutkan berdasarkan tanggal (Descending)
	 */
	function get_last_ten_barang($limit, $offset)
	{
		$this->db->select('KODE_BARANG, NAMA, HARGA, JUMLAH_BARANG, LIMIT_BAWAH');
		$this->db->from('barang');
		$this->db->order_by('NAMA', 'desc');
		$this->db->limit($limit, $offset);
		return $this->db->get();
	}
	
	function get_barang()
	{
		$this->db->order_by('KODE_BARANG');
		return $this->db->get('barang');
	}
	
	function ambil($KODE_BARANG)
	{
		$hasilcarts = $this->db->get_where('barang',array('KODE_BARANG'=>$KODE_BARANG))->result();
		$result = $hasilcarts[0];
		
		return $result;
	}

	function update_barang($data,$kode_barang)
	{
		$update = array(
               'JUMLAH_BARANG' => $data
               );
		$this->db->where('KODE_BARANG', $kode_barang);
		$this->db->update('barang', $update);
	}
	
	function get_barang_by_nama($nama)
	{
		return $this->db->get_where($this->table, array('NAMA' => $nama))->row();
	}
	
			
}
