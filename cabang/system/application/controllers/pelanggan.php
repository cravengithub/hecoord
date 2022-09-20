<?php

class Pelanggan extends Controller {

	function Pelanggan()
	{
		parent::Controller();
		$this->load->model('Pelanggan_model', '', TRUE);
	}
	
	/**
	 * Inisialisasi variabel untuk $title(untuk id element <body>), dan 
	 * $limit untuk membatasi penampilan data di tabel
	 */
	var $limit = 10;
	var $title = 'pelanggan';
	
	/**
	 * Memeriksa user state, jika dalam keadaan login akan menjalankan fungsi get_all()
	 * jika tidak akan meredirect ke halaman login
	 */
	function index()
	{
		if ($this->session->userdata('login') == TRUE)
		{
			$this->get_all();
		}
		else
		{
			redirect('login');
		}
	}
	
	/**
	 * Mendapatkan semua data pelanggan di database dan menampilkannya di tabel
	 */
	function get_all($offset = 0)
	{
		$data['title'] = $this->title;
		$data['h2_title'] = 'Pelanggan';
		$data['main_view'] = 'pelanggan/pelanggan';
		
		// Offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// Load data
		$pelanggan = $this->Pelanggan_model->get_all($this->limit, $offset);
		$num_rows = $this->Pelanggan_model->count_all();
		
		if ($num_rows > 0)
		{
			// Generate pagination			
			$config['base_url'] = site_url('pelanggan/get_all');
			$config['total_rows'] = $num_rows;
			$config['per_page'] = $this->limit;
			$config['uri_segment'] = $uri_segment;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			
			// Table
			/*Set table template for alternating row 'zebra'*/
			$tmpl = array( 'table_open'    => '<table border="0" cellpadding="0" cellspacing="0">',
						  'row_alt_start'  => '<tr class="zebra">',
							'row_alt_end'    => '</tr>'
						  );
			$this->table->set_template($tmpl);

			/*Set table heading */
			$this->table->set_empty("&nbsp;");
			$this->table->set_heading('No', 'ID Pelanggan', 'Nama', 'Alamat', 'Jenis Kelamin','Nomor Telepon','Update / Delete');
			$i = 0 + $offset;
			
			foreach ($pelanggan as $row)
			{
				if ($row->JENIS_KELAMIN==1){
					$jk="Pria";
				}
				else{
					$jk="Wanita";
				}
				
				$this->table->add_row(++$i, $row->ID_PELANGGAN, $row->NAMA, $row->ALAMAT, $jk, $row->NO_TELEPON,
										anchor('pelanggan/update/'.$row->ID_PELANGGAN,'update',array('class' => 'update')).' '.
										anchor('pelanggan/delete/'.$row->ID_PELANGGAN,'hapus',array('class'=> 'delete','onclick'=>"return confirm('Anda yakin akan menghapus data ini?')"))
										);
			}
			$data['table'] = $this->table->generate();
		}
		else
		{
			$data['message'] = 'Tidak ditemukan satupun data pelanggan!';
		}		
		
		$data['link'] = array('link_add' => anchor('pelanggan/add/','tambah data', array('class' => 'add'))
								);
		
		// Load view
		$this->load->view('template', $data);
	}
	
	/**
	 * Menghapus data pelanggan dengan ID tertentu
	 */
	function delete($id_pelanggan)
	{
		$this->Pelanggan_model->delete($id_pelanggan);
		$this->session->set_flashdata('message', '1 data pelanggan berhasil dihapus');
		
		redirect('pelanggan');
	}
	
	/**
	 * Menampilkan form tambah pelanggan
	 */
	function add()
	{		
		$data['title'] 			= $this->title;
		$data['h2_title'] 		= 'Pelanggan > Tambah Data';
		$data['main_view'] 		= 'pelanggan/pelanggan_form';
		$data['form_action']	= site_url('pelanggan/add_process');
		$data['link'] 			= array('link_back' => anchor('pelanggan','kembali', array('class' => 'back'))
										);
										
				
		$this->load->view('template', $data);
	}
	/**
	 * Proses tambah data pelanggan
	 */
	function add_process()
	{
		$data['title'] 			= $this->title;
		$data['h2_title'] 		= 'Pelanggan > Tambah Data';
		$data['main_view'] 		= 'pelanggan/pelanggan_form';
		$data['form_action']	= site_url('pelanggan/add_process');
		$data['link'] 			= array('link_back' => anchor('barang/','kembali', array('class' => 'back'))
										);
										
		// Set validation rules
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[50]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		
		
		
		if ($this->form_validation->run() == TRUE)
		{
			// save data
			$pelanggan = array(
							'nama'=> $this->input->post('nama'),
							'alamat'=> $this->input->post('alamat'),
							'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
							'no_telepon'=> $this->input->post('no_telepon')
						);
			$this->Pelanggan_model->add($pelanggan);
			
			$this->session->set_flashdata('message', 'Satu data pelanggan berhasil disimpan!');
			redirect('pelanggan/add');
		}
		else
		{	
			
			$this->load->view('template', $data);
		}		
	}
	
