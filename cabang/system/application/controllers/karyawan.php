<?php
class Karyawan extends Controller {
	/**
	 * Constructor
	 */
	function Karyawan()
	{
		parent::Controller();
		$this->load->model('Karyawan_model', '', TRUE);
		
	}
	
	/**
	 * Inisialisasi variabel untuk $limit dan $title(untuk id element <body>)
	 */
	var $limit = 10;
	var $title = 'karyawan';
	
	/**
	 * Memeriksa user state, jika dalam keadaan login akan menampilkan halaman karyawan,
	 * jika tidak akan meredirect ke halaman login
	 */
	function index()
	{
			
		if ($this->session->userdata('login') == TRUE)
		{
			$this->get_last_ten_karyawan();
		}
		else
		{
			redirect('login');
		}
	}
	
	/**
	 * Menampilkan 10 data karyawan terkini
	 */
	function get_last_ten_karyawan($offset = 0)
	{
		$data['title'] = $this->title;
		$data['h2_title'] = 'Karyawan';
		$data['main_view'] = 'karyawan/karyawan';
		
		// Offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// Load data dari tabel karyawan
		$karyawans = $this->Karyawan_model->get_last_ten_karyawan($this->limit, $offset)->result();
		$num_rows = $this->Karyawan_model->count_all_num_rows();
		
		if ($num_rows > 0) // Jika query menghasilkan data
		{
			// Membuat pagination			
			$config['base_url'] = site_url('karyawan/get_last_ten_karyawan');
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
			$this->table->set_heading('No', 'Kode Karyawan', 'Nama', 'Alamat', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Agama');
			
			// Penomoran baris data
			$i = 0 + $offset;
			
			foreach ($karyawans as $karyawan)
			{
			
				if ($karyawan->JENIS_KELAMIN==1){
					$jk="Pria";
				}
				else{
					$jk="Wanita";
				}
						
				// Penyusunan data baris per baris
				$this->table->add_row(++$i, $karyawan->KODE_KARYAWAN, $karyawan->NAMA, $karyawan->ALAMAT, $karyawan->TEMPAT_LAHIR, $karyawan->TANGGAL_LAHIR, $jk, $karyawan->AGAMA );
			}
			$data['table'] = $this->table->generate();
		}
		else
		{
			$data['message'] = 'Tidak ditemukan satupun data karyawan!';
		}		
		
		$data['link'] = array('link_add' => anchor('karyawan/add/','tambah data', array('class' => 'add')));
		
		// Load default view
		$this->load->view('template', $data);
	}
	
		
}
