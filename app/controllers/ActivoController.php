<?php
require_once (PATH_MODELS . "/ActivoModel.php");
require_once (PATH_HELPERS. "/File.php");



class ActivoController {
	
	public function listar() {
		$model = new ActivoModel();
		$datos = $model->getlistadoActivos();
		$message = "";
		require_once PATH_VIEWS."/Activo/view.list.php";
	}
	
	public function editar(){
		$model = new ActivoModel();
		$item = $model->getActivo();
		$tipo_motor = $model->getMotor();
		$laboratorios = $model->getLaboratorios();
		$message = "";
		require_once PATH_VIEWS."/Activo/view.form.php";
	}
	
	public function guardar() {		
		$activo ['id'] = $_POST ['id'];
		$activo ['nombre_activo'] = $_POST ['nombre_activo'];
		$activo ['alias'] = $_POST ['alias'];
		$activo ['ficha'] = $_POST ['ficha'];
		$activo ['codigo'] = $_POST ['codigo'];
		$activo ['inventario'] = $_POST ['inventario'];
		$activo ['manual_fabricante'] = $_POST ['manual_fabricante'];
		$activo ['seccion'] = $_POST ['seccion'];
		if((isset($_FILES['imagen_maquina_url']) && $_FILES['imagen_maquina_url']['name']!='') || (isset($_FILES['imagen_maquina_url1']) && $_FILES['imagen_maquina_url1']['name']!='')){
			$activo ['imagen_maquina_url'] = $this->uploadFile('act','activos',$_FILES['imagen_maquina_url'],$_POST['filename'],$_POST['imagen_maquina_url1']);
		}
		$activo ['marca_maquina'] = $_POST ['marca_maquina'];
		$activo ['modelo_maquina'] = $_POST ['modelo_maquina'];
		$activo ['serie_maquina'] = $_POST ['serie_maquina'];
		$activo ['color'] = $_POST ['color'];
		$activo ['pais_origen'] = $_POST ['pais_origen'];
		$activo ['capacidad'] = $_POST ['capacidad'];
		$activo ['caracteristicas'] = $_POST ['caracteristicas'];
		$activo ['marca_motor'] = $_POST ['marca_motor'];
		$activo ['tipo_he'] = $_POST ['tipo_he'];
		$activo ['num_fases'] = $_POST ['num_fases'];
		$activo ['rpm'] = $_POST ['rpm'];
		$activo ['voltaje_motor'] = $_POST ['voltaje_motor'];
		$activo ['hz'] = $_POST ['hz'];
		$activo ['amperios_motor'] = $_POST ['amperios_motor'];
		$activo ['kw'] = $_POST ['kw'];
		$activo ['tipo_motor_id'] = $_POST ['tipo_motor_id'];
		$activo ['funcion'] = $_POST ['funcion'];
		if((isset($_FILES['nomenglatura_url']) && $_FILES['nomenglatura_url']['name']!='')||(isset($_FILES['nomenglatura_url1']) && $_FILES['nomenglatura_url1']['name']!='')){
			$activo ['nomenglatura_url'] = $this->uploadFile('act','activos',$_FILES['nomenglatura_url'], $_POST['filename1'],$_POST['nomenglatura_url1']);
		}
		if((isset($_FILES['diagram_proceso_url']) && $_FILES['diagram_proceso_url']['name']!='')||(isset($_FILES['diagram_proceso_url1']) && $_FILES['diagram_proceso_url1']['name']!='')){
			$activo ['diagram_proceso_url'] = $this->uploadFile('act','activos',$_FILES['diagram_proceso_url'], $_POST['filename2'],$_POST['diagram_proceso_url1']);
		}
		$laboratorios  = $_POST ['laboratorio_id'];
		
		$model = new ActivoModel();
		try {
			$datos = $model->saveActivo($activo, $laboratorios);			
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	private function uploadFile($nombre,$carpeta, $url, $filename, $url1){
		$upload = new File();
		return $upload->uploadFileGeneric($nombre,$carpeta, $url,$filename, $url1);
	}
	
	public function downloadFile(){
		$nombre = $_GET['id'];
		$upload = new File();
		return $upload->download($nombre,'activos');
	}
	
	public function eliminar() {
		$model = new ActivoModel();
		try {
			$datos = $model->delActivo();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function ver(){
		$model = new ActivoModel();
		$laboratorios = $model->getLaboratoriosActivoVer();
		require_once PATH_VIEWS."/Activo/view.ver.php";
	}
	
}