<?php
class Application extends Controller {

	function Application()
	{
		parent::Controller();
		$this->load->model('function_model');
		$this->output->cache(120);
	}
	
	function index()
	{
		$data['title'] = "Code Igniter Sample Application";
		$data['extraHeadContent'] = '<script type="text/javascript" src="' . base_url() . 'js/function_search.js"></script>';
		$this->load->view('application/index', $data);
	}

	function ajaxsearch()
	{
		$function_name = $this->input->post('function_name');
		$description = $this->input->post('description');
		echo $this->function_model->getSearchResults($function_name, $description);
	}

	function search()
	{
		$data['title'] = "Code Igniter Search Results";
		$function_name = $this->input->post('function_name');
		$data['search_results'] = $this->function_model->getSearchResults($function_name);
		$this->load->view('application/search', $data);
	}

}
?>