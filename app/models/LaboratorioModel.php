<?php
require_once(PATH_MODELS."/BaseModel.php");

class LaboratorioModel {

	public function getlistadoLaboratorios(){
		$model = new BaseModel();	
		$sql = "select l.* from laboratorio as l
				
				where l.eliminado = 0 ";		
		return $model->execSql($sql, array(),true);
	}	
	
	public function getLaboratorio()
	{
		$laboratorio = $_GET['id'];
		$model = new BaseModel();		
		if($laboratorio > 0){
			$sql = "select l.* from laboratorio as l					
					where eliminado = 0 and l.id = ?";
			$result = $model->execSql($sql, array($laboratorio));	
			$result->docentes = $this->getDocentesById($laboratorio,true);
			
		} else {
			$result = (object) array('id'=>0,'nombre'=>'','codigo'=>'','introduccion'=>'','objetivos'=>'','generalidades'=>'','seguridad'=>'', 'usuario_id' =>0,'idLab'=> 0, 'docentes'=> array());			
		}
		
		return $result;
	}
	
	
	public function saveLaboratorio($laboratorio,$idLab, $docentes)
	{
		$model = new BaseModel();
		
		$laboratorio_id = $model->saveDatos($laboratorio,'laboratorio');
		if($laboratorio['id'] > 0){
			$laboratorio_id = $laboratorio['id'];
			
		} 
		$sql = "delete from lab_docente where laboratorio_id = ?";
		$model->execSql($sql, array($laboratorio_id),false,true);
		foreach ($docentes as $doc){
			$lab_docente['id'] = $idLab;
			$lab_docente['laboratorio_id'] = $laboratorio_id;
			$lab_docente['usuario_id'] = $doc;
			$model->saveDatos($lab_docente, 'lab_docente');
		}
		return true;
		
	}
	
	public function delLaboratorio(){
		$laboratorio = $_GET['id'];
		$sql = "update laboratorio set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($laboratorio),false,true);
	}


	
	public function getDocentes(){
		$model = new BaseModel();
		$sql = "select u.id, u.nombres, u.apellidos from usuario as u where u.eliminado = 0 and u.tipo_usuario_id = 3";
		return $model->execSql($sql, array(),true);
	}
	
	public function getTecnicos(){
		$model = new BaseModel();
		$sql = "select u.id, u.nombres, u.apellidos from usuario as u where u.eliminado = 0 and u.tipo_usuario_id = 2";
		return $model->execSql($sql, array(),true);
	}
	
	
	public function  getDocentesActivo(){
		$lab = $_GET['id'];
		return $this->getDocentesById($lab,false);
	}
	
	public function getDocentesById($id,$array){
		$model = new BaseModel();
		$sql = "SELECT u.id, u.nombres, u.apellidos from usuario as u
				inner join lab_docente as ld on ld.usuario_id = u.id
				where ld.laboratorio_id = ?";
		$result = $model->execSql($sql, array($id),true);
		if($array){
			$docentes =[];
			foreach ($result as $val){
				$docentes[] = $val->id;
			}
			return $docentes;
		}
		return $result;
	}
	
}
