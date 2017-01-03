<?php
require_once (PATH_MODELS . "/ActivoModel.php");



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
	
	public function editarModal(){
		$model = new ActivoModel();
		$item = $model->getPartesMotor();
		$message = "";
		require_once PATH_VIEWS."/Activo/view.modal.php";
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
		$activo ['version'] = $_POST ['version'];
		$activo ['imagen_maquina_url'] = $_POST ['imagen_maquina_url'];
		$activo ['color'] = $_POST ['color'];
		$activo ['pais_origen'] = $_POST ['pais_origen'];
		$activo ['capacidad'] = $_POST ['capacidad'];
		$activo ['marca_maquina'] = $_POST ['marca_maquina'];		
		$activo ['modelo_maquina'] = $_POST ['modelo_maquina'];
		$activo ['serie'] = $_POST ['serie'];
		$activo ['caracteristicas'] = $_POST ['caracteristicas'];
		$activo ['marca_motor'] = $_POST ['marca_motor'];
		$activo ['tipo_he'] = $_POST ['tipo_he'];
		$activo ['num_fases'] = $_POST ['num_fases'];
		$activo ['rpm'] = $_POST ['rpm'];
		$activo ['voltaje'] = $_POST ['voltaje'];
		$activo ['hz'] = $_POST ['hz'];
		$activo ['amperios'] = $_POST ['amperios'];
		$activo ['kw'] = $_POST ['kw'];
		$activo ['tipo_motor_id'] = $_POST ['tipo_motor_id'];
		$activo ['funcion'] = $_POST ['funcion'];
		$activo ['nomenclatura'] = $_POST ['nomenclatura'];
		
		$model = new ActivoModel();
		try {
			$datos = $model->saveEstudiante( $usuario,$estudiante,$matricula);			
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function guardarModal() {
		$activo ['denominacion'] = $_POST ['nombre'];
		$activo ['url'] = $_POST ['url'];
		
		$this->uploadFile('pra','laboratorios');
		
		$model = new ActivoModel();
		try {
			$datos = $model->savePartesActivo($activo);
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../editar/" );
	}
	
	
	public function eliminar() {
		$model = new EstudianteModel();
		try {
			$datos = $model->delEstudiante();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function getEstudianteByIde() {
		$cedula = $_GET ['identificacion'];		
		$model = new EstudianteModel();
		$persona = $model->getEstudiantePorCedula($cedula);
		echo json_encode ($persona);
	}
	
	public function getExistEstudiante() {
		$cedula = $_GET ['identificacion'];
		$paralelo_id = $_GET ['paralelo_id'];
		$model = new EstudianteModel();
		$persona = $model->getExistEstudiante($cedula, $paralelo_id);
		echo json_encode ($persona);
	}
}