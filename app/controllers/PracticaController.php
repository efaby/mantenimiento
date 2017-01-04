<?php
require_once (PATH_MODELS . "/PracticaModel.php");
require_once (PATH_MODELS . "/NovedadModel.php");
require_once (PATH_HELPERS. "/File.php");
require_once (PATH_HELPERS. "/Email.php");

class PracticaController {
	
	public function listar() {
		$model = new PracticaModel();
		$docente = $_SESSION['SESSION_USER']->id;
		$datos = $model->getlistadoPractica($docente);
		$message = "";
		require_once PATH_VIEWS."/Practica/view.list.php";
	}
	
	public function editar(){
		$model = new PracticaModel();
		$docente = $_SESSION['SESSION_USER']->id;
		$item = $model->getPractica();	
		$laboratorios = $model->getLaboratorios($docente);
		$paralelos = $model->getParalelos($docente);
		$maquinas =  array();
		if($item->laboratorio_id>0){
			$maquinas =  $model->getMaquinas($item->laboratorio_id);
		}
		$message = "";
		require_once PATH_VIEWS."/Practica/view.form.php";
	}
	
	public function guardar() {
		
		$practica ['id'] = $_POST ['id'];
		$practica ['nombre'] = $_POST ['nombre'];
		$practica ['fecha'] = $_POST ['fecha'];
		$practica ['hora_inicio'] = $_POST ['hora_inicio'];
		$practica ['hora_fin'] = $_POST ['hora_fin'];
		$practica ['tiempo_duracion'] = $_POST ['tiempo_duracion'];
		$practica ['lab_activo_id'] = $_POST ['lab_activo_id'];	
		$practica ['url'] = $this->uploadFile('pra','practicas');
		$practica ['paralelo_id'] = $_POST ['paralelo_id'];
		$practica ['usuario_id'] = $_SESSION['SESSION_USER']->id;
		$model = new PracticaModel();
		try {
			$datos = $model->savePractica( $practica );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function eliminar() {
		$model = new PracticaModel();
		try {
			$datos = $model->delPractica();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function loadActivoFisico(){
		$opcion = $_POST ['opcion'];
		$model = new PracticaModel();
		$maquinas = $model->getMaquinas($opcion);
		$html ='<option value="" >Seleccione</option>';
		foreach ($maquinas as $dato) {
			$html .='<option value="'.$dato->id.'" >'.$dato->nombre.'</option>';
		}
		$html .='</select>';
		echo $html;
	}
	
	private function uploadFile($nombre,$carpeta){
		$upload = new File();
		return $upload->uploadFile($nombre,$carpeta);
	}
	public function downloadFile(){
		$nombre = $_GET['id'];
		$upload = new File();
		return $upload->download($nombre,'practicas');
	}
	
	public function verificar(){
		$hora_inicio = $_POST ['hora_inicio'];
		$hora_fin = $_POST ['hora_fin'];
		$activo = $_POST ['lab_activo_id'];
		$fecha = $_POST ['fecha'];
		$id = $_POST ['id'];
		$model = new PracticaModel();
		$labs = $model->getLabs($hora_inicio,$hora_fin,$fecha,$activo,$id);
		$labsCount = true;
		if($labs[0]->numero>0){
			$labsCount = false;
		}
		echo json_encode(array(
		    'valid' => $labsCount,
		));
	}
	
	/*
	 * Estudiante
	 */
	
	public function practicas(){
		$model = new PracticaModel();
		$estudiante = $_SESSION['SESSION_USER']->id;
		$datos = $model->getlistadoPracticas($estudiante);
		$message = "";
		require_once PATH_VIEWS."/Practica/view.practicas.php";
	}
	
	public function ver(){
		$model = new PracticaModel();	
		$estudiante = $_SESSION['SESSION_USER']->id;
		$item = $model->getPracticaAll($estudiante);		
		$message = "";
		require_once PATH_VIEWS."/Practica/view.ver.php";
	}
	
	public function ejecutar(){
		$model = new PracticaModel();
		$practica = $_GET['id'];
		$estudiante = $_SESSION['SESSION_USER']->id;
		$item = $model->getPracticaAll($estudiante);
		$message = "";
		require_once PATH_VIEWS."/Practica/view.ejecutar.php";
	}
	
	public function guardarPractica() {
	
		$practica ['id'] = 0;
		$practica ['practica_id'] = $_POST ['id'];
		$practica ['archivo_url'] = $this->uploadFile('pra','practicas');
		$practica ['estudiante_id'] = $_SESSION['SESSION_USER']->id;
		$practica ['duracion_practica'] = $_POST ['duracion_practica'];
		
		$model = new PracticaModel();
		try {
			$datos = $model->savePracticaEvaluacion( $practica );
			if($_POST['opcion']==1){
				$novedad['id'] = 0;
				$novedad ['problema'] = $_POST ['problema'];
				$novedad ['causa'] = $_POST ['causa'];
				$novedad ['solucion'] = $_POST ['solucion'];
				$novedad ['es_estudiante'] = 1;
				$novedad ['activo_fisico_id'] = $_POST ['activo_fisico_id'];
				$novedad ['usuario_registra'] = $_SESSION['SESSION_USER']->id; // Estudiante
				$model1 = new NovedadModel();
				$datos = $model1->saveNovedad( $novedad );
			}
			
			$duracion =  explode(':', $_POST ['duracion_practica']);
			$duracion = (int)$duracion[0] + ((int)$duracion[1]/60) + ((int)$duracion[1]/3600);
			$model->registroUso($duracion,$_POST ['activo_fisico_id']);
			$this->validarMantenimiento($_POST ['activo_fisico_id']);
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../practicas/" );
	}
	
	private function validarMantenimiento($id){
		$model = new PracticaModel();
		$planes = $model->getPlanes($id);
		
		foreach ($planes as $item){

			if($item->frecuencia_horas <= $item->horas_operacion){
				// envio correo al tecnico
				$orden['id'] = 0;
				$orden['activo_plan_id'] = $item->id;
				$orden['fecha_emision'] = date('Y-m-d');
				$orden['tecnico_asignado'] = $item->usuario_id;
				$model->saveOrden($orden);				
				
				if(SENDEMAIL){
					$email = new Email();
					$email->sendNotificacionOrden($item->nombres ." ".$item->apellidos, $item->email, $item->tarea, $item->maquina ,"http://" . $_SERVER['HTTP_HOST'] . PATH_BASE);			
				}
			}
		}
		
	}
}
