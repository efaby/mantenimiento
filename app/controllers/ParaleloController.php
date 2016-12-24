<?php
require_once (PATH_MODELS . "/ParaleloModel.php");


class ParaleloController {
	
	public function listar() {
		$model = new ParaleloModel();
		$docente = 3; // Docente
		$datos = $model->getlistadoParalelo($docente);
		$message = "";
		require_once PATH_VIEWS."/Paralelo/view.list.php";
	}
	
	public function editar(){
		$model = new ParaleloModel();
		$docente = 3; // Docente
		$item = $model->getParalelo();	
		$laboratorios = $model->getLaboratorios($docente);
		$message = "";
		require_once PATH_VIEWS."/Paralelo/view.form.php";
	}
	
	public function guardar() {
		
		$paralelo ['id'] = $_POST ['id'];
		$paralelo ['nombre'] = $_POST ['nombre'];
		$paralelo ['fecha_inicio'] = $_POST ['fecha_inicio'];
		$paralelo ['fecha_fin'] = $_POST ['fecha_fin'];
		$paralelo ['lab_docente_id'] = $_POST ['lab_docente_id'];
		
		$model = new ParaleloModel();
		try {
			$datos = $model->saveParalelo( $paralelo );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function eliminar() {
		$model = new ParaleloModel();
		try {
			$datos = $model->delParalelo();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
}
