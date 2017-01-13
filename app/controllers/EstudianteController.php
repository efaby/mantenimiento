<?php
require_once (PATH_MODELS . "/EstudianteModel.php");
require_once (PATH_MODELS . "/ParaleloModel.php");



class EstudianteController {
	
	public function listar() {
		$model = new EstudianteModel();
		$docente = $_SESSION['SESSION_USER']->id;
		$datos = $model->getlistadoEstudiante($docente);
		$message = "";
		require_once PATH_VIEWS."/Estudiante/view.list.php";
	}
	
	public function editar(){
		$model = new EstudianteModel();
		$item = $model->getEstudiante();		
		$docente = $_SESSION['SESSION_USER']->id; // Docente		
		$paralelos = $model->getParalelo($docente);		
		$message = "";
		require_once PATH_VIEWS."/Estudiante/view.form.php";
	}
	
	public function guardar() {		
		$usuario ['id'] = $_POST ['id'];
		$usuario ['cedula'] = $_POST ['identificacion'];		
		$usuario ['nombres'] = $_POST ['nombres'];
		$usuario ['apellidos'] = $_POST ['apellidos'];
		$usuario ['password'] = $_POST ['identificacion'];
		$usuario ['email'] = $_POST ['email'];		
		$usuario ['tipo_usuario_id'] = 4;
		$estudiante['codigo']=$_POST['codigo'];		
		$matricula['paralelo_id']=$_POST['paralelo_id'];			
		$model = new EstudianteModel();
		try {
			$datos = $model->saveEstudiante( $usuario,$estudiante,$matricula);			
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
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