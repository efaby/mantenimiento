<?php
require_once (PATH_MODELS . "/UsuarioModel.php");



class UsuarioController {
	
	public function listar() {
		$model = new UsuarioModel();
		$datos = $model->getlistadoUsuario();
		$message = "";
		require_once PATH_VIEWS."/Usuario/view.list.php";
	}
	
	public function editar(){
		$model = new UsuarioModel();
		$item = $model->getUsuario();	
		$where=	" where id <> 4";
		$tipos = $model->getCatalogo('tipo_usuario', $where);		
		$message = "";
		require_once PATH_VIEWS."/Usuario/view.form.php";
	}
	
	public function guardar() {		
		$usuario ['id'] = $_POST ['id'];
		$usuario ['tipo_usuario_id'] = $_POST ['tipo_usuario_id'];
		$usuario ['cedula'] = $_POST ['identificacion'];		
		$usuario ['nombres'] = $_POST ['nombres'];
		$usuario ['apellidos'] = $_POST ['apellidos'];
		$usuario ['password'] = $_POST ['password'];		
		$usuario ['email'] = $_POST ['email'];
		$usuario ['activo'] = 1;
		
		$model = new UsuarioModel();
		try {
			$datos = $model->saveUsuario( $usuario );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function eliminar() {
		$model = new UsuarioModel();
		try {
			$datos = $model->delUsuario();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function getUsuarioByIde() {
		$cedula = $_GET ['identificacion'];
		$model = new UsuarioModel();
		$persona = $model->getusuarioPorCedula($cedula);	
		echo json_encode ($persona);
	}
	
}
