<?php
require_once (PATH_MODELS . "/OrdenModel.php");
require_once (PATH_HELPERS . "/Email.php");


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
		//$laboratorios = $model->getlistadoLaboratorios($item->activo_fisico_id);
		$message = "";
		require_once PATH_VIEWS."/Orden/view.form.php";
	}

	
	public function guardar() {
		
		$orden ['id'] = $_POST ['id'];
		$orden ['observacion'] = $_POST ['observacion'];
		$orden ['tiempo_ejecucion'] = $_POST ['tiempo_ejecucion'];
		$orden ['fecha_atencion'] = date('Y-m-d');
		$orden ['tecnico_atiende'] = $_SESSION['SESSION_USER']->id; 
		$orden ['atendido'] = 1;
		
		$activo = $_POST ['activo_plan_id'];
		
		$model = new OrdenModel();
		try {
			$datos = $model->saveOrden( $orden, $activo );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			
			// envio email
			if(SENDEMAIL){
				$email = new Email();
				$supervisor = $model->getSupervisorById();
				$activo = $model->getActivoById($_POST ['activo_fisico_id']);				
				$email->sendNotificacionArreglo($supervisor->nombres ." ".$supervisor->apellidos, $supervisor->email, $activo->nombre ,"http://" . $_SERVER['HTTP_HOST'] . PATH_BASE,'Preventivo');
					
			}
				
			
			
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
