<?php 

/**
* 
*/
class Ubigeo extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ubigeo_modelo', 'ubigeo');
	}

	function index()
	{
		$data['titulo'] = "Listas Desplegables con CI y jQuery";
		$data['dptos'] = $this->ubigeo->devolverDepartamentos();

		$this->load->view('ubigeo_vista', $data);
	}

	function prov()
	{
		$coddep = $this->input->get('id');

		$this->ubigeo->devolverProvincias($coddep);
	}

	function dist()
	{
		$codpro = $this->input->get('id');

		$this->ubigeo->devolverDistritos($codpro);
	}

	function cent()
	{
		$coddis = $this->input->get('id');

		$this->ubigeo->devolverCentros($coddis);
	}

}