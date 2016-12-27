<?php
require_once (PATH_MODELS . "/PracticaModel.php");
require_once (PATH_HELPERS. "/File.php");

class PracticaController {
	
	public function listar() {
		$model = new PracticaModel();
		$docente = 3; // Docente
		$datos = $model->getlistadoPractica($docente);
		$message = "";
		require_once PATH_VIEWS."/Practica/view.list.php";
	}
	
	public function editar(){
		$model = new PracticaModel();
		$docente = 3; // Docente
		$item = $model->getPractica();	
		$laboratorios = $model->getLaboratorios($docente);
		$maquinas =  array();
		if($item->laboratorio_id>0){
			$maquinas =  $model->getMaquinas($item->laboratorio_id);
		}
		$message = "";
		require_once PATH_VIEWS."/Practica/view.form.php";
	}
	
	public function guardar() {
		
		$practica ['id'] = $_POST ['id'];
		$practica ['nombre'] = $_POST ['nombre'];
		$practica ['fecha'] = $_POST ['fecha'];
		$practica ['hora_inicio'] = $_POST ['hora_inicio'];
		$practica ['hora_fin'] = $_POST ['hora_fin'];
		$practica ['tiempo_duracion'] = $_POST ['tiempo_duracion'];
		$practica ['lab_activo_id'] = $_POST ['lab_activo_id'];	
		$practica ['url'] = $this->uploadFile('lab','laboratorios');
		$practica ['usuario_id'] = 3; // Docente
		$model = new PracticaModel();
		try {
			$datos = $model->savePractica( $practica );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function eliminar() {
		$model = new PracticaModel();
		try {
			$datos = $model->delPractica();
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
	
	private function uploadFile($nombre,$carpeta){
		$upload = new File();
		return $upload->uploadFile($nombre,$carpeta);
	}
	public function downloadFile(){
		$nombre = $_GET['id'];
		$upload = new File();
		return $upload->download($nombre,'laboratorios');
	}
	
	public function verificar(){
		$hora_inicio = $_POST ['hora_inicio'];
		$hora_fin = $_POST ['hora_fin'];
		$activo = $_POST ['lab_activo_id'];
		$fecha = $_POST ['fecha'];
		$id = $_POST ['id'];
		$model = new PracticaModel();
		$labs = $model->getLabs($hora_inicio,$hora_fin,$fecha,$activo,$id);
		$labsCount = true;
		if($labs[0]->numero>0){
			$labsCount = false;
		}
		echo json_encode(array(
		    'valid' => $labsCount,
		));
	}
	
}
