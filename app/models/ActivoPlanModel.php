<?php
require_once(PATH_MODELS."/BaseModel.php");

class ActivoPlanModel {

	public function getlistadoActivoPlan(){
		$activo = $_GET['id'];
		$model = new BaseModel();	
		$sql = "select ap.*, p.tarea, f.nombre as frecuencia, pm.nombre as parte from activo_plan as ap
				inner join plan_mantenimiento as p on p.id = ap.plan_mantenimiento_id
				inner join frecuencia as f on f.id = ap.frecuencia_id 	
				left join partes_maquina as pm on pm.id = ap.parte_maquina_id
				where ap.eliminado = 0 and ap.activo_fisico_id = ".$activo;		
		return $model->execSql($sql, array(),true);
	}	
	
	public function getActivoName(){
		$model = new BaseModel();
		$activo = $_GET['id'];
		$sql = "select a.id, a.nombre_activo as nombre from activo_fisico as a				
				where a.id = ".$activo;
		return $model->execSql($sql, array());
	}
	
	public function getActivoPlan($id)
	{
		$model = new BaseModel();		
		if($id > 0){
			$sql = "select * from activo_plan where eliminado = 0 and id = ?";
			$result = $model->execSql($sql, array($id));				
		} else {
			$result = (object) array('id'=>0,'alerta_numero'=>'', 'frecuencia_numero'=>'','plan_mantenimiento_id'=>0,'parte_maquina_id'=>0, 'frecuencia_id' =>0);			
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
	
	public function getPartes($id){
		$model = new BaseModel();
		$sql = "select id, nombre from partes_maquina
				where activo_id = ?";
		return $model->execSql($sql, array($id),true);
	}
	
	public function saveActivoPlan($activoPlan)
	{
		$model = new BaseModel();
		return $model->saveDatos($activoPlan,'activo_plan');
	}
	
	public function delActivoPlan($activo){
		$sql = "update activo_plan set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($activo),false,true);
	}

}
