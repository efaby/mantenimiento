<form id="frmItem" method="post" action="../guardar/" enctype="multipart/form-data">

	<div class="form-group  col-sm-12">
		<label class="control-label">Nombre</label>
		<input type='text'
			name='nombre' class='form-control'
			value="<?php echo $item->nombre; ?>">
	</div>
	<div class="form-group col-sm-12">
		<label class="control-label">Respado Digital</label> 
		
		<?php if($item->url != ''):?>
			<input type='file' name='url1' id="url1" class="file">		
			<a href="../downloadFile/<?php echo $item->url;?>">Descargar</a>
			<input type="hidden" name="fileName" value="<?php echo $item->url;?>">
		<?php else :?>
			<input type='file' name='url' id="url" class="file">	
		<?php endif;?>
	</div>
	
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $item->id; ?>">
	<input type='hidden' name='activo_fisico_id' class='form-control' value="<?php echo $activo_id; ?>">
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
			nombre: {
				message: 'El nombre no es válido',
				validators: {
					notEmpty: {
						message: 'El Nombre no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-]+$/,
						message: 'Ingrese un Nombre válido.'
					}
				}
			},		
			
			url: {
				validators: {
					file: {
	                    extension: 'png,jpg,gif',
	                    message: 'Seleccione un archivo válido. (png,jpg,gif)'
	                }
				}
			},
			url1: {
				validators: {							
					file: {
	                    extension: 'png,jpg,gif',
	                    message: 'Seleccione un archivo válido. (png,jpg,gif)'
	                }
				}
			},
			
		}
	});
});
</script>
<style>
#frmItem .col-sm-6, #frmItem .col-sm-12 {
	padding-right: 0px;
	padding-left: 0px;
}
</style>