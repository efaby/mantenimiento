<?php
require_once(PATH_MODELS."/BaseModel.php");

class LaboratorioModel {

	public function getlistadoLaboratorios(){
		$model = new BaseModel();	
		$sql = "select l.*, u.nombres, u.apellidos from laboratorio as l
				inner join lab_docente as ld on ld.laboratorio_id = l.id
				inner join usuario as u on u.id = ld.usuario_id 
				where l.eliminado = 0 ";		
		return $model->execSql($sql, array(),true);
	}	
	
	public function getLaboratorio()
	{
		$laboratorio = $_GET['id'];
		$model = new BaseModel();		
		if($laboratorio > 0){
			$sql = "select l.* , ld.usuario_id, ld.id as idLab from laboratorio as l
					inner join lab_docente as ld on ld.laboratorio_id = l.id
					where eliminado = 0 and l.id = ?";
			$result = $model->execSql($sql, array($laboratorio));				
		} else {
			$result = (object) array('id'=>0,'nombre'=>'','codigo'=>'','introduccion'=>'','objetivos'=>'','generalidades'=>'','seguridad'=>'', 'usuario_id' =>0,'idLab'=> 0);			
		}
		
		return $result;
	}
	
	
	public function saveLaboratorio($laboratorio,$lab_docente)
	{
		$model = new BaseModel();
		
		$lab_docente ['laboratorio_id'] = $model->saveDatos($laboratorio,'laboratorio');
		if($laboratorio['id'] > 0){
			$lab_docente ['laboratorio_id'] = $laboratorio['id'];
			
		} 
		
		return $model->saveDatos($lab_docente, 'lab_docente');
	}
	
	public function delLaboratorio(){
		$laboratorio = $_GET['id'];
		$sql = "update laboratorio set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($laboratorio),false,true);
	}


	
	public function getDocentes(){
		$model = new BaseModel();
		$sql = "select u.id, u.nombres, u.apellidos from usuario as u where u.tipo_usuario_id = 3";
		return $model->execSql($sql, array(),true);
	}
}
