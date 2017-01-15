<?php
require_once (PATH_MODELS . "/LaboratorioModel.php");


class LaboratorioController {
	
	public function listar() {
		$model = new LaboratorioModel();
		$datos = $model->getlistadoLaboratorios();
		$message = "";
		require_once PATH_VIEWS."/Laboratorio/view.list.php";
	}
	
	public function editar(){
		$model = new LaboratorioModel();
		$item = $model->getLaboratorio();	
		$docentes = $model->getDocentes();
		$tecnicos = $model->getTecnicos();
		$message = "";
		require_once PATH_VIEWS."/Laboratorio/view.form.php";
	}
	
	public function guardar() {

		$laboratorio ['id'] = $_POST ['id'];
		$laboratorio ['nombre'] = $_POST ['nombre'];
		$laboratorio ['codigo'] = $_POST ['codigo'];
		$laboratorio ['introduccion'] = $this->dataready($_POST ['introduccion']);
		$laboratorio ['objetivos'] = $this->dataready($_POST ['objetivos']);
		$laboratorio ['generalidades'] = $this->dataready($_POST ['generalidades']);
		$laboratorio ['seguridad'] = $this->dataready($_POST ['seguridad']);
		$laboratorio ['usuario_id'] = $_POST ['usuario_id'];
		
		$idLab = $_POST ['idLab'];	
		$docentes = $_POST ['docente_id'];		
		
		$model = new LaboratorioModel();
		try {
			$datos = $model->saveLaboratorio( $laboratorio,$idLab, $docentes );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function eliminar() {
		$model = new LaboratorioModel();
		try {
			$datos = $model->delLaboratorio();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	private function dataready($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	} 
	
	public function ver(){
		$model = new LaboratorioModel();
		$docentes = $model->getDocentesActivo();
		require_once PATH_VIEWS."/Laboratorio/view.ver.php";
	}
	
}
