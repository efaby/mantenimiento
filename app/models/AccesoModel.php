<?php
require_once(PATH_MODELS."/BaseModel.php");

class AccesoModel {

	public function getlistadoAcceso($docente){
		$model = new BaseModel();	
		$sql = "SELECT * FROM acceso where eliminado=0";		
		return $model->execSql($sql, array(),true);
	}
	
	public function getAcceso()
	{
		$acceso = $_GET['id'];
		$model = new BaseModel();
		if($acceso > 0){
			$sql = "SELECT * FROM acceso where eliminado=0
					and id = ?";
			$result = $model->execSql($sql, array($acceso));
			
		} else {
			$result = (object) array('id'=>0,'rol_id'=>'','accion'=>'', 'icono'=>'','titulo' =>'','orden'=>'','menu'=>'');
		}
	
		return $result;
	}
	
	public function getListMenu(){
		$menu = new \stdClass();
		$menu->id='0';
		$menu->nombre='Nivel Padre';
		$listMenu[]=$menu;
		$menu = new \stdClass();
		$menu->id='1';
		$menu->nombre='Nivel Raíz';
		$listMenu[]=$menu;
		$menu = new \stdClass();
		$menu->id='2';
		$menu->nombre='Nivel Final Padre';
		$listMenu[]=$menu;
		return $listMenu;
	}
	public function saveAcceso($acceso)
	{
		$model = new BaseModel();
		return $model->saveDatos($acceso,'acceso');
	}
	
	public function delAcceso(){
		$acceso = $_GET['id'];
		$sql = "update acceso set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($acceso),false,true);
	}
}