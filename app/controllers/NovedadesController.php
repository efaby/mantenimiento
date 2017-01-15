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
		$maquinas = $model->getMaquinas();		
		$message = "";
		require_once PATH_VIEWS."/Novedad/view.ingreso.php";
	}
	
	public function guardar() {	
		
		$novedad ['problema'] = $_POST ['problema'];
		$novedad ['causa'] = $_POST ['causa'];
		$novedad ['solucion'] = $_POST ['solucion'];
		$novedad ['es_estudiante'] = 0;
		$novedad ['activo_fisico_id'] = $_POST ['activo_fisico_id'];
		$novedad ['usuario_registra'] = $_SESSION['SESSION_USER']->id; 
	
		$model = new NovedadModel();
		try {
			$datos = $model->saveNovedad( $novedad );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			// envio email
			if(SENDEMAIL){
				$email = new Email();
				$supervisor = $model->getSupervisorById();
				$activo = $model->getActivoById($_POST ['activo_fisico_id']);					
				$email->sendNotificacionRegistro($supervisor->nombres ." ".$supervisor->apellidos, $supervisor->email, $activo->nombre ,"http://" . $_SERVER['HTTP_HOST'] . PATH_BASE);
					
			}
			// registro Auditoria
			$log = new AuditoriaModel();
			$log->saveAuditoria($_SESSION['SESSION_USER']->nombres." ".$_SESSION['SESSION_USER']->apellidos, $_SESSION['SESSION_USER']->tipo_nombre,'Registro una Novedad "'.$_POST ['problema'].'"');
			
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../ingreso/" );
	}
	

	
	
	
	
	public function asignar(){
		$model = new NovedadModel();		
		$item = $model->getNovedad();	
		$tecnicos = $model->getTecnicos();		
		require_once PATH_VIEWS."/Novedad/view.formAsignar.php";
	}
	
	public function guardarAsignar() {
	
		$novedad ['id'] = $_POST ['id'];
		$novedad ['tecnico_asigna'] = $_POST ['usuario_id'];
		$novedad ['supervisor_id'] = $_SESSION['SESSION_USER']->id;
	
		$model = new NovedadModel();
		try {
			$datos = $model->saveNovedad( $novedad );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			//envio email
			if(SENDEMAIL){
				$datos = $model->getNovedadById($_POST ['id']);					
				$email = new Email();
				$email->sendNotificacionTecnico($datos->nombres .' '.$datos->apellidos, $datos->email, $datos->maquina, "http://" . $_SERVER['HTTP_HOST'] . PATH_BASE);
			}
			
				
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function reparar(){
		$model = new NovedadModel();
		$item = $model->getNovedad();			
		require_once PATH_VIEWS."/Novedad/view.formReparar.php";
	}
	
	public function guardarReparar() {

		$novedad ['id'] = $_POST ['id'];
		$novedad ['proceso'] = $_POST ['proceso'];
		$novedad ['elementos'] = $_POST ['elementos'];
		$novedad ['observaciones'] = $_POST ['observacion'];
		$novedad ['tecnico_repara'] = $_SESSION['SESSION_USER']->id; 
		if($_FILES['url']['name']!=''){
			$novedad ['url'] = $this->uploadFile('nov','novedades');
		}
		
	
		$model = new NovedadModel();
		try {
			$datos = $model->saveNovedad( $novedad );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
	
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	private function uploadFile($nombre,$carpeta){
		$upload = new File();
		return $upload->uploadFile($nombre,$carpeta);
	}
	
	public function downloadFile(){
		$nombre = $_GET['id'];
		$upload = new File();
		return $upload->download($nombre,'novedades');
	}
	
	public function ver(){
		$model = new NovedadModel();
		$item = $model->getNovedad();
		require_once PATH_VIEWS."/Novedad/view.ver.php";
	}
}
