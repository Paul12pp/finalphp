<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();	
	}

	function registrarUsuario($user)
	{
		unset($user['g-recaptcha-response']);
		$this->db->insert('usuario', $user);
	}

	//este metodo es funcional en el master clase
	function guardarUsuario($user){
		
		$id= $user['id'];
		if($id+0 > 0){
			$this->db->where('id=',$id);
			unset($user['id']);
			$this->db->update('usuario',$user);
		}else{
			$this->db->insert('usuario',$user);	
		}
		
	}

	function actualizarPerfil($user)
	{
		$id= $user['id'];
		if($id+0 > 0){
			$this->db->where('id=',$id);
			unset($user['id']);
			unset($user['password']);
			unset($user['fechareg']);
			$this->db->update('usuario',$user);
		}
	}

	function iniciarSesion($user,$clave)
	{
		$this->db->where('username=',$user);
		$this->db->where('password=',md5($clave));
		$query = $this->db->get('usuario');

		$rs = $query->result();
		if(count($rs)>0){
			$usuario = $rs[0];
			return $usuario->id;
		}

		$todos = $this->db->query("select count(*) as nr from usuario");
		$nn = $todos->result();

		if($nn[0]->nr < 1 && $user == 'admin' && $clave=='1234'){
			return 0;
		}
		return false;
	}

	function owneruser($id)
	{
		$usuario = new stdClass();
		$usuario->id='';
		$usuario->username='';
		$usuario->password='';
		$usuario->nombre='';
		$usuario->apellido='';
		$usuario->correo='';
		$usuario->acerca='';
		$usuario->fechareg='';
		$usuario->admin='';
		$query = $this->db->where("id=",$id);
		$query = $this->db->get('usuario');
		$rs = $query->result();
		if(count($rs)>0){
			$usuario = $rs[0];
		}
		return $usuario;
	}

	function listarUsuarios($offset, $page)
	{
		$query = $this->db->query("SELECT * from usuario order by fechareg DESC LIMIT {$page} OFFSET {$offset}");
		return $query->result();
	}

	function todos()
	{
		$query = $this->db->get('usuario');
		return $query->result();
	}

	function makeadmin($user)
	{
		$this->db->query("UPDATE usuario set admin = 1 WHERE id = {$user}");
	}

	function makenormal($user)
	{
		$this->db->query("UPDATE usuario set admin = 0 WHERE id = {$user}");
	}

	function eliminar($user)
	{
		$this->db->query("DELETE FROM usuario WHERE id = {$user}");
	}

	function totalUser()
	{
		$todos = $this->db->query("select count(*) as nr from usuario");
		$nn = $todos->result();
		return $nn[0]->nr;
	}
}

/* End of file Usuario_model.php */
/* Location: ./application/models/Usuario_model.php */