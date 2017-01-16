<?php
require_once(PATH_MODELS."/BaseModel.php");

class OrdenModel {

	public function getlistadoOrdenes($tecnico){
		$model = new BaseModel();	
		$sql = "select op.*, a.nombre_activo as maquina, pm.tarea, ap.horas_operacion, f.nombre as frecuencia, ap.frecuencia_numero
				from orden_plan as op
				inner join activo_plan as ap on op.activo_plan_id = ap.id
				inner join plan_mantenimiento as pm on pm.id = ap.plan_mantenimiento_id
				inner join activo_fisico as a on a.id = ap.activo_fisico_id		
				inner join frecuencia as f on f.id = ap.frecuencia_id
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
		$sql = "select op.fecha_emision, op.activo_plan_id, op.id as orden_id, pq.nombre as parte, a.nombre_activo as maquina, l.nombre as laboratorio, f.nombre as frecuencia, pm.*, ap.horas_operacion, ap.activo_fisico_id, ap.frecuencia_numero 
				from orden_plan as op
				inner join activo_plan as ap on op.activo_plan_id = ap.id
				inner join plan_mantenimiento as pm on pm.id = ap.plan_mantenimiento_id
				inner join activo_fisico as a on a.id = ap.activo_fisico_id	
				inner join laboratorio as l on l.id = a.laboratorio_id
				inner join frecuencia as f on f.id = ap.frecuencia_id
				left join partes_maquina as pq on pq.id = ap.parte_maquina_id
				where op.id =  ?";
		return $model->execSql($sql, array($orden));				
	}	
	
	public function saveOrden($orden, $activo)
	{
		$model = new BaseModel();
		$model->saveDatos($orden,'orden_plan');
		$sql = "update activo_plan set fecha_inicio = '".date('Y-m-d')."', horas_operacion = 0 where id = ?";
		$result = $model->execSql($sql, array($activo),false,true);
		
	}
	
	public function getOrdenAll()
	{
		$orden = $_GET['id'];
		$model = new BaseModel();
		$sql = "select op.*, a.nombre_activo as maquina, pm.tarea, f.nombre as frecuencia, ap.horas_totales, ap.activo_fisico_id, ap.frecuencia_numero, l.nombre as laboratorio
				from orden_plan as op
				inner join activo_plan as ap on op.activo_plan_id = ap.id
				inner join plan_mantenimiento as pm on pm.id = ap.plan_mantenimiento_id
				inner join activo_fisico as a on a.id = ap.activo_fisico_id
				inner join laboratorio as l on l.id = a.laboratorio_id
				inner join frecuencia as f on f.id = ap.frecuencia_id
				where op.id =  ?";
		return $model->execSql($sql, array($orden));
	}
	
	public function getSupervisorById(){
		$model = new BaseModel();
		$sql = "select nombres, apellidos, email from usuario where tipo_usuario_id = 1 and eliminado = 0 ";
		return $model->execSql($sql, array());
	}
	
	public function getActivoById($id){
		$model = new BaseModel();
		$sql = "select nombre_activo as nombre from activo_fisico where id = ".$id;
		return $model->execSql($sql, array());
	}
}
