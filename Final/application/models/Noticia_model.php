<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function guardarNoticia($noti){
		
		$id= $noti['id'];
		if($id+0 > 0){
			$this->db->where('id=',$id);
			unset($noti['id']);
			$this->db->update('notcia',$noti);
		}else{
			$this->db->insert('notcia',$noti);	
		}
	}

	function currentNoticia($id)
	{
		$noticia = new stdClass();
		$noticia->id='';
		$noticia->titulo='';
		$noticia->contenido='';
		$noticia->fecha='';
		$noticia->idadmin='';
		$query = $this->db->where("id=",$id);
		$query = $this->db->get('notcia');
		$rs = $query->result();
		if(count($rs)>0){
			$noticia = $rs[0];
		}
		return $noticia;
	}

	function allNoti()
	{
		$query = $this->db->get('notcia');
		return $query->result();
	}

	function eliminarNoti($noti)
	{
		$this->db->query("DELETE FROM notcia WHERE id = {$noti}");
	}

	function totalNoti()
	{
		$todos = $this->db->query("select count(*) as nr from notcia");
		$nn = $todos->result();
		return $nn[0]->nr;
	}

	function listarAnuncio($offset, $page)
	{
		$query = $this->db->query("SELECT *, notcia.id as id, usuario.username from notcia inner JOIN usuario on notcia.idadmin = usuario.id order by fecha DESC LIMIT {$page} OFFSET {$offset}");
		return $query->result();
	}

	function cargarNoticia($id)
	{
		$noticia = new stdClass();
		$query = $this->db->where("id=",$id);
		$query = $this->db->get('notcia');

		$rs = $query->result();

		if(count($rs)>0){
			$noticia = $rs[0];
		}

		return $noticia;
	}

}

/* End of file Noticia_model.php */
/* Location: ./application/models/Noticia_model.php */