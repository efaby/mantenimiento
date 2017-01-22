<?php $title = "Laboratorio";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Laboratorios</h1>
   	</div>
</div>

<div class="row">

<form id="frmItem" method="post" action="../guardar/" enctype="multipart/form-data">


	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Nombre</label>
		<input type='text'
			name='nombre' class='form-control'
			value="<?php echo $item->nombre; ?>">
	</div>
	</div>
	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Código</label>
		<input type='text'
			name='codigo' class='form-control'
			value="<?php echo $item->codigo; ?>">
	</div>
	</div>
	
	<div class="form-group  col-sm-12">

		<label class="control-label">Introducción</label>
	 <textarea name="introduccion" id="introduccion" rows="10" cols="80">
                <?php echo $item->introduccion; ?>
            </textarea>

	</div>	
	
	<div class="form-group  col-sm-12">

		<label class="control-label">Objetivos</label>
	 <textarea name="objetivos" id="objetivos" rows="10" cols="80">
                <?php echo $item->objetivos; ?>
            </textarea>

	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Generalidades</label>
	 <textarea name="generalidades" id="generalidades" rows="10" cols="80">
                <?php echo $item->generalidades; ?>
            </textarea>

	</div>
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Seguridad</label>
	 <textarea name="seguridad" id="seguridad" rows="10" cols="80">
               <?php echo $item->seguridad; ?>
            </textarea>
	</div>
	<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-6">
				<label class="control-label">Docentes</label>
			</div>	
		
		<div class="form-group  col-sm-12">
			<?php foreach ($docentes as $data){?>
				<div class="form-group  col-sm-3">
					<input type="checkbox" name="docente_id[]" value="<?php echo $data->id;?>"
					<?php if (isset($item->docentes) && (in_array($data->id, $item->docentes))) echo "checked";?>> 
					<?php echo $data->nombres ." ".$data->apellidos;?>
				</div>				
			<?php }?>
		</div>
		</div>			
	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Asignar Responsable de Laboratorio/Centro de Simulación /Taller</label>
		<select class='form-control' name="usuario_id" id="usuario_id">
			<option value="" >Seleccione</option>
		<?php foreach ($tecnicos as $dato) { ?>
			<option value="<?php echo $dato->id;?>" <?php if($item->usuario_id==$dato->id):echo "selected"; endif;?> ><?php echo $dato->nombres.' '.$dato->apellidos;?></option>
		<?php }?>
		</select>
	</div>
	</div>
	<div class="form-group col-sm-12">
			<div class="form-group col-sm-12">
				<label class="control-label">Nomenclatura</label> 
					<?php if(isset($item->nomenglatura_url) &&  $item->nomenglatura_url != ''):?>
						<input type='file' name='nomenglatura_url1' id="nomenglatura_url1" class="file">		
							<a href="../downloadFile/<?php echo $item->nomenglatura_url;?>">Descargar</a>
						<input type="hidden" name="filename1" value="<?php echo $item->nomenglatura_url;?>">
					<?php else :?>
						<input type='file' name='nomenglatura_url' id="nomenglatura_url" class="file">	
					<?php endif;?>
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
			codigo: {
				message: 'El Código no es válido',
				validators: {
					notEmpty: {
						message: 'El Código no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-]+$/,
						message: 'Ingrese un Código válido.'
					}
				}
			},
			introduccion: {
                validators: {
                    notEmpty: {
                        message: 'La Introducción no puede ser vacía.'
                    },
                   
                }
            },
            objetivos: {
                validators: {
                    notEmpty: {
                        message: 'Los Objetivos no pueden ser vacíos.'
                    },
                   
                }
            },
            generalidades: {
                validators: {
                    notEmpty: {
                        message: 'Las Generalidades no pueden ser vacias.'
                    },
                    
                }
            },	
            seguridad: {
                validators: {
                    notEmpty: {
                        message: 'La Seguridad no puede ser vacia.'
                    },
                    
                }
            },
            nomenglatura_url: {
				validators: {
					notEmpty: {
						message: 'Seleccione una Nomenclatura.'
					},
					file: {
	                    extension: 'jpg, gif, jpeg, png',
	                    message: 'Seleccione una nomenclatura válido. (jpg, jpeg, gif, png)'
	               }
				}
			},				
			nomenglatura_url1: {
					validators: {
						file: {
		                    extension: 'jpg, gif, jpeg, png',
		                    message: 'Seleccione una nomenclatura válido. (jpg, jpeg, gif, png)'
		               }
					}
				},
			usuario_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Tecnico'
					}
				}
			},
			'docente_id[]': {
                validators: {
                    notEmpty: {
                        message: 'Por favor escoja al menos un Docente.'
                    }
                }
        }	
			
			
		}
	}).find('[name="introduccion"], [name="objetivos"], [name="generalidades"], [name="seguridad"]')
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
