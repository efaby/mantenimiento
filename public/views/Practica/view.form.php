<form id="frmItem" method="post" action="../guardar/" enctype="multipart/form-data">
	<div class="form-group  col-sm-12">
		<label class="control-label">Nombre</label>
		<input type='text'
			name='nombre' class='form-control'
			value="<?php echo $item->nombre; ?>">
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Paralelo</label>
		<select class='form-control' name="paralelo_id" id="paralelo_id">
			<option value="" >Seleccione</option>
		<?php foreach ($paralelos as $dato) { ?>
			<option value="<?php echo $dato->id;?>"  <?php if($item->paralelo_id==$dato->id):echo "selected"; endif;?>><?php echo $dato->nombre;?></option>
		<?php }?>
		</select>
	</div>
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Lab/CSin/Tall</label>
		<select class='form-control' name="lab_docente_id" id="laboratorio_id">
			<option value="" >Seleccione</option>
		<?php foreach ($laboratorios as $dato) { ?>
			<option value="<?php echo $dato->id;?>"  <?php if($item->laboratorio_id==$dato->id):echo "selected"; endif;?>><?php echo $dato->nombre;?></option>
		<?php }?>
		</select>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Activo Físico</label>
		<select class='form-control' name="activo_id" id="activo_id">
			<option value="" >Seleccione</option>
		<?php foreach ($maquinas as $dato) { ?>
			<option value="<?php echo $dato->id;?>"  <?php if($item->activo_id==$dato->id):echo "selected"; endif;?>><?php echo $dato->nombre;?></option>
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
		<input name='hora_inicio' id="hora_inicio" class="form-control input-small"
		 value="<?php echo $item->hora_inicio; ?>">	
			
		
	</div>
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Hora Fin</label>
		<input type='text'
			name='hora_fin' id='hora_fin' class='form-control'
			value="<?php echo $item->hora_fin; ?>">

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
	$('#hora_inicio').timepicker({
        showMeridian: false
    });	

	$('#hora_fin').timepicker({
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
         $("#activo_id").html(data);
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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-]+$/,
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
			paralelo_id: {
				message: 'El paralelo no es válido',
				validators: {
					notEmpty: {
						message: 'El paralelo no puede ser vacío.'
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
			activo_id: {
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
			},

			hora_inicio: {
                verbose: false,
                validators: {
                	remote: {
                        url: '../verificar/',
                        // Send { username: 'its value', email: 'its value' } to the back-end
                        data: function(validator, $field, value) {
                            return {
                                hora_inicio: validator.getFieldElements('hora_inicio').val(),
                                hora_fin: validator.getFieldElements('hora_fin').val(),
                                activo_id: validator.getFieldElements('activo_id').val(),
                                fecha: validator.getFieldElements('fecha').val(),
                                id: validator.getFieldElements('id').val()
                            };
                        },
                        message: 'Ya existe una practica en este horario.',
                        type: 'POST'
                    },
                    notEmpty: {
                        message: 'La Hora Inicio no puede ser vacío.'
                    },
                    regexp: {
                        regexp: /^(([01]\d)|(2[0-3])):([0-5]\d)$/,
                        message: 'Ingrese una hora de inicio válida.'
                    },
                    callback: {
                        message: 'La hora de inicio debe ser menor a la hora fin.',
                        callback: function(value, validator, $field) {
                            var endTime = validator.getFieldElements('hora_fin').val();
                            
                            var startHour    = parseInt(value.split(':')[0], 10),
                                startMinutes = parseInt(value.split(':')[1], 10),
                                endHour      = parseInt(endTime.split(':')[0], 10),
                                endMinutes   = parseInt(endTime.split(':')[1], 10);

                            if (startHour < endHour || (startHour == endHour && startMinutes < endMinutes)) {
                                // The end time is also valid
                                // So, we need to update its status
                                validator.updateStatus('hora_fin', validator.STATUS_VALID, 'callback');
                                return true;
                            }

                            return false;
                        }
                    },
                    
                }
            },
            hora_fin: {
                verbose: false,
                validators: {
                	remote: {
                        url: '../verificar/',
                        // Send { username: 'its value', email: 'its value' } to the back-end
                        data: function(validator, $field, value) {
                            return {
                                hora_inicio: validator.getFieldElements('hora_inicio').val(),
                                hora_fin: validator.getFieldElements('hora_fin').val(),
                                activo_id: validator.getFieldElements('activo_id').val(),
                                fecha: validator.getFieldElements('fecha').val(),
                                id: validator.getFieldElements('id').val()
                            };
                        },
                        message: 'Ya existe una práctica en este horario.',
                        type: 'POST'
                    },
                    notEmpty: {
                        message: 'La Hora Fin no puede ser vacío.'
                    },
                    regexp: {
                        regexp: /^(([01]\d)|(2[0-3])):([0-5]\d)$/,
                        message: 'Ingrese una Hora Fin válida.'
                    },
                    callback: {
                        message: 'La hora fin debe ser mayor a la hora inicio',
                        callback: function(value, validator, $field) {
                            var startTime = validator.getFieldElements('hora_inicio').val();
                           
                            var startHour    = parseInt(startTime.split(':')[0], 10),
                                startMinutes = parseInt(startTime.split(':')[1], 10),
                                endHour      = parseInt(value.split(':')[0], 10),
                                endMinutes   = parseInt(value.split(':')[1], 10);

                            if (endHour > startHour || (endHour == startHour && endMinutes > startMinutes)) {
                                // The start time is also valid
                                // So, we need to update its status
                                validator.updateStatus('hora_inicio', validator.STATUS_VALID, 'callback');
                                return true;
                            }

                            return false;
                        }
                    }
                }
            }

				
			
		}
	});
});
</script>
<style>

.bootstrap-timepicker-widget {
	z-index: 1 !important;
}

#frmItem .col-sm-6, #frmItem .col-sm-12 {
	padding-right: 0px;
	padding-left: 0px;
}
</style>