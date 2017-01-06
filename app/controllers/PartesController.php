<?php
require_once (PATH_MODELS . "/PartesModel.php");
require_once (PATH_HELPERS. "/File.php");


class PartesController {
	
	public function listar() {
		$model = new PartesModel();
		$datos = $model->getlistadoPartes();
		$activo = $model->getActivoName();
		$message = "";
		require_once PATH_VIEWS."/Partes/view.list.php";
	}
	
	public function editar(){
		$model = new PartesModel();
		$arrayId = explode('-', $_GET['id']);	
		$item = $model->getParte($arrayId[1]);	
		$activo_id = $arrayId[0];
		$message = "";
		require_once PATH_VIEWS."/Partes/view.form.php";
	}
	
	public function guardar() {
		
		$partes ['id'] = $_POST ['id'];
		if(($_FILES['url']['name']!='')||($_FILES['url1']['name']!='')){
			$partes ['url'] = $this->uploadFile('par','partes');
		}
		$partes ['activo_id'] = $_POST ['activo_fisico_id'];
		$partes ['nombre'] = $_POST ['nombre'];	
		
		$model = new PartesModel();
		try {
			$datos = $model->savePartes( $partes );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/".$_POST ['activo_fisico_id'] );
	}
	
	public function eliminar() {
		$arrayId = explode('-', $_GET['id']);
		$model = new PartesModel();
		try {
			$datos = $model->delPartes($arrayId[1]);
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/".$arrayId[0] );
	}
	
	private function uploadFile($nombre,$carpeta){
		$upload = new File();
		return $upload->uploadFile($nombre,$carpeta);
	}
	
	public function downloadFile(){
		$nombre = $_GET['id'];
		$upload = new File();
		return $upload->download($nombre,'partes');
	}
}
