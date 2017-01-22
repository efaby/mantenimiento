<?php
use Dompdf\Dompdf;
use Dompdf\FontMetrics;
require_once (PATH_MODELS . "/DocumentoModel.php");
require_once (PATH_HELPERS. "/File.php");
require_once (PATH_HELPERS. "/dompdf/autoload.inc.php");
require_once (PATH_HELPERS. "/dompdf/src/FontMetrics.php");



class DocumentoController {
	
	public function listar() {
		$model = new DocumentoModel();
		$datos = $model->getlistadoActivos();
		$message = "";
		require_once PATH_VIEWS."/Documento/view.list.php";
	}
	
	public function downloadFile(){
		$nombre = $_GET['id'];
		$upload = new File();
		return $upload->download($nombre,'activos');
	}
	
	public function general(){
		$activoId = $_GET['id'];
		$model = new DocumentoModel();
		$datos = $model->getDatosLaboratorio($activoId);
		$motor = $model->getMotor();
		$motor_partes = $model->getPartesMotor($activoId);
		
		$html="<html>
				<head>
				<style=txt/css>
					body {
						margin: 20px 20px 20px 50px; 
					}				
					table{
					   border-collapse: collapse; width: 100%;
					}
					
					td{
					   border:1px solid #ccc; padding:1px;
					   font-size:9pt;
					}
				</style>
				</head>
				<body>
					<table width= 100%>
						<tr>
							<td rowspan=4 align=center width= 15%>
								<img src=".PATH_FILES."../images/espoch.jpg height= 80px width=80px>
							</td>
							<td rowspan='2' colspan='2' align='center'><b>BANCO DE PRUEBAS PARA EL ANÁLISIS DE ".strtoupper($datos[0]->nombre_activo)."</b></td>
							<td width=25%>Ficha:".$datos[0]->ficha."</td>
						</tr>					
						<tr><td width=25%>Código:".$datos[0]->codigo."</td></tr>			
						<tr>
							<td rowspan=2 colspan=2 align=center>DATOS TÉCNICOS - DATOS PRINCIPALES</td>
							<td width=25%>Inventario:".$datos[0]->inventario."</td>
						</tr>
						<tr><td width=25%>Manual de Fabricante:".$datos[0]->manual_fabricante."</td></tr>					
						<tr>
							<td align=center><strong>Versión:".date('Y')."</strong></td>
							<td colspan=2 align=center>Escuela de Ingeniería Automotriz</td>
							<td width: 25%;>Sección:".$datos[0]->seccion."</td>
						</tr>			
					</table><br>						
					<table width= 100%>
						<tr>
							<td align=center>Fotografía de la Máquina</td>
							<td colspan=3 align=center><b>DATOS DE LA MÁQUINA</b></td>
						</tr>
						<tr>
							<td rowspan=7 align=center><img src=".PATH_FILES."activos/".$datos[0]->imagen_maquina_url." width=200px height=200px></td>
							<td align='center'><b>Marca</b></td>
							<td align='center'><b>Modelo</b></td>
				    		<td align='center'><b>Serie</b></td>		
						</tr>
						<tr>	
							<td>".$datos[0]->marca_maquina."</td>
							<td>".$datos[0]->modelo_maquina."</td>
				    		<td>".$datos[0]->serie_maquina."</td>
						</tr>	
						<tr>
							<td align='center'><b>Color</b></td>   
				    		<td align='center'><b>País de Origen</b></td>   
				    		<td align='center'><b>Capacidad</b></td>   
						</tr>
						<tr>	
							<td>".$datos[0]->color."</td>
							<td>".$datos[0]->pais_origen."</td>
				    		<td>".$datos[0]->capacidad."</td>
						</tr>
						<tr>
							<td colspan=3 align=center><b>CARACTERÍSTICAS GENERALES</b></td>         
						</tr>
				  		<tr>
							<td colspan=3 align=justify>Construido con: ".htmlspecialchars_decode($datos[0]->caracteristicas)."</td>         
						</tr>
						<tr>
							<td colspan=3>
								<table width=100%>
									<tr>
										<td colspan=4 align=center><b>DATOS DEL MOTOR</b></td>
									</tr>
									<tr>
										<td width=25%><b>Marca</b></td>
										<td width=25%>".$datos[0]->marca_motor."</td>
								    	<td width=25%><b>TIPO HE</b></td>   
								    	<td width=25%>".$datos[0]->tipo_he."</td>
									</tr>
									<tr>
										<td width=25%><b>#Fases</b></td>
										<td width=25%>".$datos[0]->num_fases."</td>
								    	<td width=25%><b>RPM</b></td>   
								    	<td width=25%>".$datos[0]->rpm."</td>
									</tr>
							  		<tr>
										<td width=25%><b>Voltaje</b></td>
										<td width=25%>".$datos[0]->voltaje_motor."</td>
								    	<td width=25%><b>Hz</b></td>   
								    	<td width=25%>".$datos[0]->hz."</td>
									</tr>
									<tr>
										<td width=25%><b>Amperios</b></td>							    			
								    	<td width=25%>".$datos[0]->amperios_motor."</td>
										<td width=25%><b>kW</b></td>   
								    	<td width=25%>".$datos[0]->kw."</td>   
									</tr>
								</table>
							</td>
						</tr>
						</table><table>
						<tr>
							<td colspan=4 align=center><b>Tipo de Motor</b></td>
						</tr><tr>";
						foreach ($motor as $tipo)
						{
							$val = ($tipo->id==$datos[0]->tipo_motor_id)?"checked":"";
							$html.="<td>".$tipo->nombre."<input type=checkbox name=tipo_motor_id ".$val."></td>";
						}
						$html.="</tr></table>
						<table width= 100% class='table table-bordered'><tr><td colspan=2 align=center><b>PARTES IMPORTANTES</b></td></tr>";
						foreach ($motor_partes as $value)
						{
							if(isset($value->url) && $value->url != null){
								$html.="<tr>
										<td align=center colspan=2>
										<img src=".PATH_FILES."activos/".$value->url." width=20 height=20></td></tr>";
							}
						}
						$html.="<tr><td align=center><b>#</b></td><td align=center><b>DENOMINACIÓN</b></td></tr>";
						foreach ($motor_partes as $value)
						{
							$html.="<tr><td width=20% align=center>".$value->id."</td><td width=80%>".$value->nombre."</td></tr>";
						}
		$html.="</table><br><br><table width=100%><tr><td width=20%><b>Función:</b></td><td width=80%>".$datos[0]->funcion."</td></tr>
						</table></body></html>";		
		$dompdf = new Dompdf();
		$dompdf->load_html($html);		
		$dompdf->render();
		$canvas = $dompdf->get_canvas();
		$font = FontMetrics::getFont("helvetica", "bold");
		$canvas->page_text(550, 750, "Pág. {PAGE_NUM}/{PAGE_COUNT}", $font, 6, array(0,0,0)); //header
		$canvas->page_text(270, 770, "Copyright © 2017 - SAM - W&L", $font, 6, array(0,0,0)); //footer		
		$dompdf->stream('general'.$activoId);
	}
	
