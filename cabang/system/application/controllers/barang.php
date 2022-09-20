<?php
class Barang extends Controller {
	/**
	 * Constructor
	 */
	function Barang()
	{
		parent::Controller();
		$this->load->model('Barang_model', '', TRUE);
		
	}
	
	/**
	 * Inisialisasi variabel untuk $limit dan $title(untuk id element <body>)
	 */
	var $limit = 10;
	var $title = 'barang';
	
	/**
	 * Memeriksa user state, jika dalam keadaan login akan menampilkan halaman barang,
	 * jika tidak akan meredirect ke halaman login
	 */
	function index()
	{
			
		if ($this->session->userdata('login') == TRUE)
		{
			$this->get_last_ten_barang();
		}
		else
		{
			redirect('login');
		}
	}
	
	/**
	 * Menampilkan 10 data barang terkini
	 */
	function get_last_ten_barang($offset = 0)
	{
		$data['title'] = $this->title;
		$data['h2_title'] = 'Barang';
		$data['main_view'] = 'barang/barang';
		
		// Offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// Load data dari tabel barang
		$barangs = $this->Barang_model->get_last_ten_barang($this->limit, $offset)->result();
		$num_rows = $this->Barang_model->count_all_num_rows();
		
		if ($num_rows > 0) // Jika query menghasilkan data
		{
			// Membuat pagination			
			$config['base_url'] = site_url('barang/get_last_ten_barang');
			$config['total_rows'] = $num_rows;
			$config['per_page'] = $this->limit;
			$config['uri_segment'] = $uri_segment;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			
			// Set template tabel, untuk efek selang-seling tiap baris
			$tmpl = array( 'table_open'    => '<table border="0" cellpadding="0" cellspacing="0">',
						  'row_alt_start'  => '<tr class="zebra">',
							'row_alt_end'    => '</tr>'
						  );
			$this->table->set_template($tmpl);

			// Set heading untuk tabel
			$this->table->set_empty("&nbsp;");
			$this->table->set_heading('No', 'Kode Barang', 'Nama', 'Harga', 'Jumlah Barang', 'Limit Bawah');
			
			// Penomoran baris data
			$i = 0 + $offset;
			
			foreach ($barangs as $barang)
			{
						
				// Penyusunan data baris per baris
				$this->table->add_row(++$i, $barang->KODE_BARANG, $barang->NAMA, $barang->HARGA, $barang->JUMLAH_BARANG, $barang->LIMIT_BAWAH);
			}
			$data['table'] = $this->table->generate();
		}
		else
		{
			$data['message'] = 'Tidak ditemukan satupun data barang!';
		}		
		
		// Load default view
		$this->load->view('template', $data);
	}
	
		
}
