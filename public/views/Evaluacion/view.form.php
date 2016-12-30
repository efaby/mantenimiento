<form id="frmItem" method="post" action="../guardar/">

	<div class="form-group  col-sm-12">
		<label class="control-label">Práctica</label>
		<div id="texto"> <?php echo $item->practica; ?></div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Paralelo</label>
		<div id="texto"> <?php echo $item->paralelo; ?></div>
	</div>
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Estudiante</label>
		<div id="texto"> <?php echo $item->nombres." ".$item->apellidos; ?></div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Tiempo de Práctica </label>
		<div id="texto"> <?php echo $item->duracion_practica; ?></div>
	</div>
	<div class="form-group col-sm-12">
		<label class="control-label">Informe</label> 	
			<div id="texto"><a href="../downloadFile/<?php echo $item->archivo_url;?>">Descargar</a></div>	
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Nota Practica</label>
		<input type='text'
			name='nota_practica' id='nota_practica' class='form-control'
			value="<?php echo $item->nota_practica; ?>">

	</div>
	
	<div class="form-group col-sm-12">	
		<label class="control-label">Observación</label>
		<textarea name='observaciones' id='observaciones' class='form-control' ><?php echo $item->observaciones; ?></textarea>	
			
	</div>
	
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $item->id; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>

</form>

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
			observaciones: {
				message: 'La observación no es válido',
				validators: {												
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
								message: 'Ingrese una Observación válida.'
							}
						}
					},
					nota_practica: {
						message: 'La Calificación no es válida',
						validators: {
									notEmpty: {
										message: 'La Calificación no puede ser vacía.'
									},					
									regexp: {
										regexp: /^[0-9]+([.][0-9]+)?$/,
										message: 'Ingrese una Calificación válida.'
									},
									between: {
			                            min: 0,
			                            max: 10,
			                            message: 'Ingrese una Calificación válida.'
			                        }
								}
							},
		}
	});
});
</script>
<style>
.col-sm-6, .col-sm-12 {
	padding-right: 0px;
	padding-left: 0px;
}
</style>