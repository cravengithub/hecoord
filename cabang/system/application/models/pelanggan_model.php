<?php
class Pelanggan_model extends Model {
	/**
	 * Constructor
	 */
	function Pelanggan_model()
	{
		parent::Model();
	}
	
	// Inisialisasi nama tabel pelanggan
	var $table = 'pelanggan';
	
	/**
	 * Mendapatkan data semua pelanggan
	 */
	function get_all($limit, $offset)
	{
		$this->db->select('ID_PELANGGAN, NAMA, ALAMAT, JENIS_KELAMIN, NO_TELEPON');
		$this->db->from($this->table);
		$this->db->limit($limit, $offset);
		$this->db->order_by('NAMA', 'asc');
		return $this->db->get()->result();
	}
	
	/**
	 * Mendapatkan data seorang karyawan dengan ID Pelanggan tertentu
	 */
	function get_pelanggan_by_id($id_pelanggan)
	{
		return $this->db->get_where($this->table, array('ID_PELANGGAN' => $id_pelanggan))->row();
	}
	
	function get_pelanggan()
	{
		$this->db->order_by('id_pelanggan');
		return $this->db->get('pelanggan');
	}
	
	/**
	 * Menghitung jumlah baris tabel pelanggan
	 */
	function count_all()
	{
		return $this->db->count_all($this->table);
	}
	
	/**
	 * Menghapus data pelanggan tertentu
	 */
	function delete($id_pelanggan)
	{
		$this->db->delete($this->table, array('ID_PELANGGAN' => $id_pelanggan));
	}
	
	/**
	 * Menambah data pelanggan
	 */
	function add($pelanggan)
	{
		$this->db->insert($this->table, $pelanggan);
	}
	
	/**
	 * Update data pelanggan
	 */
	function update($id_pelanggan, $pelanggan)
	{
		$this->db->where('ID_PELANGGAN', $id_pelanggan);
		$this->db->update($this->table, $pelanggan);
	}
	
	/**
	 * Cek id pelanggan agar tidak ada data pelanggan yang sama
	 */
	function valid_id_pelanggan($id_pelanggan)
	{
		$query = $this->db->get_where($this->table, array('ID_PELANGGAN' => $pelanggan));
		if ($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
}
