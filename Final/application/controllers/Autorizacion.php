<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Autorizacion extends CI_Controller {

	public function __construct()
	{
		define('NOLOGIN',true);
		parent::__construct();
		$this->load->model('usuario_model');
	}

	public function index()
	{
		$this->load->view('autorizaciones/login');
	}

	function guardar()
	{
		$d2 = strtotime('+0 days');
	 	$d2 = (date('Y-m-d',$d2));
		if($_POST)
		{
			$_POST['password']= md5($_POST['password']);
			$_POST['nombre']='';
			$_POST['apellido']='';
			$_POST['acerca']='';
			$_POST['fechareg']= $d2;
			$this->usuario_model->registrarUsuario($_POST);
			echo 'guardado';
		}

	}

	function registro()
	{
		$this->load->view('autorizaciones/registro');
	}

	function sesionstar()
	{
		$this->load->view('autorizaciones/login');
	}

	function login()
	{
		$data = array();
		$usuario = $_POST['username'];
		$clave = $_POST['password'];
		$tmp = $this->usuario_model->iniciarSesion($usuario,$clave);
		if($tmp !== false){
			$data['usuario']= $this->usuario_model->owneruser($tmp);
			$_SESSION['usuario'] = $tmp;
			$_SESSION['admin'] = $data['usuario']->admin;
			redirect('anuncio');
		}else{
			echo 'error';
		}
	}

	function salir()
	{
		session_destroy();
		redirect('anuncio');
	}
}

/* End of file Autorizacion.php */
/* Location: ./application/controllers/Autorizacion.php */