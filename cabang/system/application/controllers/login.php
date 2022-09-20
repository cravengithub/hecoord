<?php

class Login extends Controller {
	/**
	 * Constructor
	 */
	function login()
	{
		parent::Controller();
		$this->load->model('Login_model', '', TRUE);
	}
	
	/**
	 * Memeriksa user state, jika dalam keadaan login akan menampilkan halaman cart,
	 * jika tidak akan meload halaman login
	 */
	function index()
	{
		if ($this->session->userdata('login') == TRUE)
		{
			redirect('cart');
		}
		else
		{
			$this->load->view('login/login_view');
		}
	}
	
	/**
	 * Memproses login
	 */
	function process_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->Login_model->check_user($username, $password) == TRUE)
			{
				$data = array('username' => $username, 'login' => TRUE);
				$this->session->set_userdata($data);
				
				$sesi=$this->Login_model->session($username, $password);
				$this->session->set_userdata('kode_karyawan', $sesi->KODE_KARYAWAN);
				
				
				redirect('barang');
			}
			else
			{
				$this->session->set_flashdata('message', 'Maaf, username dan atau password Anda salah');
				redirect('login/index');
			}
		}
		else
		{
			$this->load->view('login/login_view');
		}
	}
	
	/**
	 * Memproses logout
	 */
	function process_logout()
	{
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}