	public function general_laboratorio(){
		$activoId = $_GET['id'];
		$model = new DocumentoModel();
		$datos = $model->getLaboratorios($activoId);
		
		$html="<html>
				<head>
				<style=txt/css>
					body {
						margin: 20px 20px 20px 50px;
					}
					table{
					   border-collapse: collapse; width: 100%;
					}
			
					td{
					   border:1px solid #ccc; padding:1px;
					   font-size:9pt;
					}
				</style>
				</head>
				<body>
					<table border=0 >
						<tr><td align=center><img src=".PATH_FILES."../images/caratula.png width=650 height=900></td></tr>
						<tr><td align=center><br><br><b>INDICE</b><br><br></td></tr>
						<tr><td>1.Introducción</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>2.Objetivos</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>3.Nomenclatura</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>4.Generalidades</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>5.Seguridad</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>6.Ficha Técnica</td></tr></table>
					<table style='page-break-after:always;'></br></table>
					<table width= 100% border=0>
						<tr><td><b>1. Introducción</b></td></tr>
						<tr><td align=justify>".htmlspecialchars_decode($datos[0]->introduccion)."</td></tr>
						<tr><td><b>2. Objetivos</b></td></tr><tr><td align=justify>".htmlspecialchars_decode($datos[0]->objetivos)."</td></tr>
						<tr><td><b>3. Nomenclatura</b></td></tr>
						<tr><td><img src=".PATH_FILES."activos/".$datos[0]->nomenglatura_url." width=400 height=400></td></tr>
						<tr><td><b>4. Generalidades</b></td></tr>
						<tr><td align=justify>".htmlspecialchars_decode($datos[0]->generalidades)."</td></tr>
						<tr><td><b>5. Seguridad</b></td></tr>
						<tr><td align=justify>".htmlspecialchars_decode($datos[0]->seguridad)."</td></tr>
						<tr><td><b>6. Ficha Técnina del Banco de Pruebas</b></td></tr>
					</table>					
					</body></html>";
		$dompdf = new Dompdf();
		$dompdf->load_html($html);
		$dompdf->render();
		$canvas = $dompdf->get_canvas();
		$font = FontMetrics::getFont("helvetica", "bold");
		$canvas->page_text(550, 750, "Pág. {PAGE_NUM}/{PAGE_COUNT}", $font, 6, array(0,0,0)); //header
		$canvas->page_text(270, 770, "Copyright © 2017 - SAM - W&L", $font, 6, array(0,0,0)); //footer
		$dompdf->stream('general'.$activoId);
	}
	
	
	public function planes(){
		$activoId = $_GET['id'];
		$model = new DocumentoModel();
		$activo = $model->getActivoById($activoId);
		$partes_maq = $model->getPartesMaqByAct($activoId);
		$planes = $partes_maq[0]->planes;
		$planes_ind = array();
		foreach ($planes as $plan){
			$planes_ind[] =$model->getPlanById($plan->id)[0];	
		}		
		
		$html="<html><head>
				<style=txt/css>
					body {
						margin: 20px 20px 20px 50px; 
					}				
					table{
					   border-collapse: collapse; width: 100%;
					}
					
					td{
					   border:1px solid #ccc; padding:1px;
					   font-size:9pt;
					}
				</style> 				 				
				</head>
				<body>
					<table width= 100%>
						<tr>
							<td rowspan=2 align=center width= 15%>
								<img src=".PATH_FILES."../images/espoch.jpg height= 80px width=80px>
							</td>
							<td colspan='2' rowspan=2 align='center'><b>".$activo[0]->nombre_activo."</b></td>							
							<td width=25% align='center'><img src=".PATH_FILES."../images/automotriz.png 80px width=80px></td>			
						</tr>
						<tr>
							<td width=25%><b>Código:</b> ".$activo[0]->codigo."</td>
						</tr>
					 </table><br>					
					<table style='width:100%'>
						<tr>
							<td style='text-align:center'><b>PARTES IMPORTANTES</b></td>
							<td style='text-align:center'><b>TAREA DE MANTENIMIENTO</b></td>
							<td style='text-align:center'><b>FRECUENCIA</b></td>
						</tr>";
						foreach ($partes_maq as $parte){
							$html.="<tr><td style='text-align:center'>".$parte->nombre."</td>
									<td style='text-align:center'>";
								foreach ($planes as $plan){
									$html.=$plan->tarea."<br>";			
								}	
							$html.="</td><td style='text-align:center'>";
							foreach ($planes as $plan){
								$html.=$plan->frecuencia."<br>";
							}
							$html.="</td></tr>";
						}		
				foreach ($planes_ind as $item){					
				$html.="</table><table style='page-break-after:always;'></br></table><br>
						<table style='width: 100%'>
							<tr>
								<td rowspan='2' style='text-align: center; width: 15%'>
									<img src=".PATH_FILES."../images/espoch.jpg height= 80px width=80px>
								</td>
								<td colspan=2 style='text-align: center;'><b>EJECUCIÓN DE TAREAS DE MANTENIMIENTO</b></td>
							</tr>
							<tr><td colspan=2 style='text-align: center;'><b>BANCO DE PRUEBAS PARA EL ANÁLISIS DE ".strtoupper($item->maquina)."</b></td></tr>
							<tr><td align=center><strong>Versión:".date('Y')."</strong></td>
								<td style='text-align: center;'><b>".strtoupper($item->laboratorio)."</b></br></td>
								<td style='text-align: center; width: 30%;'><b>Frecuencia:</b>Cada ".$item->frecuencia_numero." ".$item->frecuencia."</td>
							</tr>
						</table>
						<br>
						<table style='width: 100%'>
							<tr><td><b>Tiempo de Ejecución: </b>".$item->tiempo_ejecucion."</td>
								<td colspan=2><b>Estado Máquina:</b>";
								$estado = $item->estado_maquina?'Encendida':'Apagada';
								$html.=$estado."</td>
							</tr>
							<tr><td colspan=3 style='text-align: center;'>".$item->tarea." - ".$item->parte."</td></tr>
							<tr><td style='width: 33%'><b>Herramientas: </b><br>".$item->herramientas."</td>
								<td style='width: 33%'><b>Materiales: </b><br>".$item->materiales."</td>
								<td style='width: 34%'><b>Equipo: </b><br>".$item->equipo."</td>
							</tr>
							<tr><td colspan=3 align=justify><b>Procedimiento:</b><br>".htmlspecialchars_decode($item->procedimiento)."</td></tr>
							<tr><td colspan=3 align=justify><b>Observaciones:</b><br>".htmlspecialchars_decode($item->observaciones)."</td></tr>
						</table>";
					}
				$html.="</body></html>";	
		$dompdf = new Dompdf();
		$dompdf->load_html($html);
		$dompdf->render();
		$canvas = $dompdf->get_canvas();
		$font = FontMetrics::getFont("helvetica", "bold");
		$canvas->page_text(550, 750, "Pág. {PAGE_NUM}/{PAGE_COUNT}", $font, 6, array(0,0,0)); //header
		$canvas->page_text(270, 770, "Copyright © 2017 - SAM - W&L", $font, 6, array(0,0,0)); //footer
		$dompdf->stream('planes'.$activoId);
	}
	
