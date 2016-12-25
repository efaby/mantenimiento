<?php
require_once(PATH_MODELS."/BaseModel.php");

class NovedadModel {

	public function getlistadoNovedad($usuario){
		$model = new BaseModel();	
		$sql = "select n.*, a.nombre as maquina, l.nombre as laboratorio from novedad as n
				inner join activo_fisico as a on a.id =  n.activo_fisico_id
				inner join lab_activo as la on la.activo_fisico_id = a.id
				inner join laboratorio as l on l.id = la.laboratorio_id
				where (tecnico_asigna = ".$usuario." or 0 = ".$usuario.")";	
		return $model->execSql($sql, array(),true);
	}	
	
	public function getNovedad()
	{
		$novedad = $_GET['id'];
		$model = new BaseModel();		
		$sql = "select n.*, a.nombre as maquina, l.nombre as laboratorio from novedad as n
				inner join activo_fisico as a on a.id =  n.activo_fisico_id
				inner join lab_activo as la on la.activo_fisico_id = a.id
				inner join laboratorio as l on l.id = la.laboratorio_id 
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
		$sql = "select l.id, l.nombre from laboratorio as l";		
		return $model->execSql($sql, array(),true);
	}
	
	public function getMaquinas($laboratorio){
		$model = new BaseModel();
		$sql = "select a.id, a.nombre from activo_fisico as a
				inner join lab_activo as la on la.activo_fisico_id = a.id
				where la.laboratorio_id = ".$laboratorio;
		return $model->execSql($sql, array(),true);
	}
	
	public function getTecnicos(){
		$model = new BaseModel();
		$sql = "select u.id, u.nombres, u.apellidos from usuario as u where u.tipo_usuario_id = 2";
		return $model->execSql($sql, array(),true);
	}
}
