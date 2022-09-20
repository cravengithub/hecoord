<?php

class Cart extends Controller {
	
	function Cart()
	{
		parent::Controller();
		$this->load->model('Barang_model', '', TRUE);
		$this->load->model('Pelanggan_model', '', TRUE);
		$this->load->model('Cart_model', '', TRUE);
	}
	
	var $title = 'cart';
	
	
	function index()
	{
		if ($this->session->userdata('login') == TRUE)
		{
			$this->add();
		}
		else
		{
			redirect('login');
		}
	}
	
	function add()
	{		
		$data['title'] 			= $this->title;
		$data['h2_title'] 		= 'Cart';
		$data['h2_title2'] 		= 'Detail Pembelian';
		$data['main_view'] 		= 'cart/cart_form';
		$data['form_action']	= site_url('cart/tambahcart');
		$data['form_action2']	= site_url('cart/transaksi');
												
		$barang = $this->Barang_model->get_barang()->result();
		$data['options_barang'][''] = '---pilih barang---';
		foreach($barang as $row)
		{
			$data['options_barang'][$row->KODE_BARANG] = $row->NAMA;
		}
		
		$pelanggan = $this->Pelanggan_model->get_pelanggan()->result();
		$data['options_pelanggan'][''] = '---pilih pelanggan---';
		foreach($pelanggan as $row)
		{
			$data['options_pelanggan'][$row->ID_PELANGGAN] = $row->NAMA;
		}
		
		$this->load->view('template', $data);
	}
	
	function tambahcart()
	{
		//$this->load->model('cart_model');
		
				
		$produk = $this->Barang_model->ambil($this->input->post('kode_barang'));
		$masuk = array(
		'id' => $this->input->post('kode_barang'),
		'qty' => $this->input->post('jumlah_beli'),
		'price' =>$produk->HARGA,
		'name' => $produk->NAMA
		);
		
		$this->cart->insert($masuk);
		redirect('cart');
	}
	
	function transaksi()
	{
		$data['title'] 			= $this->title;
		$data['h2_title'] 		= 'Cart';
		$data['h2_title2'] 		= 'Detail Pembelian';
		$data['main_view'] 		= 'cart/cart_form';
		$data['form_action']	= site_url('cart/tambahcart');
												
		
			// save data
			$tgl=date("d-m-Y");
			$transaksi = array(
							'KODE_KARYAWAN'=>$this->session->userdata('kode_karyawan'),
							'TANGGAL_TRANSAKSI'=>date("Y-m-d"),
							'ID_PELANGGAN'=> $this->input->post('id_pelanggan')
						);
			$this->Cart_model->add($transaksi);	
			
			foreach($this->cart->contents() as $cartitem)
			{
				$kode_barang = $this->Barang_model->get_barang_by_nama($cartitem['name']);
				$detail_transaksi = array(
										'id_transaksi'=>$this->Cart_model->maxi(),
										'kode_barang'=>$kode_barang->KODE_BARANG,
										'jumlah_barang'=>$cartitem['qty']
				);
				$this->Cart_model->add_detail($detail_transaksi);
				$nilai1=$kode_barang->JUMLAH_BARANG;
				$nilai2=$cartitem['qty'];
				$update = $nilai1-$nilai2;
				$this->Barang_model->update_barang($update,$kode_barang->KODE_BARANG);
			}
				
			$this->cart->destroy();
			$this->session->set_flashdata('message', 'Satu transaksi berhasil disimpan!');
			redirect('cart/add');
				
	}
	
	
	function hapusbarang($rowid) 
	{
		$this->cart->update(array(
		'rowid'=>$rowid,
		'qty'=>0,
		));
	redirect('cart');
	}	
	
	function hapussemua() 
	{
		$this->cart->destroy();
		redirect('cart');
	}
	
	
		
}
