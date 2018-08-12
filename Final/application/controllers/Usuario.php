<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('banner_model');
	}

	public function index()
	{
		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['usuario'] = $this->usuario_model->owneruser($_SESSION['usuario']);
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('usuarios/index',$data);	
	}

	function actualizarPerfil()
	{
		if($_POST)
		{
			$this->usuario_model->actualizarPerfil($_POST);
			redirect('usuario');
		}
	}

}

/* End of file Usuario.php */
/* Location: ./application/controllers/Usuario.php */