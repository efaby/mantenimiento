<?php
require_once(PATH_MODELS."/BaseModel.php");

class ActivoModel {

	private $pattern = "------";
	
	public function getlistadoActivos(){		
		$model = new BaseModel();	
		$sql="SELECT a.id, a.ficha,a.codigo, a.inventario,a.nombre_activo, a.manual_fabricante
			  FROM activo_fisico a
			  where a.eliminado =0";
		return $model->execSql($sql, array(),true);
	}	
	
	public function getActivo()
	{
		$activo = $_GET['id'];
		$model = new BaseModel();		
		if($activo > 0){
			$sql = "SELECT * FROM activo_fisico a
					where a.id = ?";
			$result = $model->execSql($sql, array($activo));
			$sql = "SELECT l.id FROM mantenimiento.activo_fisico a
        			INNER JOIN lab_activo la ON la.activo_fisico_id = a.id
        			INNER JOIN laboratorio l ON l.id = la.laboratorio_id
    				where a.id = ?";
			$lab = $model->execSql($sql, array($activo));
			$result->laboratorios = $lab;
			
		} else {
			$result = (object) array('id'=>0,'nombre_activo'=>'','ficha' =>'','codigo'=>'','inventario'=>'','manual_fabricante'=>'','seccion'=>'','version'=>'','imagen_maquina_url'=>'',
					'color'=>'','pais_origen'=>'','capacidad'=>'','marca_maquina'=>'','modelo_maquina'=>'','serie_maquina'=>'','caracteristicas'=>'','marca_motor'=>'','tipo_he'=>'','num_fases'=>'',
					'rpm'=>'','voltaje_motor'=>'','hz'=>'','amperios_motor'=>'','kw'=>'','tipo_motor'=>'','parte_maquina'=>'', 'funcion'=>'','alias'=>''
			);			
		}
		
		return $result;
	}
	
	public function getPartesMotor()
	{
		$model = new BaseModel();
		$result = (object) array('id'=>0,'denominacion'=>'','url'=>'');
		return $result;
	}
	
	public function saveActivo($activo, $laboratorios){
		$model = new BaseModel();		
		$activo_id = $model->saveDatos($activo,'activo_fisico');
			
		foreach ($laboratorios as $lab){
			$laboratorio['laboratorio_id']=$lab;
			$laboratorio['activo_fisico_id']=$activo_id;
			$lab_id = $model->saveDatos($laboratorio,'lab_activo');
		}
		//$laboratorios['id'] = $activo_id;
		//$model->saveDatos($estudiante,'estudiante');
	
		return $activo_id;		
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
	
	public function getMotor(){
		$model = new BaseModel();
		$sql = "SELECT * FROM mantenimiento.tipo_motor";
		return $model->execSql($sql, array(),true);
	}
	
	public function  getLaboratorios(){
		$model = new BaseModel();
		$sql = "SELECT * FROM mantenimiento.laboratorio where eliminado=0";
		return $model->execSql($sql, array(),true);
	}
}
