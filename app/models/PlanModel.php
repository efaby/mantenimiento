<?php
require_once(PATH_MODELS."/BaseModel.php");

class PlanModel {

	public function getlistadoPlan($usuario){
		$model = new BaseModel();	
		$sql = "select p.*, u.nombres, u.apellidos from plan_mantenimiento as p	
				inner join usuario as u on u.id = p.usuario_id
				where p.eliminado = 0 and p.usuario_id = ?";		
		return $model->execSql($sql, array($usuario),true);
	}	
	
	public function getPlan()
	{
		$plan = $_GET['id'];
		$model = new BaseModel();		
		if($plan > 0){
			$sql = "select p.* from plan_mantenimiento as p where p.eliminado = 0 and p.id = ?";
			$result = $model->execSql($sql, array($plan));				
		} else {
			$result = (object) array('id'=>0,'tarea'=>'','tiempo_ejecucion'=>'','estado_maquina'=>'', 'herramientas' =>'', 'equipo' =>'',  'materiales' =>'', 'procedimiento' =>'',  'observaciones' =>'', 'usuario_id' => 0);			
		}

		return $result;
	}
	
	
	public function savePlan($plan)
	{
		$model = new BaseModel();
		return $model->saveDatos($plan,'plan_mantenimiento');
	}
	
	public function delPlan(){
		$plan = $_GET['id'];
		$sql = "update plan_mantenimiento set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($plan),false,true);
	}

	public function getTecnicos(){
		$model = new BaseModel();
		$sql = "select u.id, u.nombres, u.apellidos from usuario as u where u.eliminado = 0 and u.tipo_usuario_id = 2";
		return $model->execSql($sql, array(),true);
	}
}
