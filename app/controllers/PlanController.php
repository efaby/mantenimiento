<?php
require_once (PATH_MODELS . "/PlanModel.php");


class PlanController {
	
	public function listar() {
		$model = new PlanModel();
		$datos = $model->getlistadoPlan($_SESSION['SESSION_USER']->id);
		$message = "";
		require_once PATH_VIEWS."/Plan/view.list.php";
	}
	
	public function editar(){
		$model = new PlanModel();		
		$item = $model->getPlan();	
		$tecnicos = $model->getTecnicos();		
		require_once PATH_VIEWS."/Plan/view.form.php";
	}
	
	public function guardar() {

		$plan ['id'] = $_POST ['id'];
		$plan ['tarea'] = $_POST ['tarea'];
		$plan ['tiempo_ejecucion'] = $_POST ['tiempo_ejecucion'];
		$plan ['estado_maquina'] = $_POST ['estado_maquina'];
		$plan ['herramientas'] = $_POST ['herramientas'];
		$plan ['materiales'] = $_POST ['materiales'];	
		$plan ['equipo'] = $_POST ['equipo'];
		$plan ['procedimiento'] = $this->dataready($_POST ['procedimiento']);
		$plan ['observaciones'] = $this->dataready($_POST ['observaciones']);
		$plan ['usuario_id'] = $_SESSION['SESSION_USER']->id;
		
		
		$model = new PlanModel();
		try {
			$datos = $model->savePlan( $plan );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function eliminar() {
		$model = new PlanModel();
		try {
			$datos = $model->delPlan();
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
	
}
