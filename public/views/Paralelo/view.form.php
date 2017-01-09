<form id="frmItem" method="post" action="../guardar/">


	<div class="form-group  col-sm-12">
		<label class="control-label">Nombre</label>
		<input type='text'
			name='nombre' class='form-control'
			value="<?php echo $item->nombre; ?>">

	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Fecha Inicio</label>
		<input type='text'
			name='fecha_inicio' id='fecha_inicio' class='form-control'
			value="<?php echo $item->fecha_inicio; ?>">

	</div>
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Fecha Fin</label>
		<input type='text'
			name='fecha_fin' id='fecha_fin' class='form-control'
			value="<?php echo $item->fecha_fin; ?>">

	</div>
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Laboratorio</label>
		<select class='form-control' name="lab_docente_id">
			<option value="" >Seleccione</option>
		<?php foreach ($laboratorios as $dato) { ?>
			<option value="<?php echo $dato->id;?>"  <?php if($item->lab_docente_id==$dato->id):echo "selected"; endif;?>><?php echo $dato->nombre;?></option>
		<?php }?>
		</select>

	</div>
	
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $item->id; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>

</form>

<script type="text/javascript">
$(document).ready(function() {

	jQuery( "#fecha_inicio" ).datepicker({  
		dateFormat: "yy-mm-dd",
		onClose: function( selectedDate ) {
	        $( "#fecha_fin" ).datepicker( "option", "minDate", selectedDate );
	        $('#frmItem').formValidation('revalidateField', 'fecha_inicio');
	      }  		
	});

	
	jQuery( "#fecha_fin" ).datepicker({  
		dateFormat: "yy-mm-dd",
		onClose: function( selectedDate ) {
	        $( "#fecha_inicio" ).datepicker( "option", "maxDate", selectedDate );
	        $('#frmItem').formValidation('revalidateField', 'fecha_fin');
	      }  		
	});

	
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
			fecha_inicio: {
				 validators: {
					 notEmpty: {
						 message: 'La fecha de inicio es requerida y no puede ser vacía'
					 },
					 date:{	 
						    format: 'YYYY-MM-DD',
		                    message: 'La fecha de inicio no es válida.'				                    
					 },
					 							 
				 }
			 },
			 
	        fecha_fin: {
	        	 validators: {
					 notEmpty: {
						 message: 'La fecha de fin es requerida y no puede ser vacía'
					 },
					 date: {
						 format: 'YYYY-MM-DD',
		                 message: 'La fecha de fin no es válida.'
					 }							 
				 }
	        },
			lab_docente_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Laboratorio.'
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