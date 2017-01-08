<?php
require_once(PATH_MODELS."/BaseModel.php");

class AuditoriaModel {

	public function saveAuditoria( $user,$tipo, $detalle){
		$model = new BaseModel();	
		$auditoria ['usuario'] = $user;
		$auditoria ['detalle'] = $detalle;
		$auditoria ['fecha'] = date('Y-m-d');	
		$auditoria ['tipo_usuario'] = $tipo;
		$model->saveDatos($auditoria,'auditoria');			
	}	
	
	public function getlistadoAuditoria(){
		$model = new BaseModel();
		$sql = "select * from auditoria
				Order by fecha desc";
		return $model->execSql($sql, array(),true);
	}
	
}
