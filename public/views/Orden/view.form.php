<?php $title = "Ejecutar Practica";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Ejecución de Mantenimiento</h1>
   	</div>
</div>

<div class="row" >

<table class="table table-bordered" style="width: 90%">
<tr>
<td rowspan="2" style="text-align: center; width: 15%"><img alt="espoch" src="<?php echo PATH_IMAGES."/espoch.jpg"?>" style="height: 80px"></td>
<td colspan="2" style="text-align: center;">EJECUCIÓN DE TAREAS DE MANTENIMIENTO</td>
</tr>
<tr><td colspan="2" style="text-align: center;"><?php echo $item->maquina;?></td></tr>
<tr><td style="text-align: center; ">Versión: <?php echo date('Y');?></td>
<td style="text-align: center;">
<?php foreach ($laboratorios as $data):?>
<?php echo $data->nombre ." </br>";?>
<?php endforeach;?>
</td>
<td style="text-align: center; width: 15%;">Frecuencia: <?php echo $item->frecuencia_horas; ?> Horas</td></tr>
</table>
<br>
<table class="table table-bordered" style="width: 90%">
<tr><td><b>Tiempo ejecucion: </b><?php echo $item->tiempo_ejecucion?></td><td colspan="2"><b>Estado Máquina:</b> <?php echo ($item->estado_maquina)?'Encendida':'Apagada';?></td></tr>
<tr><td colspan="3" style="text-align: center;"><?php echo $item->tarea;?></td></tr>
<tr><td style="width: 30%"><b>Herramientas: </b><br><?php echo $item->herramientas;?></td>
<td style="width: 30%"><b>Materiales: </b><br><?php echo $item->materiales;?></td>
<td style="width: 30%"><b>Equipo: </b><br><?php echo $item->equipo;?></td></tr>
<tr><td colspan="3"><b>Procedimiento:</b><br><?php echo htmlspecialchars_decode($item->procedimiento);?></td></tr>
<tr><td colspan="3"><b>Observaciones:</b><br><?php echo htmlspecialchars_decode($item->observaciones);?></td></tr>
</table>
<form id="frmItem" method="post" action="../guardar/">
<div class="form-group  col-sm-12">
<div class="form-group  col-sm-6">
		<label class="control-label">Tiempo ejecución</label>
		<input type='text'
			name='tiempo_ejecucion' id='tiempo_ejecucion' class='form-control'
			value="">
</div>
	</div>
	
	<div class="form-group col-sm-12">	
	<div class="form-group  col-sm-6">
		<label class="control-label">Observación</label>
		<textarea name='observacion' id='observacion' class='form-control' ></textarea>	
	</div>		
	</div>
	
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $item->orden_id; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>
</form>

<?php include_once PATH_TEMPLATE.'/footer.php';?>   

<script src="<?php echo PATH_JS; ?>/formValidation.js"></script>
<script src="<?php echo PATH_JS; ?>/bootstrap.js"></script>
<link href="<?php echo PATH_CSS; ?>/bootstrapValidator.min.css" rel="stylesheet">


<script type="text/javascript">
$(document).ready(function() {

	
    $('#frmItem').formValidation({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {			
			observacion: {
				message: 'La observación no es válida',
				validators: {												
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-]+$/,
								message: 'Ingrese una Observación válida.'
							}
						}
					},
					tiempo_ejecucion: {
						message: 'El Tiempo de Ejecucion no es válido',
						validators: {
							notEmpty: {
								message: 'El Tiempo de Ejecucion no puede ser vacío.'
							},					
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\_\-\:]+$/,
								message: 'Ingrese un Tiempo de Ejecucion válido.'
							}
						}
					},

		}
	});
});
</script>
</body>
</html>
