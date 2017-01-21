<?php
require_once(PATH_MODELS."/BaseModel.php");

class ActivoModel {

	private $pattern = "------";
	
	public function getlistadoActivos($usuario){		
		$model = new BaseModel();	
		$sql="SELECT a.id, a.ficha,a.codigo, a.inventario,a.nombre_activo, a.manual_fabricante, l.nombre as laboratorio
			  FROM activo_fisico a 
				inner join laboratorio as l on l.id = a.laboratorio_id
			
			 where a.eliminado = 0 and (l.usuario_id = ".$usuario." or 0 = ".$usuario.")";
		
		return $model->execSql($sql, array(),true);
	}	
	
	public function getActivo()
	{
		$activo = $_GET['id'];
		$model = new BaseModel();		
		if($activo > 0){
			$sql = "SELECT * FROM activo_fisico a
					WHERE a.id = ?";
			$result = $model->execSql($sql, array($activo));
			//$result->laboratorios = $this->getLaboratoriosActivo($activo);					
		} else {
			$result = (object) array('id'=>0,'nombre_activo'=>'','ficha' =>'','codigo'=>'','inventario'=>'','manual_fabricante'=>'','seccion'=>'','version'=>'','imagen_maquina_url'=>'',
					'color'=>'','pais_origen'=>'','capacidad'=>'','marca_maquina'=>'','modelo_maquina'=>'','serie_maquina'=>'','caracteristicas'=>'','marca_motor'=>'','tipo_he'=>'','num_fases'=>'',
					'rpm'=>'','voltaje_motor'=>'','hz'=>'','amperios_motor'=>'','kw'=>'','tipo_motor'=>'','parte_maquina'=>'', 'funcion'=>'','alias'=>'','laboratorio_id'=>0
			);			
		}
		
		return $result;
	}
	
	private function getLaboratoriosActivo($activo){
		$model = new BaseModel();
		if($activo > 0){
			$sql = "SELECT l.id FROM activo_fisico a
        			INNER JOIN lab_activo la ON la.activo_fisico_id = a.id
        			INNER JOIN laboratorio l ON l.id = la.laboratorio_id
    				WHERE la.eliminado=0 and a.id = ?";
			$result = $model->execSql($sql, array($activo),true);
			$laboratorios =[];
			foreach ($result as $val){
				$laboratorios[] = $val->id;
			}
			return $laboratorios;
		}
	}
	
	public function getPartesMotor()
	{
		$model = new BaseModel();
		$result = (object) array('id'=>0,'denominacion'=>'','url'=>'');
		return $result;
	}
	
	public function saveActivo($activo){
		$model = new BaseModel();		
		return $model->saveDatos($activo,'activo_fisico');		
		
	}
	
	public function delActivo(){
		$activo = $_GET['id'];
		$sql = "update activo_fisico set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($activo),false,true);
		
		//Activo y Laboratorio
		/*
		$sql = "update lab_activo set eliminado = 1 where activo_fisico_id = ?";
		$result = $model->execSql($sql, array($activo),false,true);
		*/
	}

	public function getCatalogo($tabla,$where=null){
		$model = new BaseModel();
		return $model->getCatalogo($tabla,$where);
	}	
	
	public function getMotor(){
		$model = new BaseModel();
		$sql = "SELECT * FROM tipo_motor";
		return $model->execSql($sql, array(),true);
	}
	
	public function  getLaboratorios(){
		$model = new BaseModel();
		$sql = "SELECT * FROM laboratorio where eliminado=0";
		return $model->execSql($sql, array(),true);
	}
	
	public function  getLaboratoriosActivoVer(){
		$activo = $_GET['id'];
		$model = new BaseModel();
		$sql = "SELECT l.nombre FROM laboratorio as l 
				inner join lab_activo as la on la.laboratorio_id = l.id
				where l.eliminado=0 and la.activo_fisico_id = ?";
		return $model->execSql($sql, array($activo),true);
	}
}
