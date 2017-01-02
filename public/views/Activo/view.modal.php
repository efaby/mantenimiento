<form id="frmActivoModal" method="post" action="../guardar/">
<div style="overflow: auto;">
	<div class="form-group col-sm-12">
		<label class="control-label">Denominación</label>
		<input type='text' name='denominacion' class='form-control' id="denominacion"
			value="<?php echo $item->denominacion; ?>">
	</div>
	<div class="form-group col-sm-12">
		<label class="control-label">Imagen</label> 
		<input type='file' name='url' id="url" class="file" value="<?php echo $item->url; ?>">
	</div>
	<div class="form-group col-sm-12">
		<input type='hidden' name='id' class='form-control' value="<?php echo $item->id; ?>">		
		<button type="submit" class="btn btn-success boton" id="boton">Guardar</button>
	</div>

</form>
<script type="text/javascript">
$(document).ready(function() {
	$('#frmEstudiante').formValidation({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			denominacion: {
				message: 'La denominación no es válida',
				validators: {
					notEmpty: {
						message: 'La denominación no puede ser vacía.'
					},	
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\s]+$/,
						message: 'Ingrese una denominación válida.'
					}
				}
			},
		}
	});
});
</script>
<style>
<style>
.boton {
	margin-left: 15px;
}
</style>