	/**
	 * Menampilkan form update data pelanggan
	 */
	function update($id_pelanggan)
	{
		$data['title'] 			= $this->title;
		$data['h2_title'] 		= 'Pelanggan > Update';
		$data['main_view'] 		= 'pelanggan/pelanggan_form';
		$data['form_action']	= site_url('pelanggan/update_process');
		$data['link'] 			= array('link_back' => anchor('pelanggan','kembali', array('class' => 'back'))
										);
										
		// cari data dari database
		$pelanggan = $this->Pelanggan_model->get_pelanggan_by_id($id_pelanggan);
		
		// buat session untuk menyimpan data primary key (id_pelanggan)
		$this->session->set_userdata('id_pelanggan', $pelanggan->ID_PELANGGAN);
		
		// Data untuk mengisi field2 form
		
		$data['default']['nama'] 			= $pelanggan->NAMA;
		$data['default']['alamat'] 			= $pelanggan->ALAMAT;
		$data['default']['jenis_kelamin'] 	= $pelanggan->JENIS_KELAMIN;
		$data['default']['no_telepon'] 		= $pelanggan->NO_TELEPON;
						
		$this->load->view('template', $data);
	}
	
	/**
	 * Proses update data pelanggan
	 */
	function update_process()
	{
		$data['title'] 			= $this->title;
		$data['h2_title'] 		= 'Pelanggan > Update';
		$data['main_view'] 		= 'pelanggan/pelanggan_form';
		$data['form_action']	= site_url('pelanggan/update_process');
		$data['link'] 			= array('link_back' => anchor('pelanggan','kembali', array('class' => 'back'))
										);
										
				
		// Set validation rules
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[50]');
		
		
		// jika proses validasi sukses, maka lanjut mengupdate data
		if ($this->form_validation->run() == TRUE)
		{
			// save data
			$pelanggan = array(
							'nama'		=> $this->input->post('nama'),
							'alamat'=> $this->input->post('alamat'),
							'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
							'no_telepon'=> $this->input->post('no_telepon')
						);
			$this->Pelanggan_model->update($this->session->userdata('id_pelanggan'), $pelanggan);
						
			// set pesan
			$this->session->set_flashdata('message', 'Satu data pelanggan berhasil diupdate!');
			
			redirect('pelanggan');
		}
		else
		{
			
			$this->load->view('template', $data);
		}
	}
	
	/**
	 * Validasi untuk id_pelanggan, agar tidak ada siswa dengan id_pelanggan sama
	 */
	function valid_id_pelanggan($id_pelanggan)
	{
		if ($this->Pelanggan_model->valid_id_pelanggan($id_pelanggan) == TRUE)
		{
			$this->form_validation->set_message('valid_id_pelanggan', "pelanggan dengan id_pelanggan $id_pelanggan sudah terdaftar");
			return FALSE;
		}
		else
		{			
			return TRUE;
		}
	}
	
	// cek apakah valid untuk update?
	function valid_id_pelanggan2()
	{
		// cek agar tidak ada id_pelanggan ganda, khusus untuk proses update
		$current_id_pelanggan 	= $this->session->userdata('id_pelanggan');
		$new_id_pelanggan		= $this->input->post('id_pelanggan');
				
		if ($new_id_pelanggan === $current_pelanggan)
		{
			return TRUE;
		}
		else
		{
			if($this->Pelanggan_model->valid_id_pelanggan($new_id_pelanggan) === TRUE) // cek database untuk entry yang sama memakai valid_entry()
			{
				$this->form_validation->set_message('valid_id_pelanggan2', "pelanggan dengan id pelanggan $new_id_pelanggan sudah terdaftar");
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}

}
