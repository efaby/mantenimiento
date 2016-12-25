<form id="frmItem" method="post" action="../guardar/" enctype="multipart/form-data">


	<div class="form-group  col-sm-12">
		<label class="control-label">Nombre</label>
		<input type='text'
			name='nombre' class='form-control'
			value="<?php echo $item->nombre; ?>">

	</div>
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Laboratorio</label>
		<select class='form-control' name="lab_docente_id" id="laboratorio_id">
			<option value="" >Seleccione</option>
		<?php foreach ($laboratorios as $dato) { ?>
			<option value="<?php echo $dato->id;?>"  <?php if($item->laboratorio_id==$dato->id):echo "selected"; endif;?>><?php echo $dato->nombre;?></option>
		<?php }?>
		</select>

	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Activo Físico</label>
		<select class='form-control' name="activo_fisico_id" id="activo_fisico_id">
			<option value="" >Seleccione</option>
		<?php foreach ($maquinas as $dato) { ?>
			<option value="<?php echo $dato->id;?>"  <?php if($item->activo_fisico_id==$dato->id):echo "selected"; endif;?>><?php echo $dato->nombre;?></option>
		<?php }?>
		</select>

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
		<label class="control-label">Tiempo de duración (Horas)</label>
		<input type='text'
			name='tiempo_duracion' class='form-control'
			value="<?php echo $item->tiempo_duracion; ?>">

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

	$("#laboratorio_id").change(function () {
        $("#laboratorio_id option:selected").each(function () {
         opcion=$(this).val();
         $.post("../loadActivoFisico/", { opcion: opcion }, function(data){
         $("#activo_fisico_id").html(data);
         });            
     });
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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
						message: 'Ingrese un Nombre válido.'
					}
				}
			},
			tiempo_duracion: {
				message: 'El tiempo de duración no es válido',
				validators: {
					notEmpty: {
						message: 'El tiempo de duración no puede ser vacío.'
					},					
					regexp: {
						regexp: /^\d*$/,
						message: 'Ingrese un tiempo de duración válido.'
					}
				}
			},
			fecha_inicio: {
				 validators: {
					 notEmpty: {
						 message: 'La fecha de inicio es requerida y no puede ser vacia'
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
						 message: 'La fecha de fin es requerida y no puede ser vacia'
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
						message: 'Seleccione un Laboratorio'
					}
				}
			},
			url: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Archivo.'
					},
					file: {
	                    extension: 'pdf',
	                    message: 'Seleccione un archivo válido. (pdf)'
	                }
				}
			},
			url1: {
				validators: {							
					file: {
	                    extension: 'pdf',
	                    message: 'Seleccione un archivo válido. (pdf)'
	                }
				}
			}	
			
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