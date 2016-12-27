<?php
require_once(PATH_MODELS."/BaseModel.php");

class PracticaModel {

	public function getlistadoPractica($docente){
		$model = new BaseModel();	
		$sql = "select p.*, a.nombre as maquina, l.nombre as laboratorio from practica as p
				inner join lab_activo as la on la.id = p.lab_activo_id
				inner join laboratorio as l on l.id = la.laboratorio_id				
				inner join activo_fisico as a on a.id =  la.activo_fisico_id				
				where p.eliminado = 0 and p.usuario_id = ".$docente;		
		return $model->execSql($sql, array(),true);
	}	
	
	public function getPractica()
	{
		$practica = $_GET['id'];
		$model = new BaseModel();		
		if($practica > 0){
			$sql = "select p.*, la.laboratorio_id from practica as p 
					inner join lab_activo as la on la.id = p.lab_activo_id where eliminado = 0 and p.id = ?";
			$result = $model->execSql($sql, array($practica));				
		} else {
			$result = (object) array('id'=>0,'nombre'=>'','fecha'=>'','hora_inicio'=>'','hora_fin'=>'', 'lab_activo_id' =>0, 'laboratorio_id' =>0,'url' => '','tiempo_duracion'=>'');			
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
		$sql = "select la.id, a.nombre from activo_fisico as a
				inner join lab_activo as la on la.activo_fisico_id = a.id
				where la.laboratorio_id = ".$laboratorio;
		return $model->execSql($sql, array(),true);
	}
	
	public function getLabs($hora_inicio,$hora_fin,$fecha,$activo, $id){
		$model = new BaseModel();
		$sql = "select count(id) as numero from practica
				where eliminado = 0 and id <> ".$id." and fecha = '".$fecha."' and lab_activo_id = ".$activo." and (hora_fin >= '".$hora_inicio."' and hora_inicio <= '".$hora_fin."')";
		return $model->execSql($sql, array(),true);
	}
}
