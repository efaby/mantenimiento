<form id="frmItem" method="post" action="../guardarReparar/" enctype="multipart/form-data">

	<div class="form-group  col-sm-12">
		<label class="control-label">Activo Fisico</label>
		<div id="texto"> <?php echo $item->maquina; ?>
		</div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Problema</label>
		<div id="texto"> <?php echo $item->problema; ?>
		</div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Causa</label>
		<div id="texto"> <?php echo $item->causa; ?>
		</div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Solucion</label>
		<div id="texto"> <?php echo $item->solucion; ?>
		</div>
	</div>
	
	<div class="form-group col-sm-12">	
		<label class="control-label">Proceso</label>
		<textarea name='proceso' id='proceso' class='form-control' ></textarea>	
			
	</div>
	
	<div class="form-group col-sm-12">	
		<label class="control-label">Elementos</label>
		<textarea name='elementos' id='elementos' class='form-control' ></textarea>		
			
	</div>
	
	<div class="form-group col-sm-12">	
		<label class="control-label">Observacion</label>
		<textarea name='observacion' id='observacion' class='form-control' ></textarea>	
		
	</div>
		<div class="form-group col-sm-12">
		<label class="control-label">Imagen </label>	
			<input type='file' name='url' id="url" class="file">	
	</div>
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $item->id; ?>">
		<button type="submit" class="btn btn-success" id="saveReparar">Guardar</button>
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
			proceso: {
				message: 'El Proceso no es válido',
				validators: {	
					notEmpty: {
						message: 'El Proceso no puede ser vacío.'
					},												
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-]+$/,
								message: 'Ingrese un proceso válido.'
							}
						}
					},	
					elementos: {
						message: 'Los Elementos no son válidos',
						validators: {	
							notEmpty: {
								message: 'La Causa no puede ser vacía.'
							},												
									regexp: {
										regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-]+$/,
										message: 'Ingrese los Elementos válidos.'
									}
								}
							},
							observacion: {
								message: 'La observación no es válido',
								validators: {												
											regexp: {
												regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-]+$/,
												message: 'Ingrese una Observación válida.'
											}
										}
									},
									url: {
										validators: {							
											file: {
							                    extension: 'png,jpg,gif',
							                    message: 'Seleccione un archivo válido. (.png,.jpg,.gif)'
							                }
										}
									},
			
		}
	});
});
</script>
