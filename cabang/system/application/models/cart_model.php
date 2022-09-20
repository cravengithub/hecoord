<?php
class Cart_model extends Model {
	/**
	 * Constructor
	 */
	function Cart_model()
	{
		parent::Model();
	}
	
	// Inisialisasi nama tabel transaksi penjualan
	var $table = 'transaksi_penjualan';
	var $table2 = 'detail_transaksi';
	
	
	/**
	 * Menambah data penjualan
	 */
	function add($penjualan)
	{
		$this->db->insert($this->table, $penjualan);
	}
	
	function add_detail($penjualan)
	{
		$this->db->insert($this->table2, $penjualan);
	}
	
	function maxi()
	{
	
		$this->db->select_max('id_transaksi', 'no_akhir');
		$query = $this->db->get('transaksi_penjualan');
		$baris = $query->row();
		return $baris->no_akhir;
	}
	
		
}
