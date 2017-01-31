<?php
require_once (PATH_MODELS . "/AuditoriaModel.php");


class AuditoriaController {
	
	public function listar() {
		$model = new AuditoriaModel();		
		$datos = $model->getlistadoAuditoria();
		$message = "";
		require_once PATH_VIEWS."/Auditoria/view.list.php";
	}
	
	
}
