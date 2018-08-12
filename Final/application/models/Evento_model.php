<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();	
	}

	function guardarEvento($evento){
		
		$id= $evento['id'];
		if($id+0 > 0){
			$this->db->where('id=',$id);
			unset($evento['id']);
			$this->db->update('evento',$evento);
		}else{
			$this->db->insert('evento',$evento);	
		}
	}

	function currentEvento($id)
	{
		$evento = new stdClass();
		$evento->id='';
		$evento->nombre='';
		$evento->tipo='';
		$evento->lugar='';
		$evento->lat='';
		$evento->lng='';
		$evento->fecha='';
		$evento->hora='';
		$evento->descripcion='';
		$evento->enlace='';
		$evento->idadmin='';
		$query = $this->db->where("id=",$id);
		$query = $this->db->get('evento');
		$rs = $query->result();
		if(count($rs)>0){
			$evento = $rs[0];
		}
		return $evento;
	}

	function allEvent()
	{
		$query = $this->db->get('evento');
		return $query->result();
	}

	function eliminarEvent($evento)
	{
		$this->db->query("DELETE FROM evento WHERE id = {$evento}");
	}

	function totalEvent()
	{
		$todos = $this->db->query("select count(*) as nr from evento");
		$nn = $todos->result();
		return $nn[0]->nr;
	}

	function listarEvento($offset, $page)
	{
		$query = $this->db->query("SELECT *, evento.id as id, usuario.username from evento inner JOIN usuario on evento.idadmin = usuario.id order by fecha DESC LIMIT {$page} OFFSET {$offset}");
		return $query->result();
	}
	
	function listarpopo($offset, $page)
	{
		$query = $this->db->query("SELECT *, evento.id as id, usuario.username from evento inner JOIN usuario on evento.idadmin = usuario.id order by fecha DESC LIMIT {$page} OFFSET {$offset}");
		return $query->result();
	}

	function cargarEvento($id)
	{
		$evento = new stdClass();
		$query = $this->db->where("id=",$id);
		$query = $this->db->get('evento');

		$rs = $query->result();

		if(count($rs)>0){
			$evento = $rs[0];
		}

		return $evento;
	}

}

/* End of file Evento_model.php */
/* Location: ./application/models/Evento_model.php */