	public function laboratorios(){
		$laboratorioId = $_GET['id'];
		$model = new DocumentoModel();
		$laboratorios = $model->getLaboratoriosId($laboratorioId);
		$html="	<html>
				<head>
					<style=txt/css>
						body {
						margin: 20px 20px 20px 50px;
					}
					table{
					border-collapse: collapse; width: 100%;
					}
						
					td{
					border:1px solid #ccc; padding:1px;
					font-size:9pt;
					}
					</style>
				</head>
				<body>
					 <table width= 100%>
						<tr>
							<td align=center width= 15%>
								<img src=".PATH_FILES."../images/espoch.jpg height= 80px width=80px>
							</td>
							<td colspan='2' align='center'><b>LISTADO DE ACTIVOS</b></td>							
							<td width=25% align='center'><img src=".PATH_FILES."../images/automotriz.png 80px width=80px></td>			
									
						</tr>						
					 </table><br>					
					 <table style='width:100%'>
						<tr>
							<td style='text-align:center'><b>CÓDIGO</b></td>
							<td style='text-align:center'><b>LABORATORIO</b></td>
							<td style='text-align:center'><b>NOMBRE DEL ACTIVO</b></td>									
						</tr>";
		foreach ($laboratorios as $lab){
		$html.="		<tr>
							<td style='width: 33%'>".$lab->codigo."</td>							
							<td style='width: 34%'>".$lab->nombre_lab."</td>
							<td style='width: 33%'>".$lab->nombre_activo."</td>
						</tr>";
		}
		
		$html.="</table><body></html>";		
		$dompdf = new Dompdf();
		$dompdf->load_html($html);
		$dompdf->render();
		$canvas = $dompdf->get_canvas();		
		$font = FontMetrics::getFont("helvetica", "bold");
		$canvas->page_text(550, 750, "Pág. {PAGE_NUM}/{PAGE_COUNT}", $font, 6, array(0,0,0)); //header
		$canvas->page_text(270, 770, "Copyright © 2017 - SAM - W&L", $font, 6, array(0,0,0)); //footer
		header("Content-type: application/pdf");		
		$dompdf->stream('laboratorios'.$laboratorioId);
	}	
	
