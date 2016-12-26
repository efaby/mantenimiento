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
		$tecnicos = $model->getDocentes();		
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
		$lab_docente ['id'] = $_POST ['idLab'];	
		$lab_docente ['usuario_id'] = $_POST ['usuario_id'];
		$model = new LaboratorioModel();
		try {
			$datos = $model->saveLaboratorio( $laboratorio,$lab_docente );
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
	
	public function loadActivoFisico(){
		$opcion = $_POST ['opcion'];
		$model = new PracticaModel();
		$maquinas = $model->getMaquinas($opcion);
		$html ='<option value="" >Seleccione</option>';
		foreach ($maquinas as $dato) {
			$html .='<option value="'.$dato->id.'" >'.$dato->nombre.'</option>';
		}
		$html .='</select>';
		echo $html;
	}
	
	private function dataready($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	} 
	
}
