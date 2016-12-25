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
		$datos = $model->getlistadoNovedad();
		$message = "";
		require_once PATH_VIEWS."/Novedad/view.list.php";
	}
	
	public function editar(){
		$model = new NovedadModel();
		$docente = 3; // Docente
		$item = $model->getNovedad();			
		$message = "";
		require_once PATH_VIEWS."/Novedad/view.form.php";
	}
	
	
	
	public function eliminar() {
		$model = new ParaleloModel();
		try {
			$datos = $model->delParalelo();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
}
