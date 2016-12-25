<?php
require_once(PATH_MODELS."/BaseModel.php");

class NovedadModel {

	public function getlistadoNovedad(){
		$model = new BaseModel();	
		$sql = "select n.*, a.nombre as maquina, l.nombre as laboratorio from novedad as n
				inner join activo_fisico as a on a.id =  n.activo_fisico_id
				inner join lab_activo as la on la.activo_fisico_id = a.id
				inner join laboratorio as l on l.id = la.laboratorio_id";	
		return $model->execSql($sql, array(),true);
	}	
	
	public function getParalelo()
	{
		$paralelo = $_GET['id'];
		$model = new BaseModel();		
		if($paralelo > 0){
			$sql = "select * from paralelo where eliminado = 0 and id = ?";
			$result = $model->execSql($sql, array($paralelo));				
		} else {
			$result = (object) array('id'=>0,'nombre'=>'','fecha_inicio'=>'','fecha_fin'=>'', 'lab_docente_id' =>0);			
		}
		
		return $result;
	}
	
	
	public function saveNovedad($novedad)
	{
		$model = new BaseModel();
		return $model->saveDatos($novedad,'novedad');
	}
	
	public function delParalelo(){
		$paralelo = $_GET['id'];
		$sql = "update paralelo set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($paralelo),false,true);
	}

	public function getLaboratorios(){
		$model = new BaseModel();	
		$sql = "select l.id, l.nombre from laboratorio as l";		
		return $model->execSql($sql, array(),true);
	}
	
	public function getMaquinas($laboratorio){
		$model = new BaseModel();
		$sql = "select a.id, a.nombre from activo_fisico as a
				inner join lab_activo as la on la.activo_fisico_id = a.id
				where la.laboratorio_id = ".$laboratorio;
		return $model->execSql($sql, array(),true);
	}
}
