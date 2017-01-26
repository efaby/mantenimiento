<?php
require_once (PATH_MODELS . "/AccesoModel.php");


class AccesoController {
	
	public function listar() {
		$model = new AccesoModel();
		$acceso = $_SESSION['SESSION_USER']->id; 
		$datos = $model->getlistadoAcceso($acceso);		
		$message = "";
		require_once PATH_VIEWS."/Acceso/view.list.php";
	}
	
	public function editar(){
		$model = new AccesoModel();
		$item = $model->getAcceso();
		$listMenu = $model->getListMenu();
		$message = "";
		require_once PATH_VIEWS."/Acceso/view.form.php";
	}
	
	public function guardar() {
		$acceso ['id'] = $_POST ['id'];
		$acceso ['rol_id'] = $_POST ['rol_id'];
		$acceso ['accion'] = $_POST ['accion'];
		$acceso ['icono'] = $_POST ['icono'];
		$acceso ['titulo'] = $_POST ['titulo'];
		$acceso ['orden'] = $_POST ['orden'];
		$acceso ['menu'] = $_POST ['menu'];
	
		$model = new AccesoModel();
		try {
			$datos = $model->saveAcceso($acceso);
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	
	public function eliminar() {
		$model = new AccesoModel();
		try {
			$datos = $model->delAcceso();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
}