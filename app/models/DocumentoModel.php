<?php
require_once(PATH_MODELS."/BaseModel.php");

class DocumentoModel {
	
	public function getlistadoActivos(){		
		$model = new BaseModel();	
		$sql="SELECT a.id, a.ficha,a.codigo, a.inventario,a.nombre_activo, a.manual_fabricante, l.nombre as laboratorio, l.id as laboratorio_id, a.diagram_proceso_url
			  FROM activo_fisico a
				inner join laboratorio as l on l.id = a.laboratorio_id
			  WHERE a.eliminado =0";
		return $model->execSql($sql, array(),true);
	}
	
	public function getDatosLaboratorio($activo){
		$model = new BaseModel();
		$sql ="SELECT * FROM laboratorio as l
			   INNER JOIN activo_fisico as a ON a.laboratorio_id=l.id
			   WHERE a.id=? and a.eliminado=0";
		$result = $model->execSql($sql, array($activo),true);
		return $result;
	}
	
	public function getMotor(){
		$model = new BaseModel();
		$sql = "SELECT * FROM tipo_motor";
		return $model->execSql($sql, array(),true);
	}
	
	public function getPartesMotor($activo){
		$model = new BaseModel();
		$sql = "select * from partes_maquina where activo_id = ?";
		return $model->execSql($sql, array($activo),true);
	}
	
	public function getActivo()
	{
		$activo = $_GET['id'];
		$model = new BaseModel();		
		if($activo > 0){
			$sql = "SELECT * FROM activo_fisico a
					WHERE a.id = ?";
			$result = $model->execSql($sql, array($activo));
			$result->laboratorios = $this->getLaboratoriosActivo($activo);					
		} else {
			$result = (object) array('id'=>0,'nombre_activo'=>'','ficha' =>'','codigo'=>'','inventario'=>'','manual_fabricante'=>'','seccion'=>'','version'=>'','imagen_maquina_url'=>'',
					'color'=>'','pais_origen'=>'','capacidad'=>'','marca_maquina'=>'','modelo_maquina'=>'','serie_maquina'=>'','caracteristicas'=>'','marca_motor'=>'','tipo_he'=>'','num_fases'=>'',
					'rpm'=>'','voltaje_motor'=>'','hz'=>'','amperios_motor'=>'','kw'=>'','tipo_motor'=>'','parte_maquina'=>'', 'funcion'=>'','alias'=>''
			);			
		}
		
		return $result;
	}
	
	private function getLaboratoriosActivo($activo){
		$model = new BaseModel();
		if($activo > 0){
			$sql = "SELECT l.id FROM mantenimiento.activo_fisico a
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
	
	public function saveActivo($activo, $laboratorios){
		$model = new BaseModel();		
		$activo_id=  $model->saveDatos($activo,'activo_fisico');		
		if($activo['id'] != 0){
			$activo_id = $activo['id']; 
		}
		$sql = "update lab_activo set eliminado=1 where activo_fisico_id=".$activo_id;
		$result = $model->execSql($sql, array(),false,true);
		
		$lab_asociados = $this->getCatalogo('lab_activo',' where activo_fisico_id='.$activo_id);
		foreach ($laboratorios as $lab){
			$band = true;
			foreach ($lab_asociados as $lab_aso){
				if($lab_aso->laboratorio_id == $lab && $lab_aso->activo_fisico_id==$activo_id){
					$laboratorio['id'] = $lab_aso->id;
					$laboratorio['eliminado']=0;
					$model->saveDatos($laboratorio,'lab_activo');
					$band = false;
				}			
			}
			if($band){
				$laboratorio['laboratorio_id']=$lab;
				$laboratorio['activo_fisico_id']=$activo_id;
				$lab_id = $model->saveDatos($laboratorio,'lab_activo');				
			}
		}		
		return $activo_id;		
	}
	
	public function delActivo(){
		$activo = $_GET['id'];
		$sql = "update activo_fisico set eliminado = 1 where id = ?";
		$model = new BaseModel();
		$result = $model->execSql($sql, array($activo),false,true);
		
		//Activo y Laboratorio
		$sql = "update lab_activo set eliminado = 1 where activo_fisico_id = ?";
		$result = $model->execSql($sql, array($activo),false,true);
		
	}

	public function getCatalogo($tabla,$where=null){
		$model = new BaseModel();
		return $model->getCatalogo($tabla,$where);
	}	
	
	public function  getLaboratorios(){
		$model = new BaseModel();
		$sql = "SELECT * FROM mantenimiento.laboratorio where eliminado=0";
		return $model->execSql($sql, array(),true);
	}
}