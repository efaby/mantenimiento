<?php
require_once(PATH_MODELS."/BaseModel.php");

class ReporteModel {

	public function getlistadoOrdenes(){
		$model = new BaseModel();	
		$sql = "select op.*, a.nombre_activo as maquina, pm.tarea, ap.horas_operacion, f.nombre as frecuencia, ap.frecuencia_numero, u.nombres, u.apellidos, ap.horas_totales, l.nombre as laboratorio
				from orden_plan as op
				inner join activo_plan as ap on op.activo_plan_id = ap.id
				inner join plan_mantenimiento as pm on pm.id = ap.plan_mantenimiento_id
				inner join activo_fisico as a on a.id = ap.activo_fisico_id		
				inner join frecuencia as f on f.id = ap.frecuencia_id
				inner join usuario as u on u.id = op.tecnico_asignado
				inner join laboratorio as l on l.id = a.laboratorio_id ";
						
		return $model->execSql($sql, array(),true);
	}	
	
	public function getOrdenAll()
	{
		$orden = $_GET['id'];
		$model = new BaseModel();
		$sql = "select op.*, a.nombre_activo as maquina, pm.tarea, f.nombre as frecuencia, ap.horas_totales, ap.horas_operacion, ap.activo_fisico_id, ap.frecuencia_numero, l.nombre as laboratorio,u.nombres, u.apellidos
				from orden_plan as op
				inner join activo_plan as ap on op.activo_plan_id = ap.id
				inner join plan_mantenimiento as pm on pm.id = ap.plan_mantenimiento_id
				inner join activo_fisico as a on a.id = ap.activo_fisico_id
				inner join laboratorio as l on l.id = a.laboratorio_id
				inner join frecuencia as f on f.id = ap.frecuencia_id
				inner join usuario as u on u.id = op.tecnico_asignado
				where op.id =  ?";
		return $model->execSql($sql, array($orden));
	}
	
	
	public function getlistadoNovedad(){
		$model = new BaseModel();
		$sql = "select n.*, a.nombre_activo as maquina, u.nombres, u.apellidos, l.nombre as laboratorio from novedad as n
				inner join activo_fisico as a on a.id =  n.activo_fisico_id				
				inner join usuario as u on u.id = n.tecnico_asigna
				inner join laboratorio as l on l.id = a.laboratorio_id
				";
	
		return $model->execSql($sql, array(),true);
	}
	
	
	public function getNovedad()
	{
		$novedad = $_GET['id'];
		$model = new BaseModel();
		$sql = "select n.*, a.nombre_activo as maquina, u.nombres  as nombre_tecnico1, u.apellidos as apellido_tecnico1, l.nombre as laboratorio, u1.nombres  as nombre_tecnico2, u1.apellidos as apellido_tecnico2
				from novedad as n
				inner join activo_fisico as a on a.id =  n.activo_fisico_id	
				left join usuario as u on u.id = n.tecnico_asigna
				left join usuario as u1 on u1.id = n.tecnico_repara
				inner join laboratorio as l on l.id = a.laboratorio_id
				where n.id = ?";
	
		return $model->execSql($sql, array($novedad));
	
	}
	
	
}
