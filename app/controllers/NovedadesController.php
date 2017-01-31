<?php
require_once (PATH_MODELS . "/NovedadesModel.php");

class NovedadesController {
	
	public function listar() {
		$model = new NovedadesModel();
		$datos = $model->getlistadoNovedades();
		$message = "";
		require_once PATH_VIEWS."/Novedades/view.list.php";
	}
	
	/////////////////////////
	
	public function ingreso(){
		$model = new NovedadesModel();			
		$message = "";
		require_once PATH_VIEWS."/Novedades/view.ingreso.php";
	}
	
	public function guardar() {	
		
		$novedad ['descripcion'] = $_POST ['descripcion'];	
		$novedad ['fecha'] = date('Y-m-d');
		$novedad ['usuario_id'] = $_SESSION['SESSION_USER']->id;
	
		$model = new NovedadesModel();
		try {
			$datos = $model->saveNovedades( $novedad );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../ingreso/" );
	}
	
	public function ver(){
		$model = new NovedadModel();
		$item = $model->getNovedad();
		require_once PATH_VIEWS."/Novedad/view.ver.php";
	}
}
