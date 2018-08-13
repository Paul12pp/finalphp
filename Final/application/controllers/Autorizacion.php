<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Autorizacion extends CI_Controller {

	public function __construct()
	{
		define('NOLOGIN',true);
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('banner_model');
	}

	public function index()
	{
		$data = array();
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('autorizaciones/login',$data);
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

			$secret = '6Lfu1GkUAAAAADzYRUqqwvg__9tJCiMbjNW4wP-o';
	        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
	        $responseData = json_decode($verifyResponse);
	        if($responseData->success){
	        	$this->usuario_model->registrarUsuario($_POST);
	        }
	        else {
				
				$data = array();
				$data['error'] = "Llene el captcha.";
				$data['primerban'] = $this->banner_model->cargarBannerp();
				$data['segundoban'] = $this->banner_model->cargarBanners();
				$this->load->view('autorizaciones/registro', $data);
			}
		}
	}

	function registro()
	{
		$data = array();
		$data['error'] = ""; 
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('autorizaciones/registro', $data);
	}

	function sesionstar()
	{
		$data = array();
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('autorizaciones/login',$data);
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