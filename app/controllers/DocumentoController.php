<?php
require_once (PATH_MODELS . "/DocumentoModel.php");
require_once (PATH_HELPERS. "/File.php");



class DocumentoController {
	
	public function listar() {
		$model = new DocumentoModel();
		$datos = $model->getlistadoActivos();
		$message = "";
		require_once PATH_VIEWS."/Documento/view.list.php";
	}
	
	public function downloadFile(){
		$nombre = $_GET['id'];
		$upload = new File();
		return $upload->download($nombre,'activos');
	}
	
	public function general(){
		$arrayId = $_GET['id'];
		print_r($arrayId);
		exit();
	}
	
}