<?php
require_once(PATH_MODELS."/BaseModel.php");

class ParaleloModel {

	public function getlistadoParalelo($docente){
		$model = new BaseModel();	
		$sql = "select p.*, l.nombre as laboratorio from paralelo as p
				inner join lab_docente as ld on ld.id = p.lab_docente_id
				inner join laboratorio as l on l.id = ld.laboratorio_id 
				where p.eliminado = 0 and ld.usuario_id = ".$docente;		
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
	
	
	public function saveParalelo($paralelo)
	{
		$model = new BaseModel();
		return $model->saveDatos($paralelo,'paralelo');
	}
	
	public function delParalelo(){
		$paralelo = $_GET['id'];
		$sql = "update paralelo set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($paralelo),false,true);
	}

	public function getLaboratorios($docente){
		$model = new BaseModel();	
		$sql = "select ld.id, l.nombre from laboratorio as l
				inner join lab_docente as ld on l.id = ld.laboratorio_id				
				where ld.usuario_id = ".$docente;		
		return $model->execSql($sql, array(),true);
	}
}
