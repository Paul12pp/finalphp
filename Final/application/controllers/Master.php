<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('noticia_model');
		$this->load->model('evento_model');
		$this->load->model('banner_model');
	}

	public function index()
	{
		$this->load->helper('admine');
		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}

		$id =(isset($_GET['user'])) ? $_GET
		['user']+0:0;
		$ide =(isset($_GET['noti'])) ? $_GET
		['noti']+0:0;
		$ido =(isset($_GET['eve'])) ? $_GET
		['eve']+0:0;
		$idi =(isset($_GET['ban'])) ? $_GET
		['ban']+0:0;

		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();

		$data['todoN']= $this->listaN();
		$data['todoT'] =$this->listaT();
		$data['todoU'] = $this->listU();
		$data['todoB'] = $this->listaB();

		$data['noticia'] = $this->noticia_model->currentNoticia($ide);
		$data['evento'] = $this->evento_model->currentEvento($ido);
		$data['banner'] = $this->banner_model->currentBanner($idi);
		$data['usuario'] = $this->usuario_model->owneruser($id);

		$data['banners'] = $this->banner_model->listarBanner($data['todoB']['offsetB'], $data['todoB']['items_per_pageB']);
		$data['noticias'] = $this->noticia_model->listarAnuncio($data['todoT']['offsetT'], $data['todoT']['items_per_pageT']);
		$data['eventos'] = $this->evento_model->listarEvento($data['todoN']['offsetn'], $data['todoN']['items_per_pagen']);
		$data['usuarios'] = $this->usuario_model->listarUsuarios($data['todoU']['offsetU'], $data['todoU']['items_per_pageU']);
		$this->load->view('masters/index',$data);
	}

	function noticias()
	{
		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['total'] = $this->noticia_model->totalNoti();
		$total = $this->noticia_model->totalNoti();
		$nr = $total;
		$items_per_page = 3;
		$totalpages = ceil($nr/$items_per_page);
		if(isset($_GET['page'])  && !empty($_GET['page']))
		{
			$page = $_GET['page'];
			if($page>$totalpages){
				$page=1;
			}
		}else{
			$page = 1;
		}
		$offset = ($page-1)*$items_per_page;
		$data['noticias'] = $this->noticia_model->listarAnuncio($offset, $items_per_page);
		$data['totalpages'] = $totalpages;
		$data['page'] = $page;		
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('masters/noticia', $data);
	}


	function listaN()
	{
		$data = array();
		$data['totaln'] = $this->noticia_model->totalNoti();
		$total = $this->noticia_model->totalNoti();
		$nr = $total;
		$items_per_page = 3;
		$totalpages = ceil($nr/$items_per_page);
		if(isset($_GET['pagen'])  && !empty($_GET['pagen']))
		{
			$page = $_GET['pagen'];
			if($page>$totalpages){
				$page=1;
			}
		}else{
			$page = 1;
		}
		$offset = ($page-1)*$items_per_page;
		$data['offsetn']=$offset;
		$data['items_per_pagen']= $items_per_page;
		$data['totalpagesn'] = $totalpages;
		$data['pagen'] = $page;
		return $data;
	}

	function listU()
	{
		$data = array();
		
		$data['totalu'] = $this->usuario_model->totalUser();
		$total = $this->usuario_model->totalUser();
		$nr = $total;
		$items_per_page = 3;
		$totalpages = ceil($nr/$items_per_page);
		if(isset($_GET['pageu'])  && !empty($_GET['pageu']))
		{
			$page = $_GET['pageu'];
			if($page>$totalpages){
				$page=1;
			}
		}else{
			$page = 1;
		}
		$offset = ($page-1)*$items_per_page;
		$data['offsetU']=$offset;
		$data['items_per_pageU'] = $items_per_page;
		$data['totalpagesu'] = $totalpages;
		$data['pageu'] = $page;
		return $data;
	}

	function listaT()
	{
		$data = array();
		
		$data['totalt'] = $this->evento_model->totalEvent();
		$total = $this->evento_model->totalEvent();
		$nr = $total;
		$items_per_page = 3;
		$totalpages = ceil($nr/$items_per_page);
		if(isset($_GET['paget'])  && !empty($_GET['paget']))
		{
			$page = $_GET['paget'];
			if($page>$totalpages){
				$page=1;
			}
		}else{
			$page = 1;
		}
		$offset = ($page-1)*$items_per_page;
		$data['offsetT']=$offset;
		$data['items_per_pageT'] = $items_per_page;
		$data['totalpagest'] = $totalpages;
		$data['paget'] = $page;
		return $data;
	}

	function listaB()
	{
		$data = array();
		
		$data['totalb'] = $this->banner_model->totalBan();
		$total = $this->banner_model->totalBan();
		$nr = $total;
		$items_per_page = 3;
		$totalpages = ceil($nr/$items_per_page);
		if(isset($_GET['pageb'])  && !empty($_GET['pageb']))
		{
			$page = $_GET['pageb'];
			if($page>$totalpages){
				$page=1;
			}
		}else{
			$page = 1;
		}
		$offset = ($page-1)*$items_per_page;
		$data['offsetB']=$offset;
		$data['items_per_pageB'] = $items_per_page;
		$data['totalpagesb'] = $totalpages;
		$data['pageb'] = $page;
		return $data;
	}

	function eventos()
	{
		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['total'] = $this->evento_model->totalEvent();
		$total = $this->evento_model->totalEvent();
		$nr = $total;
		$items_per_page = 3;
		$totalpages = ceil($nr/$items_per_page);
		if(isset($_GET['page'])  && !empty($_GET['page']))
		{
			$page = $_GET['page'];
			if($page>$totalpages){
				$page=1;
			}
		}else{
			$page = 1;
		}
		$offset = ($page-1)*$items_per_page;
		$data['eventos'] = $this->evento_model->listarEvento($offset, $items_per_page);
		$data['totalpages'] = $totalpages;
		$data['page'] = $page;
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('masters/evento', $data);
	}


	function guardarUser()
	{
		
		if($_POST)
		{
			if($_POST['id']+0>0){
				//var_dump($_POST);
				//exit();
				$this->usuario_model->guardarUsuario($_POST);
				redirect('master');
			}else{
				$d2 = strtotime('+0 days');
	 			$d2 = (date('Y-m-d',$d2));
				$_POST['password']= md5($_POST['password']);
				$_POST['fechareg']= $d2;
				$this->usuario_model->guardarUsuario($_POST);
				redirect('master');	
			}
			
		}else{
			redirect('master');
		}
	}

	function guardarNoticia()
	{
		if($_POST)
		{
			if($_POST['id']+0>0)
			{
				$this->noticia_model->guardarNoticia($_POST);
				redirect('master');
			}else
			{
				$d2 = strtotime('+0 days');
	 			$d2 = (date('Y-m-d',$d2));
				$_POST['fecha'] = $d2;
				$_POST['idadmin']= $_SESSION['usuario'];
				$this->noticia_model->guardarNoticia($_POST);
				redirect('master');
			}
		}else{
			redirect('master');
		}
	}

	function guardarBanner()
	{
		if($_POST)
		{
			$_POST['imagen']='';
			if(count($_FILES)>0 && $_FILES['imagen']['error']!=4){
				$nombre = $_FILES['imagen']['name'];
				$nombrer = strtolower($nombre);
				$cd=$_FILES['imagen']['tmp_name'];
				$ruta = "img/" . $_FILES['imagen']['name'];
				$destino = "img/".$nombrer;
				$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
				$_POST['imagen'] = $destino;
			}
			$_POST['idadmin']= $_SESSION['usuario'];
			$this->banner_model->agregarBanner($_POST);
			redirect('master');
		}else{
			redirect('master');
		}
	}

	function guardarDisplay()
	{
		if($_POST)
		{
			$this->banner_model->agregarDisplay($_POST);
			redirect('master');
		}else{
			redirect('master');
		}	
	}

	function guardarEvento()
	{
		if($_POST)
		{
			if($_POST['id']+0>0)
			{
				if(count($_FILES)>0 && $_FILES['imagen']['error']!=4){
					$nombre = $_FILES['imagen']['name'];
					$nombrer = strtolower($nombre);
					$cd=$_FILES['imagen']['tmp_name'];
					$ruta = "img/" . $_FILES['imagen']['name'];
					$destino = "img/".$nombrer;
					$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
					$_POST['imagen'] = $destino;
				}
				$this->evento_model->guardarEvento($_POST);
				redirect('master');
			}else
			{
				if(count($_FILES)>0 && $_FILES['imagen']['error']!=4){
					$nombre = $_FILES['imagen']['name'];
					$nombrer = strtolower($nombre);
					$cd=$_FILES['imagen']['tmp_name'];
					$ruta = "img/" . $_FILES['imagen']['name'];
					$destino = "img/".$nombrer;
					$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
					$_POST['imagen'] = $destino;
				}
				$_POST['idadmin']= $_SESSION['usuario'];
				$this->evento_model->guardarEvento($_POST);
				redirect('master');
			}
		}else{
			redirect('master');
		}
	}

	function makeadmin()
	{
		$id =(isset($_GET['id'])) ? $_GET['id']+0:0;
		$this->usuario_model->makeadmin($id);
		redirect('master');
	}

	function makenormal()
	{
		$id =(isset($_GET['id'])) ? $_GET['id']+0:0;
		$this->usuario_model->makenormal($id);
		redirect('master');	
	}

	function eliminar()
	{
		$id =(isset($_GET['id'])) ? $_GET['id']+0:0;
		$this->usuario_model->eliminar($id);
		redirect('master');		
	}

	function eliminarnoticia()
	{
		$id =(isset($_GET['del'])) ? $_GET['del']+0:0;
		$this->noticia_model->eliminarNoti($id);
		redirect('master');	
	}

	function eliminarevento()
	{
		$id =(isset($_GET['event'])) ? $_GET['event']+0:0;
		$this->evento_model->eliminarEvent($id);
		redirect('master');	
	}

	function eliminarbanner()
	{
		$id =(isset($_GET['bandel'])) ? $_GET['bandel']+0:0;
		$this->banner_model->eliminarBan($id);
		redirect('master');	
	}

	function detallenoticia()
	{
		$id = $id =(isset($_GET['info'])) ? $_GET
		['info']+0:0;

		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['noticia'] = $this->noticia_model->cargarNoticia($id);
		$ide = $data['noticia']->idadmin;
		$data['usuario'] = $this->usuario_model->owneruser($ide);
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		if(isset($data['noticia']->id)){
			$this->load->view('masters/detalle', $data);
		}else{
			redirect('anuncio/error',$data);
		}		
	}

	function detallevento()
	{
		$id = $id =(isset($_GET['event'])) ? $_GET
		['event']+0:0;

		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['evento'] = $this->evento_model->cargarEvento($id);
		$ide = $data['evento']->idadmin;
		$data['usuario'] = $this->usuario_model->owneruser($ide);
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		if(isset($data['evento']->id)){
			$this->load->view('masters/detallevento', $data);
		}else{
			redirect('anuncio/error',$data);
		}		
	}

}

/* End of file Master.php */
/* Location: ./application/controllers/Master.php */