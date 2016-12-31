<?php
require_once (PATH_MODELS . "/OrdenModel.php");


class OrdenController {
	
	public function listar() {
		$model = new OrdenModel();
		$tecnico = $_SESSION['SESSION_USER']->id;  
		$datos = $model->getlistadoOrdenes($tecnico);
		$message = "";
		require_once PATH_VIEWS."/Orden/view.list.php";
	}
	
	public function editar(){
		$model = new OrdenModel();		
		$item = $model->getOrden();		
		$laboratorios = $model->getlistadoLaboratorios($item->activo_fisico_id);
		$message = "";
		require_once PATH_VIEWS."/Orden/view.form.php";
	}

	
	public function guardar() {
		
		$orden ['id'] = $_POST ['id'];
		$orden ['observacion'] = $_POST ['observacion'];
		$orden ['tiempo_ejecucion'] = $_POST ['tiempo_ejecucion'];
		$orden ['fecha_atencion'] = date('Y-m-d');
		$orden ['tecnico_atiende'] = $_SESSION['SESSION_USER']->id; 
		
		$model = new OrdenModel();
		try {
			$datos = $model->saveOrden( $orden );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function ver(){
		$model = new OrdenModel();
		$item = $model->getOrdenAll();
		$message = "";
		require_once PATH_VIEWS."/Orden/view.ver.php";
	}
	
}
