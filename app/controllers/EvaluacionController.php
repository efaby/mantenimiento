<?php
require_once (PATH_MODELS . "/EvaluacionModel.php");
require_once (PATH_HELPERS. "/File.php");

class EvaluacionController {
	
	public function listar() {
		$model = new EvaluacionModel();
		$docente = 3; // Docente
		$datos = $model->getlistadoPraticas($docente);
		$message = "";
		require_once PATH_VIEWS."/Evaluacion/view.list.php";
	}
	
	public function editar(){
		$model = new EvaluacionModel();
		$docente = 3; // Docente
		$item = $model->getEvaluacion();		
		$message = "";
		require_once PATH_VIEWS."/Evaluacion/view.form.php";
	}
	
	public function downloadFile(){
		$nombre = $_GET['id'];
		$upload = new File();
		return $upload->download($nombre,'practicas');
	}
	
	
	public function guardar() {
		
		$evaluacion ['id'] = $_POST ['id'];
		$evaluacion ['nota_practica'] = $_POST ['nota_practica'];
		$evaluacion ['observaciones'] = $_POST ['observaciones'];
		$evaluacion ['fecha_calificacion'] = date('Y-m-d');
		$evaluacion ['profesor_id'] = 3; // Docente
		
		$model = new EvaluacionModel();
		try {
			$datos = $model->saveEvaluacion( $evaluacion );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	
}
