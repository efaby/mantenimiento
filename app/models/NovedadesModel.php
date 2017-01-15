<?php
require_once(PATH_MODELS."/BaseModel.php");

class NovedadesModel {

	public function getlistadoNovedades(){
		$model = new BaseModel();	
		$sql = "select n.*, u.nombres, u.apellidos from novedades as n
				inner join usuario as u on u.id = n.usuario_id";
		return $model->execSql($sql, array(),true);
	}	
	
	public function saveNovedades($novedad)
	{
		$model = new BaseModel();
		return $model->saveDatos($novedad,'novedades');
	}
	
	
	/////////////////////////////////
	
}
