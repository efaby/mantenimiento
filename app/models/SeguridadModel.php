<?php
require_once(PATH_MODELS."/BaseModel.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class SeguridadModel {

	public function validarUsuario($login, $password,$tipo){
		$model = new BaseModel();
		$sql = "select u.id, u.nombres, u.apellidos, u.tipo_usuario_id as tipo, t.nombre as tipo_nombre
				from usuario as u
				inner join tipo_usuario as t on t.id = u.tipo_usuario_id
				where u.cedula= '".$login."' and u.password = '".md5($password)."' and u.eliminado = 0 and u.tipo_usuario_id = ".$tipo;
	
		return $model->execSql($sql, array($login,$password));
	}
	
	public function cambiarContrasena($passwd,$user){
		$sql = "update usuario set password = md5('".$passwd."') where id = ".$user;
		$model =  new BaseModel();
		return $model->execSql($sql, array($passwd,$user),false,true);
	}
	
	public function getTipos(){
		$model = new BaseModel();
		return $model->getCatalogo('tipo_usuario');
	}
	
	public function getAcceso($id){
		$model = new BaseModel();
		$sql = "select * from acceso where rol_id = ".$id." order by orden";
		return $model->execSql($sql,array(),true);
	}
	
}
