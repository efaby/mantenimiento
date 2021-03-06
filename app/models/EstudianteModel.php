<?php
require_once(PATH_MODELS."/BaseModel.php");

class EstudianteModel {

	private $pattern = "------";
	
	public function getlistadoEstudiante($docente){		
		$model = new BaseModel();	
		$sql = "select u.id,u.cedula, u.nombres, u.apellidos,u.email, e.codigo, e.id as id_estudiante,p.nombre as paralelo
				from usuario as u
				inner join estudiante e on e.usuario_id = u.id
        		inner join matricula m on m.estudiante_id = e.id
        		inner join paralelo p on p.id = m.paralelo_id
				inner join lab_docente as ld on ld.id = p.lab_docente_id
				where e.eliminado = 0 and ld.usuario_id = ".$docente;		
		return $model->execSql($sql, array(),true);
	}	
	
	public function getEstudiante()
	{
		$usuario = $_GET['id'];
		$model = new BaseModel();		
		if($usuario > 0){
			$sql = "select u.*, t.nombre as tipo_usuario_nombre,e.codigo, p.id as paralelo_id
					from usuario as u
					inner join tipo_usuario t on u.tipo_usuario_id= t.id
					inner join estudiante e on e.usuario_id = u.id
					inner join matricula m on m.estudiante_id = e.id
        			inner join paralelo p on p.id = m.paralelo_id
					where u.id = ?";
			$result = $model->execSql($sql, array($usuario));
			$result->password = $result->password1 = $this->pattern;
			$result->identificacion = $result->cedula;
		} else {
			$result = (object) array('id'=>0,'paralelo'=>0,'identificacion' =>'','codigo'=>'','nombres'=>'','apellidos'=>'','email'=>'');			
		}
		
		return $result;
	}
	
	public function saveEstudiante($usuario,$estudiante, $matricula){
		$model = new BaseModel();		
		if($usuario['id']==0){
			$usuario['password'] =  md5($usuario['password']);
		} else {
			unset($usuario['password']);
		}
		$usuario_id = $model->saveDatos($usuario,'usuario');
		
		$estudiante['usuario_id'] = ($usuario['id']>0)?$usuario['id']:$usuario_id;
		$estudiante_id = $model->saveDatos($estudiante,'estudiante');
	
		$matricula['estudiante_id'] = $estudiante_id ;		
		return $model->saveDatos($matricula,'matricula');		
	}
	
	public function delEstudiante(){
		$estudiante = $_GET['id'];
		$sql = "update estudiante set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($estudiante),false,true);
	}

	public function getCatalogo($tabla){
		$model = new BaseModel();
		return $model->getCatalogo($tabla);
	}	
	
	public function getEstudiantePorCedula($cedula){
		$model =  new BaseModel();
		$sql = "select e.*, u.*
				from estudiante e
				inner join usuario u on e.usuario_id=u.id
        		where tipo_usuario_id = 4 and cedula =?";
		return $model->execSql($sql, array($cedula));
	}
	
	public function getExistEstudiante($cedula, $paralelo){
		$model =  new BaseModel();
		$sql = "select e.*, u.*
				from estudiante e
				inner join usuario u on e.usuario_id=u.id
				inner join matricula m on m.estudiante_id=e.id
				where tipo_usuario_id = 4 and cedula =? and paralelo_id=?";
		return $model->execSql($sql, array($cedula, $paralelo));
	}
	
	public function getParalelo($docente){
		$model = new BaseModel();
		$sql = "SELECT p.id,p.nombre FROM paralelo as p
				inner join lab_docente as ld on p.lab_docente_id = ld.id			
				where ld.usuario_id =".$docente;
		return $model->execSql($sql, array(),true);
	}
}
