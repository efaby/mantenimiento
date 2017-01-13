<?php
require_once(PATH_MODELS."/BaseModel.php");

class PartesModel {

	public function getlistadoPartes(){
		$activo = $_GET['id'];
		$model = new BaseModel();	
		$sql = "select p.* from partes_maquina as p			
				where p.activo_id = ".$activo;		
		return $model->execSql($sql, array(),true);
	}	
	
	public function getActivoName(){
		$model = new BaseModel();
		$activo = $_GET['id'];
		$sql = "select a.id, a.nombre_activo as nombre from activo_fisico as a				
				where a.id = ".$activo;
		return $model->execSql($sql, array());
	}
	
	public function getParte($id)
	{
		$model = new BaseModel();		
		if($id > 0){
			$sql = "select * from partes_maquina where id = ?";
			$result = $model->execSql($sql, array($id));				
		} else {
			$result = (object) array('id'=>0,'nombre'=>'', 'url'=>'');			
		}		
		return $result;
	}
	
	public function getFrecuencias(){
		$model = new BaseModel();
		$sql = "select id, nombre from frecuencia";
		return $model->execSql($sql, array(),true);
	}
	
	public function getPlanes($id,$plan){
		$model = new BaseModel();
		$sql = "select id, tarea from plan_mantenimiento 				
				where eliminado = 0 and 
				id not in (select plan_mantenimiento_id from activo_plan where eliminado = 0 and activo_fisico_id = ? and plan_mantenimiento_id <> ?)";
		return $model->execSql($sql, array($id,$plan),true);
	}
	
	public function savePartes($partes)
	{
		$model = new BaseModel();
		return $model->saveDatos($partes,'partes_maquina');
	}
	
	public function delPartes($id){
		$sql = "delete from partes_maquina where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($id),false,true);
	}

}
