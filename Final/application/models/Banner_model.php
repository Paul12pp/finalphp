<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();	
	}

	function agregarBanner($banner)
	{
		$id= $banner['id'];
		if($id+0 > 0){
			$this->db->where('id=',$id);
			unset($banner['id']);
			$this->db->update('banner',$banner);
		}else{
			$this->db->insert('banner',$banner);
		}	
	}

	function agregarDisplay($display)
	{
		$id= $display['id'];
		if($id+0 > 0){
			$this->db->where('id=',$id);
			unset($display['id']);
			$this->db->update('bdisplay',$display);
		}else{
			$this->db->insert('bdisplay',$display);
		}
	}

	function currentBanner($id)
	{
		$banner = new stdClass();
		$banner->id='';
		$banner->tipo='';
		$banner->codigo='';
		$banner->imagen='';
		$banner->idadmin='';
		$query = $this->db->where("id=",$id);
		$query = $this->db->get('banner');
		$rs = $query->result();
		if(count($rs)>0){
			$banner = $rs[0];
		}
		return $banner;
	}

	function listarBanner($offset, $page)
	{
		$query = $this->db->query("SELECT *, banner.id as id, usuario.username from banner inner JOIN usuario on banner.idadmin = usuario.id order by banner.id DESC LIMIT {$page} OFFSET {$offset}");
		return $query->result();
	}
	
	function totalBan()
	{
		$todos = $this->db->query("select count(*) as nr from banner");
		$nn = $todos->result();
		return $nn[0]->nr;
	}

	function eliminarBan($ban)
	{
		$this->db->query("DELETE FROM banner WHERE id = {$ban}");
	}

	function cargarBannerp()
	{
		$query = $this->db->query("SELECT banner.imagen, banner.codigo from banner INNER JOIN bdisplay on banner.id = bdisplay.idbanner WHERE bdisplay.id=1");
		return $query->result();
	}

	function cargarBanners()
	{
		$query = $this->db->query("SELECT banner.imagen, banner.codigo from banner INNER JOIN bdisplay on banner.id = bdisplay.idbanner WHERE bdisplay.id=2");
		return $query->result();
	}

}

/* End of file Banner_model.php */
/* Location: ./application/models/Banner_model.php */