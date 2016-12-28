<?php
require_once (PATH_MODELS . "/NovedadModel.php");


class NovedadController {
	
	public function ingreso(){
		$model = new NovedadModel();		
		$laboratorios = $model->getLaboratorios();		
		$message = "";
		require_once PATH_VIEWS."/Novedad/view.ingreso.php";
	}
	
	public function guardar() {	
		
		$novedad ['problema'] = $_POST ['problema'];
		$novedad ['causa'] = $_POST ['causa'];
		$novedad ['solucion'] = $_POST ['solucion'];
		$novedad ['es_estudiante'] = 0;
		$novedad ['activo_fisico_id'] = $_POST ['activo_fisico_id'];
		$novedad ['usuario_registra'] = 2; // Tecnico
	
		$model = new NovedadModel();
		try {
			$datos = $model->saveNovedad( $novedad );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			//email
			
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../ingreso/" );
	}
	
	public function loadActivoFisico(){
		$opcion = $_POST ['opcion'];
		$model = new NovedadModel();
		$maquinas = $model->getMaquinas($opcion);
		$html ='<option value="" >Seleccione</option>';
		foreach ($maquinas as $dato) {
			$html .='<option value="'.$dato->id.'" >'.$dato->nombre.'</option>';
		}
		$html .='</select>';
		echo $html;
	}
	
	
	
	public function listar() {
		$model = new NovedadModel();	
		$usuario = 0; // Docente preguntar si es supervisor o tecnico pra lstar de acuerdo a ello
		$datos = $model->getlistadoNovedad($usuario);
		$message = "";
		require_once PATH_VIEWS."/Novedad/view.list.php";
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
		$novedad ['supervisor_id'] = 1; // supervisor
	
		$model = new NovedadModel();
		try {
			$datos = $model->saveNovedad( $novedad );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			//email
				
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
		$novedad ['tecnico_repara'] = 2; // tecnico repara
	
		$model = new NovedadModel();
		try {
			$datos = $model->saveNovedad( $novedad );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			//email
	
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function ver(){
		$model = new NovedadModel();
		$item = $model->getNovedad();
		require_once PATH_VIEWS."/Novedad/view.ver.php";
	}
}
