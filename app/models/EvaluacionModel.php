<?php
require_once(PATH_MODELS."/BaseModel.php");

class EvaluacionModel {

	public function getlistadoPraticas($docente){
		$model = new BaseModel();	
		$sql = "select p.*, eva.duracion_practica, eva.nota_practica, u.nombres, u.apellidos, pa.nombre as paralelo, eva.id as evaluacion_id, a.nombre_activo
				from practica as p
				inner join evaluacion as eva on eva.practica_id = p.id
				inner join usuario as u on u.id =  eva.estudiante_id
				inner join paralelo as pa on pa.id = p.paralelo_id
				inner join activo_fisico as a on a.id = p.activo_id
				where p.eliminado = 0 and p.usuario_id = ".$docente;		
		return $model->execSql($sql, array(),true);
	}	
	
	public function getEvaluacion()
	{
		$evaluacion = $_GET['id'];
		$model = new BaseModel();		
		$sql = "select e.*, p.nombre as practica, pa.nombre as paralelo, u.nombres, u.apellidos, a.nombre_activo from evaluacion as e
				inner join usuario as u on u.id =  e.estudiante_id
				inner join practica as p on p.id = e.practica_id
				inner join paralelo as pa on pa.id = p.paralelo_id
				inner join activo_fisico as a on a.id = p.activo_id
				where e.id = ?";
		return $model->execSql($sql, array($evaluacion));				
		
	}
	
	
	public function saveEvaluacion($evaluacion)
	{
		$model = new BaseModel();
		return $model->saveDatos($evaluacion,'evaluacion');
	}
	
	
}
