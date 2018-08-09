<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncio_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	///Metodos de guardar
	function guardarBicicleta($bicicleta)
	{
		$id = $bicicleta['id'];
		if($id+0 > 0){
			$this->db->where('id=',$id);
			unset($bicicleta['id']);
			$this->db->update('bibicicleta',$bicicleta);
		}else{
			$this->db->insert('bibicicleta',$bicicleta);			
		}
	}

	function guardarComponente($componente)
	{
		$this->db->insert('componente',$componente);
	}

	function guardarAccesorio($accesorio)
	{
		$this->db->insert('accesorio',$accesorio);
	}

	function guardarServicio($servicio)
	{
		$this->db->insert('servicio',$servicio);
	}

	function listarAnuncio($offset,$page)
	{
		$query = $this->db->query("SELECT *, bibicicleta.id as id, usuario.username FROM `bibicicleta` INNER JOIN usuario on bibicicleta.idusuario = usuario.id WHERE bibicicleta.status = 1  and bibicicleta.deleter=0 ORDER by bibicicleta.fechaini DESC LIMIT {$page} OFFSET {$offset}");
		return $query->result();
	}

	function total(){
		$todos = $this->db->query("select count(*) as nr from bibicicleta where status=1 and deleter=0");
		$nn = $todos->result();
		return  $nn[0]->nr;
	}

	//metodos listar individuales
	function listarBicicleta($offset, $page)
	{
		$query = $this->db->query("SELECT *, bibicicleta.id as id, usuario.username FROM `bibicicleta` INNER JOIN usuario on bibicicleta.idusuario = usuario.id where bibicicleta.categoria='Bicicleta' and bibicicleta.status=1 and bibicicleta.deleter=0 ORDER by bibicicleta.fechaini DESC LIMIT {$page} OFFSET {$offset}");
		return $query->result();
	}	

	function totalBici()
	{
		$todos = $this->db->query("select count(*) as nr from bibicicleta  WHERE categoria = 'Bicicleta' and 
			status = 1 and deleter=0");
		$nn = $todos->result();
		return $nn[0]->nr;
	}

	//accesorios
	function listarAccesorio($offset, $page)
	{
		$query = $this->db->query("SELECT *, bibicicleta.id as id, usuario.username FROM `bibicicleta` INNER JOIN usuario on bibicicleta.idusuario = usuario.id where bibicicleta.categoria='Accesorio' and bibicicleta.status=1  and bibicicleta.deleter=0 ORDER by bibicicleta.fechaini DESC LIMIT {$page} OFFSET {$offset}");
		return $query->result();
	}	

	function totalAcceso()
	{
		$todos = $this->db->query("select count(*) as nr from bibicicleta WHERE categoria = 'Accesorio' and 
			status = 1 and deleter=0");
		$nn = $todos->result();
		return $nn[0]->nr;
	}
	//servicios
	function listarServicio($offset, $page)
	{
		$query = $this->db->query("SELECT *, bibicicleta.id as id, usuario.username FROM `bibicicleta` INNER JOIN usuario on bibicicleta.idusuario = usuario.id where bibicicleta.categoria='Servicio' and bibicicleta.status=1 and bibicicleta.deleter=0 ORDER by bibicicleta.fechaini DESC LIMIT {$page} OFFSET {$offset}");
		return $query->result();
	}	

	function totalServi()
	{
		$todos = $this->db->query("select count(*) as nr from bibicicleta WHERE categoria = 'Servicio' and 
			status = 1 and deleter=0");
		$nn = $todos->result();
		return $nn[0]->nr;
	}

	//componentes
	function listarComponente($offset, $page)
	{
		$query = $this->db->query("SELECT *, bibicicleta.id as id, usuario.username FROM `bibicicleta` INNER JOIN usuario on bibicicleta.idusuario = usuario.id where bibicicleta.categoria='Componente' and bibicicleta.status=1 and bibicicleta.deleter=0 ORDER by bibicicleta.fechaini DESC LIMIT {$page} OFFSET {$offset}");
		return $query->result();
	}	

	function totalCompo()
	{
		$todos = $this->db->query("select count(*) as nr from bibicicleta  WHERE categoria = 'Componente' and 
			status = 1 and deleter=0");
		$nn = $todos->result();
		return $nn[0]->nr;
	}

	//metodos cargar
	function cargarBicicleta($id)
	{
		$bicicleta = new stdClass();
		$query = $this->db->where("id=",$id);
		$query = $this->db->where("categoria='Bicicleta'");
		$query = $this->db->get('bibicicleta');

		$rs = $query->result();

		if(count($rs)>0){
			$bicicleta = $rs[0];
		}

		return $bicicleta;
	}

	function cargarAccesorio($id)
	{
		$accesorio = new stdClass();
		$query = $this->db->where("id=",$id);
		$query = $this->db->where("categoria='Accesorio'");
		$query = $this->db->get('bibicicleta');

		$rs = $query->result();

		if(count($rs)>0){
			$accesorio = $rs[0];
		}

		return $accesorio;
	}

	function cargarServicio($id)
	{
		$servicio = new stdClass();
		
		$query = $this->db->where("id=",$id);
		$query = $this->db->where("categoria='Servicio'");
		$query = $this->db->get('bibicicleta');

		$rs = $query->result();

		if(count($rs)>0){
			$servicio = $rs[0];
		}

		return $servicio;
	}

	function cargarComponente($id)
	{
		$componente = new stdClass();
		$query = $this->db->where("id=",$id);
		$query = $this->db->where("categoria='Componente'");		
		$query = $this->db->get('bibicicleta');

		$rs = $query->result();

		if(count($rs)>0){
			$componente = $rs[0];
		}

		return $componente;
	}

	//cargar por id de la session
	function Bicisesion($id, $offset, $page)
	{
		$query = $this->db->query("SELECT * FROM `bibicicleta` where deleter=0 and idusuario={$id} ORDER by fechaini DESC LIMIT {$page} OFFSET {$offset}");
		#$query = $this->db->where('idusuario=',$id);
		#$query = $this->db->where('deleter=0');
		#$query = $this->db->get('bibicicleta');
		return $query->result();
	}

	//total anuncio del usuario
	function totalSesion($id)
	{
		$todos = $this->db->query("select count(*) as nr from bibicicleta where deleter=0 and idusuario={$id}");
		$nn = $todos->result();
		return $nn[0]->nr;
	}

	//elimina anuncio
	function eliminarAnuncio($id)
	{
		$this->db->query("UPDATE bibicicleta set deleter=1 WHERE id = {$id}");
	}

	//activa anuncio
	function activarAnuncio($id)
	{
		$this->db->query("UPDATE bibicicleta set status=1 WHERE id = {$id}");
	}

	//desactiva anuncio
	function desactivarAnuncio($id)
	{
		$this->db->query("UPDATE bibicicleta set status=0 WHERE id = {$id}");
	}			

}

/* End of file Anuncio_model.php */
/* Location: ./application/models/Anuncio_model.php */