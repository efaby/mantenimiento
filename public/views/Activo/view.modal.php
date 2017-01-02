<form id="frmActivoModal" method="post" action="">
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
		<button type="button" class="btn btn-success boton" id="boton" onclick="guardar()">Guardar</button>
	</div>

</form>
<script type="text/javascript">

function guardar(){
	
	var tds = "<tr><td>"+ $("#denominacion").val() +" <input type='hidden' value='"+ $("#denominacion").val() +"' name='parte[]'></td><td></td><td><a href='javascript:eliminar()' class='btn btn-danger btn-sm' title='Eliminar'><i class='fa fa-trash'></i></a></td></tr>";
	$("#partesActivo").append(tds);	
	$('#confirm-submit').modal('hide');
	$('input[name="urlParte[]"]').val($('#url).val());
}

$(document).ready(function() {
	$('#frmActivoModal').formValidation({
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