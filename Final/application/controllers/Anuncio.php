<?php 
defined('BASEPATH') Or exit('No direct script access allowed');

class Anuncio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    $this->load->model('anuncio_model');
	    $this->load->model('usuario_model');
	    $this->load->model('evento_model');
	    $this->load->model('banner_model');
	}

	public function index()
	{
		function deleteError(){}

		set_error_handler("deleteError");
		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$total = $this->anuncio_model->total();
		$nr = $total;
		$items_per_page = 10;
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
		$data['todos'] = $this->anuncio_model->listarAnuncio($offset, $items_per_page);
		$data['torios'] = $this->anuncio_model->listarAleatorio($offset, $items_per_page);
		$data['totalpages'] = $totalpages;
		$data['page'] = $page;
		$data['eventos']= $this->evento_model->allEvent();
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('anuncios/index',$data);
	}

	function agregar()
	{
		$this->load->helper('paul');
		$data = array();
		$data['sesion'] = $_SESSION['usuario'];
		$data['admin'] = $_SESSION['admin'];
		$this->load->view('anuncios/agregar',$data);
	}

	function limpieza()
	{
		$data['todos'] = $this->anuncio_model->damelo();
		$d2 = strtotime('+0 days');
	 	$d2 = (date('Y-m-d',$d2));
		foreach ($data['todos'] as $key) {
			$anuncio = (date('Y-m-d',$key->fechaini));
			$id = $key->id;
			if($anuncio == $d2){
				$this->anuncio_model->eliminarAnuncio($id);
			}
			else{
			}
		}
	}

	//metodo de los formularios
	function cargar()
	{	
		function deleteError(){}

		set_error_handler("deleteError");
		$this->load->helper('paul');
		$data = array();
		$data['sesion'] = $_SESSION['usuario'];
		$data['admin'] = $_SESSION['admin'];
		if($_POST){
			$categoria = $_POST['categoria'];
			switch ($categoria) {
				case 'ac':
					$data['categoria']= 'Accesorios';
					$this->load->view('anuncios/accesorio', $data);
					break;
				case 'bc':
					$data['categoria']= 'Bicicletas';
					$this->load->view('anuncios/bicicleta',$data);
					break;
				case 'cm':
					$data['categoria']= 'Componentes';
					$this->load->view('anuncios/componente',$data);
					break;
				case 'cv':
					$data['categoria']= 'Servicios';
					$this->load->view('anuncios/servicio',$data);
					break;
				default:
					$this->load->view('errors/found');
					break;
			}
		}else{
			$this->load->view('errors/found',$data);
		}
            
	}

	function buscar()
	{
		$data = array();
		$data['sesion'] = $_SESSION['usuario'];
		$data['admin'] = $_SESSION['admin'];
		if($_POST){
			if($_POST['categoria']){
				if($_POST['categoria']=='Accesorio' || $_POST['categoria']=='Bicicleta'
				|| $_POST['categoria']=='Servicio' || $_POST['categoria']=='Componente')
				{
					$data['todos'] = $this->anuncio_model->buscarCtg($_POST['buscar'],$_POST['categoria']);
				}else{
					$data['todos'] = $this->anuncio_model->buscarWctg($_POST['buscar'],$_POST['categoria']);
				}
			}else{
				$data['todos'] = $this->anuncio_model->buscarNormal($_POST['buscar']);
			}
		}
		$data['count']= count($data['todos']);
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('anuncios/resultado',$data);
	}

	//metodos guardar
	function guardarBici()
	{
		$data = array();
		$data['sesion'] = $_SESSION['usuario'];
		$data['admin'] = $_SESSION['admin'];
		$this->load->helper('paul');
		if($_POST){
			if($_POST['categoria']=='bc'){$_POST['categoria']='Bicicleta';}
			if($_POST['categoria']=='ac'){$_POST['categoria']='Accesorio';}
			if($_POST['categoria']=='cv'){$_POST['categoria']='Servicio';}
			if($_POST['categoria']=='cm'){$_POST['categoria']='Componente';}
			
			if($_POST['id']+0>0){
				$this->anuncio_model->guardarBicicleta($_POST);
				redirect('anuncio/panel');
			}else{
				$_POST['imagen']='img/graph.png';
				$_POST['fechaini']= strtotime('+0 days');
				$_POST['fechafin']= strtotime('+45 days');
				$_POST['idusuario']= $_SESSION['usuario'];
				$_POST['status']=1;
				$_POST['deleter']=0;
				if(count($_FILES)>0 && $_FILES['imagen']['error']!=4){
					$nombre = $_FILES['imagen']['name'];
					$nombrer = strtolower($nombre);
					$cd=$_FILES['imagen']['tmp_name'];
					$ruta = "img/" . $_FILES['imagen']['name'];
					$destino = "img/".$nombrer;
					$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
					$_POST['imagen'] = $destino;
				}
				$this->anuncio_model->guardarBicicleta($_POST);
				$this->load->view('anuncios/mensaje',$data);
			}
			$_POST= array();
		}
	}

	//metodos listar
	function listbicicletas()
	{
		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['total'] = $this->anuncio_model->totalBici();
		$total = $this->anuncio_model->totalBici();
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
		$data['bicicletas'] = $this->anuncio_model->listarBicicleta($offset, $items_per_page);
		$data['totalpages'] = $totalpages;
		$data['page'] = $page;
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('anuncios/listbicicletas', $data);
	}

	function listaccesorios()
	{
		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['total'] = $this->anuncio_model->totalAcceso();
		$total = $this->anuncio_model->totalAcceso();
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
		$data['accesorios'] = $this->anuncio_model->listarAccesorio($offset, $items_per_page);
		$data['totalpages'] = $totalpages;
		$data['page'] = $page;
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('anuncios/listaccesorios', $data);
	}

	function listservicios()
	{
		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['total'] = $this->anuncio_model->totalServi();
		$total = $this->anuncio_model->totalServi();
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
		$data['servicios'] = $this->anuncio_model->listarServicio($offset, $items_per_page);
		$data['totalpages'] = $totalpages;
		$data['page'] = $page;
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('anuncios/listservicio', $data);
	}

	function listcomponentes()
	{
		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['total'] = $this->anuncio_model->totalCompo();
		$total = $this->anuncio_model->totalCompo();
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
		$data['componentes'] = $this->anuncio_model->listarComponente($offset, $items_per_page);
		$data['totalpages'] = $totalpages;
		$data['page'] = $page;
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('anuncios/listcomponente', $data);
	}

	//metodos detalles
	function detalle()
	{
		$id = $id =(isset($_GET['id'])) ? $_GET
		['id']+0:0;

		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['bicicleta'] = $this->anuncio_model->cargarBicicleta($id);
		$ide = $data['bicicleta']->idusuario;
		$data['usuario'] = $this->usuario_model->owneruser($ide);
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		if(isset($data['bicicleta']->id)){
			$this->load->view('anuncios/detalle', $data);
		}else{
			redirect('anuncio/error',$data);
		}		
	}

	function detalleac()
	{
		$id = $id =(isset($_GET['id'])) ? $_GET
		['id']+0:0;

		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['accesorio'] = $this->anuncio_model->cargarAccesorio($id);
		$ide = $data['accesorio']->idusuario;
		$data['usuario'] = $this->usuario_model->owneruser($ide);
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		if(isset($data['accesorio']->id)){
			$this->load->view('anuncios/detalleac', $data);
		}else{
			redirect('anuncio/error',$data);
		}	
	}

	function detallecv()
	{
		$id = $id =(isset($_GET['id'])) ? $_GET
		['id']+0:0;

		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'none';
		}
		$data['servicio'] = $this->anuncio_model->cargarServicio($id);
		$ide = $data['servicio']->idusuario;
		$data['usuario'] = $this->usuario_model->owneruser($ide);
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		if(isset($data['servicio']->id)){
			$this->load->view('anuncios/detallecv', $data);
		}else{
			redirect('anuncio/error',$data);
		}	
	}

	function detallecp()
	{
		$id = $id =(isset($_GET['id'])) ? $_GET
		['id']+0:0;

		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'none';
		}
		$data['componente'] = $this->anuncio_model->cargarComponente($id);
		$ide = $data['componente']->idusuario;
		$data['usuario'] = $this->usuario_model->owneruser($ide);
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		if(isset($data['componente']->id)){
			$this->load->view('anuncios/detallecp', $data);
		}else{
			redirect('anuncio/error',$data);
		}	

	}

	//panel de control
	function panel()
	{
		$this->load->helper('paul');
		$data = array();
		$id = $_SESSION['usuario'];
		$data['sesion'] = $_SESSION['usuario'];
		$data['admin'] = $_SESSION['admin'];
		$data['usuario'] = $this->usuario_model->owneruser($id);
		$total = $this->anuncio_model->totalSesion($id);
		$nr = $total;
		$items_per_page = 10;
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
		$data['todos'] = $this->anuncio_model->Bicisesion($id,$offset, $items_per_page);
		$data['totalpages'] = $totalpages;
		$data['page'] = $page;
		$data['primerban'] = $this->banner_model->cargarBannerp();
		$data['segundoban'] = $this->banner_model->cargarBanners();
		$this->load->view('anuncios/panel', $data);
	}

	//metodos de editar
	function editb()
	{
		$id = $id =(isset($_GET['id'])) ? $_GET
		['id']+0:0;

		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['bicicleta'] = $this->anuncio_model->cargarBicicleta($id);
		$ide = $data['bicicleta']->idusuario;
		if($ide != $_SESSION['usuario'])
		{
			$this->load->view('errors/errorproperty');
		}else{
			$data['usuario'] = $this->usuario_model->owneruser($ide);
			if(isset($data['bicicleta']->id)){
				$this->load->view('anuncios/editb', $data);
			}else{
				redirect('anuncio/error',$data);
			}	
		}	
	}

	function editac(){

		$id = $id =(isset($_GET['id'])) ? $_GET
		['id']+0:0;

		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['accesorio'] = $this->anuncio_model->cargarAccesorio($id);
		$ide = $data['accesorio']->idusuario;
		if($ide != $_SESSION['usuario']){
			$this->load->view('errors/errorproperty');
		}else{
			$data['usuario'] = $this->usuario_model->owneruser($ide);
			if(isset($data['accesorio']->id)){
			$this->load->view('anuncios/editac', $data);
			}else{
			redirect('anuncio/error',$data);
			}	
		}		
	}

	function editcv()
	{
		$id = $id =(isset($_GET['id'])) ? $_GET
		['id']+0:0;

		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['servicio'] = $this->anuncio_model->cargarServicio($id);
		$ide = $data['servicio']->idusuario;
		if($ide != $_SESSION['usuario']){
			$this->load->view('errors/errorproperty');
		}else{
			$data['usuario'] = $this->usuario_model->owneruser($ide);
			if(isset($data['servicio']->id)){
				$this->load->view('anuncios/editcv', $data);
			}else{
				redirect('anuncio/error',$data);
			}	
		}		
	}

	function editcp()
	{
		$id = $id =(isset($_GET['id'])) ? $_GET
		['id']+0:0;

		$data = array();
		if($_SESSION){
			$data['sesion'] = $_SESSION['usuario'];
			$data['admin'] = $_SESSION['admin'];
		}else{
			$data['sesion'] = 'popo';
			$data['admin'] = 'hidden';
		}
		$data['componente'] = $this->anuncio_model->cargarComponente($id);
		$ide = $data['componente']->idusuario;
		if($ide != $_SESSION['usuario']){
			$this->load->view('errors/errorproperty');
		}else{
			$data['usuario'] = $this->usuario_model->owneruser($ide);
			if(isset($data['componente']->id)){
				$this->load->view('anuncios/editcp', $data);
			}else{
				redirect('anuncio/error',$data);
			}	
		}			
	}

	//eliminar
	function eliminar(){
		$id = (isset($_GET['id'])) ? $_GET['id']+0:0;
		//$this->anuncio_model->eliminarAnuncio($id);
		//$this->load->view('anuncios/exito');
		redirect('anuncio/panel');
	}

	//pausar
	function pause()
	{
		$id = (isset($_GET['id'])) ? $_GET['id']+0:0;
		$this->anuncio_model->desactivarAnuncio($id);
		redirect('anuncio/panel');
	}

	//play
	function play()
	{
		$id = (isset($_GET['id'])) ? $_GET['id']+0:0;
		$this->anuncio_model->activarAnuncio($id);
		redirect('anuncio/panel');
	}

	//error de pagina no encontrada
	function error()
	{
		$this->load->view('errors/found');
	}
}

/* End of file Anuncio.php */
/* Location: ./application/controllers/Anuncio.php */