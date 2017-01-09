<?php
require_once(PATH_MODELS."/BaseModel.php");

class PracticaModel {

	public function getlistadoPractica($docente){
		$model = new BaseModel();	
		$sql = "select p.*, a.nombre_activo as maquina, l.nombre as laboratorio, pa.nombre as paralelo from practica as p
				inner join lab_activo as la on la.id = p.lab_activo_id
				inner join laboratorio as l on l.id = la.laboratorio_id				
				inner join activo_fisico as a on a.id =  la.activo_fisico_id
				inner join paralelo as pa on pa.id = p.paralelo_id
				where p.eliminado = 0 and p.usuario_id = ".$docente;
		return $model->execSql($sql, array(),true);
	}	
	
	public function getPractica()
	{
		$practica = $_GET['id'];
		$model = new BaseModel();		
		if($practica > 0){
			$sql = "select p.*, la.laboratorio_id from practica as p 
					inner join lab_activo as la on la.id = p.lab_activo_id where p.eliminado = 0 and p.id = ?";
			$result = $model->execSql($sql, array($practica));				
		} else {
			$result = (object) array('id'=>0,'nombre'=>'','fecha'=>'','hora_inicio'=>'','hora_fin'=>'', 'lab_activo_id' =>0, 'laboratorio_id' =>0,'url' => '','tiempo_duracion'=>'','paralelo_id' =>0);			
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
		$sql = "select la.id, a.nombre_activo as nombre from activo_fisico as a
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
	
	public function getParalelos($docente){
		$model = new BaseModel();
		$sql = "select p.* from paralelo as p
				inner join lab_docente as ld on ld.id = p.lab_docente_id
				where p.eliminado = 0 and ld.usuario_id = ".$docente." and (p.fecha_inicio <= '".date('Y-m_d')."' and p.fecha_fin >= '".date('Y-m_d')."')";
		return $model->execSql($sql, array(),true);
	}
	
	/*
	 * Estudiante
	 */
	
	public function getlistadoPracticas($estudiante){
		$model = new BaseModel();
		$sql = "select p.*, a.nombre as maquina, l.nombre as laboratorio, ev.duracion_practica, ev.nota_practica, ev.archivo_url, ev.ejecutado from practica as p
				inner join lab_activo as la on la.id = p.lab_activo_id
				inner join laboratorio as l on l.id = la.laboratorio_id
				inner join activo_fisico as a on a.id =  la.activo_fisico_id
				inner join paralelo as pa on pa.id = p.paralelo_id
				inner join matricula as m on m.paralelo_id = pa.id
				inner join estudiante as e on e.id = m.estudiante_id
				left join evaluacion as ev on ev.practica_id = p.id and ev.estudiante_id = ".$estudiante ."
				where p.eliminado = 0 and e.usuario_id = ".$estudiante;
		return $model->execSql($sql, array(),true);
	}
	
	public function getPracticaAll($estudiante)
	{
		$practica = $_GET['id'];
		$model = new BaseModel();
		$sql = "select p.*, p.id,  a.nombre as maquina, a.id as maquina_id, l.nombre as laboratorio, ev.* , u.nombres, u.apellidos from practica as p
				inner join lab_activo as la on la.id = p.lab_activo_id
				inner join laboratorio as l on l.id = la.laboratorio_id
				inner join activo_fisico as a on a.id =  la.activo_fisico_id	
				inner join usuario as u on u.id =  p.usuario_id
				left join evaluacion as ev on ev.practica_id = p.id and ev.estudiante_id = ".$estudiante ."
				where p.eliminado = 0 and p.id = ?";
		return $model->execSql($sql, array($practica));
	}
	
	public function registroUso($duracion,$id){
		$practica = $_GET['id'];
		$sql = "update activo_plan set horas_operacion = horas_operacion + ".$duracion." where activo_fisico_id = ".$id;
		$model = new BaseModel();
		$result = $model->execSql($sql, array(),false,true);
	}
	
	public function savePracticaEvaluacion($practica)
	{
		$model = new BaseModel();
		return $model->saveDatos($practica,'evaluacion');
	}
	
	public function getPlanes($id){
		$model = new BaseModel();
		$sql = "select ap.*,  p.tarea, p.usuario_id, u.nombres, u.apellidos, u.email, a.nombre as maquina from activo_plan as ap
				inner join plan_mantenimiento as p on p.id = ap.plan_mantenimiento_id
				inner join usuario as u on u.id =  p.usuario_id		
				inner join activo_fisico as a on a.id = ap.activo_fisico_id
				where ap.activo_fisico_id = ? and ap.frecuencia_id = 1";
		return $model->execSql($sql, array($id),true);
	}
	
	public function saveOrden($orden)
	{
		$model = new BaseModel();
		return $model->saveDatos($orden,'orden_plan');
	}
	
	public function getOrdenPlan($id)
	{
		$model = new BaseModel();		
		$sql = "select id from orden_plan
					where atendido = 0 and activo_plan_id = ?";
		return $model->execSql($sql, array($id));

	}
}