	public function labByTecnico(){
		$laboratorioId = $_GET['id'];
		$model = new DocumentoModel();
		$laboratorios = $model->getLaboratoriosByTecnico($laboratorioId);
		$html="	<html>
				<head>
					<style=txt/css>
						body {
						margin: 20px 20px 20px 50px;
					}
					table{
					border-collapse: collapse; width: 100%;
					}
	
					td{
					border:1px solid #ccc; padding:1px;
					font-size:9pt;
					}
					</style>
				</head>
				<body>
					 <table width= 100%>
						<tr>
							<td align=center width= 15%>
								<img src=".PATH_FILES."../images/espoch.jpg height= 80px width=80px>
							</td>
							<td colspan='2' align='center'><b>REPORTE DE LABORATORIOS</b></td>
							<td width=25% align='center'><img src=".PATH_FILES."../images/automotriz.png 80px width=80px></td>
					
						</tr>
					 </table><br>
					 <table style='width:100%'>
						<tr>
							<td style='text-align:center'><b>ID</b></td>
							<td style='text-align:center'><b>NOMBRE DEL LABORATORIO</b></td>
							<td style='text-align:center'><b>NOMBRE DEL TÉCNICO</b></td>
						</tr>";
						foreach ($laboratorios as $lab){
		$html.="		<tr>
							<td style='width: 33%'>".$lab->id."</td>
							<td style='width: 34%'>".$lab->laboratorio."</td>
							<td style='width: 33%'>".$lab->tecnico."</td>
						</tr>";
						}
	
		$html.="</table><body></html>";
		$dompdf = new Dompdf();
		$dompdf->load_html($html);
		$dompdf->render();
		$canvas = $dompdf->get_canvas();
		$font = FontMetrics::getFont("helvetica", "bold");
		$canvas->page_text(550, 750, "Pág. {PAGE_NUM}/{PAGE_COUNT}", $font, 6, array(0,0,0)); //header
		$canvas->page_text(270, 770, "Copyright © 2017 - SAM - W&L", $font, 6, array(0,0,0)); //footer
		header("Content-type: application/pdf");
		$dompdf->stream('laboratorios'.$laboratorioId);
	}
}