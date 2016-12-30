<?php
require_once(PATH_MODELS."/BaseModel.php");

class OrdenModel {

	public function getlistadoOrdenes($tecnico){
		$model = new BaseModel();	
		$sql = "select op.*, a.nombre as maquina, pm.tarea, ap.horas_operacion, ap.frecuencia_horas
				from orden_plan as op
				inner join activo_plan as ap on op.activo_plan_id = ap.id
				inner join plan_mantenimiento as pm on pm.id = ap.plan_mantenimiento_id
				inner join activo_fisico as a on a.id = ap.activo_fisico_id				
				where op.tecnico_asignado = ".$tecnico;		
		return $model->execSql($sql, array(),true);
	}	
	
	public function getlistadoLaboratorios($id){
		$model = new BaseModel();
		$sql = "select l.nombre 
				from laboratorio as l
				inner join lab_activo as la on la.laboratorio_id = l.id				
				where la.activo_fisico_id = ".$id;
		return $model->execSql($sql, array(),true);
	}
	
	public function getOrden()
	{
		$orden = $_GET['id'];
		$model = new BaseModel();		
		$sql = "select op.fecha_emision, op.id as orden_id, a.nombre as maquina, pm.*, ap.horas_operacion, ap.activo_fisico_id, ap.frecuencia_horas
				from orden_plan as op
				inner join activo_plan as ap on op.activo_plan_id = ap.id
				inner join plan_mantenimiento as pm on pm.id = ap.plan_mantenimiento_id
				inner join activo_fisico as a on a.id = ap.activo_fisico_id				
				where op.id =  ?";
		return $model->execSql($sql, array($orden));				
	}	
	
	public function saveOrden($orden)
	{
		$model = new BaseModel();
		return $model->saveDatos($orden,'orden_plan');
	}
	
	public function getOrdenAll()
	{
		$orden = $_GET['id'];
		$model = new BaseModel();
		$sql = "select op.*, a.nombre as maquina, pm.tarea, ap.horas_operacion, ap.activo_fisico_id, ap.frecuencia_horas
				from orden_plan as op
				inner join activo_plan as ap on op.activo_plan_id = ap.id
				inner join plan_mantenimiento as pm on pm.id = ap.plan_mantenimiento_id
				inner join activo_fisico as a on a.id = ap.activo_fisico_id
				where op.id =  ?";
		return $model->execSql($sql, array($orden));
	}
	
}
