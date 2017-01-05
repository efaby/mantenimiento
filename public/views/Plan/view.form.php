<?php $title = "Grados Personal";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Plan Mantenimiento</h1>
   	</div>
</div>

<div class="row">

<form id="frmItem" method="post" action="../guardar/" enctype="multipart/form-data">


	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Tarea</label>
		<input type='text'
			name='tarea' class='form-control'
			value="<?php echo $item->tarea; ?>">
	</div>
	</div>
	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Tiempo Ejecución</label>
		<input type='text'
			name='tiempo_ejecucion' class='form-control'
			value="<?php echo $item->tiempo_ejecucion; ?>">
	</div>
	</div>
	
	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Estado Máquina</label>
		<div>
		<label> <input type="radio" name="estado_maquina" value="0" <?php echo ($item->estado_maquina === 0)?'checked':''; ?>>Apagada</label>
		 <label> <input type="radio" name="estado_maquina"value="1" <?php echo ($item->estado_maquina == 1)?'checked':''; ?>> Encendida</label>
</div>
	</div>
	</div>
	
	<div class="form-group col-sm-12">	
	<div class="form-group  col-sm-6">
		<label class="control-label">Herramientas</label>
		<textarea name='herramientas' id='herramientas' class='form-control' ><?php echo $item->herramientas; ?></textarea>	
	</div>		
	</div>
	<div class="form-group col-sm-12">	
	<div class="form-group  col-sm-6">
		<label class="control-label">Materiales</label>
		<textarea name='materiales' id='materiales' class='form-control' ><?php echo $item->materiales; ?></textarea>	
	</div>		
	</div>
	<div class="form-group col-sm-12">	
	<div class="form-group  col-sm-6">
		<label class="control-label">Equipos</label>
		<textarea name='equipo' id='equipo' class='form-control' ><?php echo $item->equipo; ?></textarea>	
	</div>		
	</div>
		
	<div class="form-group  col-sm-12">
	
		<label class="control-label">Procedimiento</label>
	 <textarea name="procedimiento" id="procedimiento" rows="10" cols="80">
                <?php echo $item->procedimiento; ?>
            </textarea>

	</div>
	<div class="form-group  col-sm-12">

		<label class="control-label">Observaciones</label>
	 <textarea name="observaciones" id="observaciones" rows="10" cols="80">
                <?php echo $item->observaciones; ?>
            </textarea>

	</div>

	
	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Asignar Técnico</label>
		<select class='form-control' name="usuario_id" id="usuario_id">
			<option value="" >Seleccione</option>
		<?php foreach ($tecnicos as $dato) { ?>
			<option value="<?php echo $dato->id;?>" <?php if($item->usuario_id==$dato->id):echo "selected"; endif;?> ><?php echo $dato->nombres.' '.$dato->apellidos;?></option>
		<?php }?>
		</select>
	</div>
	</div>
	
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $item->id; ?>">
	<input type='hidden' name='idLab' class='form-control' value="<?php echo $item->idLab; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="../listar/" class="btn btn-info"  >
			Cancelar
		</a>
	</div>

</form>



<?php include_once PATH_TEMPLATE.'/footer.php';?>   
<script src="<?php echo PATH_JS; ?>/formValidation.js"></script>
<script src="<?php echo PATH_JS; ?>/bootstrap.js"></script>
<script src="<?php echo PATH_JS; ?>/currentList.js"></script>
<link href="<?php echo PATH_CSS; ?>/bootstrapValidator.min.css" rel="stylesheet">

<script src="<?php echo PATH_JS; ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo PATH_JS; ?>/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript">


$(document).ready(function() {

    $('#frmItem').formValidation({
    	message: 'This value is not valid',
    	excluded: [':disabled'],
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {			
			tarea: {
				message: 'La Tarea no es válida',
				validators: {
					notEmpty: {
						message: 'La Tarea no puede ser vacía.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-]+$/,
						message: 'Ingrese una La Tarea válida.'
					}
				}
			},
			estado_maquina: {
                validators: {
                    notEmpty: {
                        message: 'El Estado de la Maquina no puede ser vacio.'
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

			herramientas: {
				message: 'Las Herramientas no son válidas.',
				validators: {	
					notEmpty: {
						message: 'Las Herramientas no pueden ser vacías.'
					},											
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\_\-]+$/,
								message: 'Ingrese unas Herramientas válidas.'
							}
						}
					},

					materiales: {
						message: 'Los Materiales no son válidos.',
						validators: {	
							notEmpty: {
								message: 'Los Materiales no pueden ser vacíos.'
							},											
									regexp: {
										regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\_\-]+$/,
										message: 'Ingrese unos Materiales válidos.'
									}
								}
							},

							equipo: {
								message: 'El Equipo no es válido.',
								validators: {	
									notEmpty: {
										message: 'El Equipo no puede ser vacío.'
									},											
											regexp: {
												regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\_\-]+$/,
												message: 'Ingrese un Equipo válido.'
											}
										}
									},
					
			procedimiento: {
                validators: {
                    notEmpty: {
                        message: 'El Procedimiento no puede ser vacio.'
                    },
                    
                }
            },
            observaciones: {
                validators: {
                    notEmpty: {
                        message: 'Las Observaciones no pueden ser vacias.'
                    },
                    
                }
            },
            
			usuario_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Tecnico'
					}
				}
			},
			
			
		}
	}).find('[name="procedimiento"], [name="observaciones"]')
    .each(function() {
        $(this)
            // Attach an editor to field
            .ckeditor()
            .editor
                .on('change', function(e) {
                    // Revalidate the field that
                    // the current editor is attached to
                    // e.sender.name presents the field name
                    $('#frmItem').formValidation('revalidateField', e.sender.name);
                });
    });
        ;
});
</script>
</body>
</html>
