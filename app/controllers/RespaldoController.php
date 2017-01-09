<?php
require_once (PATH_MODELS . "/BaseModel.php");

class RespaldoController {
	public function crear(){
		$model = new BaseModel();
		$model->backupDataBase();
	}
}
