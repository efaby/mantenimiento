<?php
require_once(PATH_MODELS."/BaseModel.php");

class DocumentoModel {
	
	public function getlistadoActivos(){		
		$model = new BaseModel();	
		$sql="SELECT a.id, a.ficha,a.codigo, a.inventario,a.nombre_activo, a.manual_fabricante, l.nombre as laboratorio, l.id as laboratorio_id, a.diagram_proceso_url
			  FROM activo_fisico a
				inner join laboratorio as l on l.id = a.laboratorio_id
			  WHERE a.eliminado =0";
		return $model->execSql($sql, array(),true);
	}
	
	public function getDatosLaboratorio($activo){
		$model = new BaseModel();
		$sql ="SELECT * FROM laboratorio as l
			   INNER JOIN activo_fisico as a ON a.laboratorio_id=l.id
			   WHERE a.id=? and a.eliminado=0";
		$result = $model->execSql($sql, array($activo),true);
		return $result;
	}
	
	public function getMotor(){
		$model = new BaseModel();
		$sql = "SELECT * FROM tipo_motor";
		return $model->execSql($sql, array(),true);
	}
	
	public function getPartesMotor($activo){
		$model = new BaseModel();
		$sql = "select * from partes_maquina where activo_id = ?";
		return $model->execSql($sql, array($activo),true);
	}
	
	public function getActivoById($activo){
		$model = new BaseModel();
		$sql = "select nombre_activo, codigo from activo_fisico where id=?";
		return $model->execSql($sql, array($activo),true);
	}
	
	public function getPartesMaqByAct($activo){
		$model = new BaseModel();
		$sql = "select distinct(pm.id), pm.nombre
				from partes_maquina as pm
				inner join activo_plan ap on ap.parte_maquina_id=pm.id
				where activo_fisico_id =?";
		$partes = $model->execSql($sql, array($activo),true);
		foreach ($partes as $parte){
			$sql = "select plm.id, tarea,  concat(frecuencia_numero,' ' ,f.nombre) as frecuencia
					from plan_mantenimiento as plm
					inner join activo_plan apl on plm.id=apl.plan_mantenimiento_id
					inner join frecuencia f on f.id = apl.frecuencia_id
					where parte_maquina_id =?";
			$parte->planes = $model->execSql($sql, array($parte->id),true);			
		}
		return $partes;	
	}
	
	public function getLaboratoriosId($labId){
		$model = new BaseModel();
		$sql = "SELECT af.codigo, nombre_activo,l.id,l.nombre as nombre_lab
				FROM activo_fisico as af 
				INNER JOIN laboratorio as l ON l.id = af.laboratorio_id
				WHERE af.laboratorio_id =? and af.eliminado=0";
		return $model->execSql($sql, array($labId),true);
	}
	
	public function getPlanById($plan){
		$model = new BaseModel();
		$sql = "select  pq.nombre as parte, a.nombre_activo as maquina, l.nombre as laboratorio, f.nombre as frecuencia, pm.*, ap.horas_operacion, ap.activo_fisico_id, ap.frecuencia_numero 
				from  activo_plan as ap 
        		inner join plan_mantenimiento as pm on pm.id = ap.plan_mantenimiento_id
				inner join activo_fisico as a on a.id = ap.activo_fisico_id	
				inner join laboratorio as l on l.id = a.laboratorio_id
				inner join frecuencia as f on f.id = ap.frecuencia_id
				left join partes_maquina as pq on pq.id = ap.parte_maquina_id
                where pm.id=?";
		return $model->execSql($sql, array($plan),true);
	}
	
	public function getCatalogo($tabla,$where=null){
		$model = new BaseModel();
		return $model->getCatalogo($tabla,$where);
	}	
	
	public function  getLaboratorios(){
		$model = new BaseModel();
		$sql = "SELECT * FROM mantenimiento.laboratorio where eliminado=0";
		return $model->execSql($sql, array(),true);
	}
}