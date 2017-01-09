<?php
require_once(PATH_MODELS."/BaseModel.php");

class NovedadModel {

	public function getlistadoNovedad($usuario){
		$model = new BaseModel();	
		$sql = "select n.*, a.nombre_activo as maquina, u.nombres  as nombre_tecnico1, u.apellidos as apellido_tecnico1, u1.nombres  as nombre_tecnico2, u1.apellidos as apellido_tecnico2 from novedad as n
				inner join activo_fisico as a on a.id =  n.activo_fisico_id
				left join usuario as u on u.id = n.tecnico_asigna
				left join usuario as u1 on u1.id = n.tecnico_repara
				where (tecnico_asigna = ".$usuario." or 0 = ".$usuario.") order by n.id desc";	

		return $model->execSql($sql, array(),true);
	}	
	
	public function getNovedad()
	{
		$novedad = $_GET['id'];
		$model = new BaseModel();		
		$sql = "select n.*, a.nombre_activo as maquina, u.nombres  as nombre_tecnico1, u.apellidos as apellido_tecnico1, u1.nombres  as nombre_tecnico2, u1.apellidos as apellido_tecnico2
				from novedad as n
				inner join activo_fisico as a on a.id =  n.activo_fisico_id
				
				left join usuario as u on u.id = n.tecnico_asigna
				left join usuario as u1 on u1.id = n.tecnico_repara
				where n.id = ?";

		return $model->execSql($sql, array($novedad));				

	}
	
	
	public function saveNovedad($novedad)
	{
		$model = new BaseModel();
		return $model->saveDatos($novedad,'novedad');
	}

	
	public function delParalelo(){
		$paralelo = $_GET['id'];
		$sql = "update paralelo set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($paralelo),false,true);
	}

	public function getLaboratorios(){
		$model = new BaseModel();	
		$sql = "select l.id, l.nombre from laboratorio as l where l.eliminado = 0";		
		return $model->execSql($sql, array(),true);
	}
	
	public function getMaquinas(){
		$model = new BaseModel();
		$sql = "select a.id, a.nombre from activo_fisico as a				
				where a.eliminado = 0 ";
		return $model->execSql($sql, array(),true);
	}
	
	public function getTecnicos(){
		$model = new BaseModel();
		$sql = "select u.id, u.nombres, u.apellidos from usuario as u where eliminado = 0 and u.tipo_usuario_id = 2";
		return $model->execSql($sql, array(),true);
	}
	
	public function getActivoById($id){
		$model = new BaseModel();
		$sql = "select nombre from activo_fisico where id = ".$id;
		return $model->execSql($sql, array());
	}
	
	public function getSupervisorById(){
		$model = new BaseModel();
		$sql = "select nombres, apellidos, email from usuario where tipo_usuario_id = 1 and eliminado = 0 ";
		return $model->execSql($sql, array());
	}
	
	
	public function getNovedadById($id)
	{
		$model = new BaseModel();
		$sql = "select a.nombre_activo as maquina, u.nombres, u.apellidos, u.email
				from novedad as n
				inner join activo_fisico as a on a.id =  n.activo_fisico_id
				inner join usuario as u on u.id = n.tecnico_asigna
				where n.id = ?";	
		return $model->execSql($sql, array($id));
	
	}
	
	
}
