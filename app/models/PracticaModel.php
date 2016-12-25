<?php
require_once(PATH_MODELS."/BaseModel.php");

class PracticaModel {

	public function getlistadoPractica($docente){
		$model = new BaseModel();	
		$sql = "select p.*, a.nombre as maquina, l.nombre as laboratorio from practica as p
				inner join activo_fisico as a on a.id =  p.activo_fisico_id
				inner join lab_activo as la on la.activo_fisico_id = a.id
				inner join laboratorio as l on l.id = la.laboratorio_id
				where p.eliminado = 0 and p.usuario_id = ".$docente;		
		return $model->execSql($sql, array(),true);
	}	
	
	public function getPractica()
	{
		$practica = $_GET['id'];
		$model = new BaseModel();		
		if($practica > 0){
			$sql = "select p.*, la.laboratorio_id from practica as p 
					inner join lab_activo as la on la.activo_fisico_id = p.activo_fisico_id where eliminado = 0 and p.id = ?";
			$result = $model->execSql($sql, array($practica));				
		} else {
			$result = (object) array('id'=>0,'nombre'=>'','fecha_inicio'=>'','fecha_fin'=>'', 'activo_fisico_id' =>0, 'laboratorio_id' =>0, 'tiempo_duracion'=>'','url' => '');			
		}
		
		return $result;
	}
	
	
	public function savePractica($practica)
	{
		$model = new BaseModel();
		return $model->saveDatos($practica,'practica');
	}
	
	public function delPractica(){
		$practica = $_GET['id'];
		$sql = "update practica set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($practica),false,true);
	}

	public function getLaboratorios($docente){
		$model = new BaseModel();	
		$sql = "select ld.id, l.nombre from laboratorio as l
				inner join lab_docente as ld on l.id = ld.laboratorio_id				
				where ld.usuario_id = ".$docente;		
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
