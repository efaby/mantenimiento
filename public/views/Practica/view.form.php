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
		<label class="control-label">Fecha de Práctica</label>
		<input type='text'
			name='fecha' id='fecha' class='form-control'
			value="<?php echo $item->fecha; ?>">

	</div>
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Hora Inicio</label>
		<input name='hora_inicio' id="hora_inicio" type="text" class="form-control input-small"
		 value="<?php echo $item->hora_inicio; ?>">	
			
		<!--<input dropdown="model.options.dropdown" scrollbar="model.options.scrollbar"
		 dynamic="model.options.dynamic" interval="model.options.interval" 
		 max-time="model.options.maxTime" min-time="model.options.minTime" start-time="model.options.startTime" 
		 time-format="model.options.timeFormat" default-time="model.options.defaultTime" 
		 time-string="model.timeString" time="model.time" jt-timepicker="" class="timepicker text-center"> -->
	</div>
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Hora Fin</label>
		<input type='text'
			name='hora_fin' id='hora_fin' class='form-control'
			value="<?php echo $item->hora_fin; ?>">

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

	/*$('#hora_inicio').timepicker({
	    timeFormat: 'H:mm',
	    interval: 10,
	    minTime: '7:00',
	    maxTime: '22:00',
	    defaultTime: '7',
	    startTime: '7:00',
	    dynamic: true,
	    dropdown: true,
	    scrollbar: true,
	    parentEl: '#dispatch_modal'
	});*/

	 $('#hora_inicio').timepicker({
		 minuteStep: 1,
         secondStep: 5,
         showInputs: true,
         template: 'dropdown',
         modalBackdrop: true,
         showSeconds: true,
         showMeridian: false
     });	

	jQuery( "#fecha" ).datepicker({  
		dateFormat: "yy-mm-dd",
		minDate: new Date(),
		onClose: function(selectedDate) {
	        $( "#datepicker" ).datepicker( "option", "minDate", selectedDate );
	        $('#frmItem').formValidation('revalidateField', 'fecha');
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
			fecha: {
				 validators: {
					 notEmpty: {
						 message: 'La fecha de práctica es requerida y no puede ser vacía'
					 },
					 date:{	 
						    format: 'YYYY-MM-DD',
		                    message: 'La fecha de inicio no es válida.'				                    
					 },
					 							 
				 }
			 },		 
	        
			lab_docente_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Laboratorio'
					}
				}
			},
			activo_fisico_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Activo Físico'
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
.bootstrap-timepicker-widget.dropdown-menu {
    z-index: 1050!important;
}

#frmItem .col-sm-6, #frmItem .col-sm-12 {
	padding-right: 0px;
	padding-left: 0px;
}
</style>