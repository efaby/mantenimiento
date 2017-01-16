<?php
require_once (PATH_MODELS . "/ReporteModel.php");
require_once (PATH_HELPERS . "/Email.php");


class ReporteController {
	
	public function preventivo() {
		$model = new ReporteModel(); 
		$datos = $model->getlistadoOrdenes();
		$message = "";
		require_once PATH_VIEWS."/Reporte/view.list.php";
	}
	
	public function ver(){
		$model = new ReporteModel();
		$item = $model->getOrdenAll();
		$message = "";
		require_once PATH_VIEWS."/Reporte/view.ver.php";
	}
	
	public function correctivo() {
		$model = new ReporteModel();		
		$datos = $model->getlistadoNovedad();
		$message = "";
		require_once PATH_VIEWS."/Reporte/view.correctivo.php";
	}
	
	public function verCorrectivo(){
		$model = new ReporteModel();
		$item = $model->getNovedad();
		require_once PATH_VIEWS."/Reporte/view.verCorrectivo.php";
	}
	
	
}
