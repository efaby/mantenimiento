<?php $title = "Grados Personal";?>
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
		<label class="control-label">Codigo</label>
		<input type='text'
			name='codigo' class='form-control'
			value="<?php echo $item->codigo; ?>">
	</div>
	</div>
	
	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Introduccion</label>
	 <textarea name="introduccion" id="introduccion" rows="10" cols="80">
                <?php echo $item->introduccion; ?>
            </textarea>
	</div>
	</div>	
	
	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Objetivos</label>
	 <textarea name="objetivos" id="objetivos" rows="10" cols="80">
                <?php echo $item->objetivos; ?>
            </textarea>
	</div>
	</div>
	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Generalidades</label>
	 <textarea name="generalidades" id="generalidades" rows="10" cols="80">
                <?php echo $item->generalidades; ?>
            </textarea>
	</div>
	</div>
	
	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Seguridad</label>
	 <textarea name="seguridad" id="seguridad" rows="10" cols="80">
               <?php echo $item->seguridad; ?>
            </textarea>
	</div>
	</div>
	
	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Docente</label>
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
			codigo: {
				message: 'El Codigo no es válido',
				validators: {
					notEmpty: {
						message: 'El Codigo no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\_\-]+$/,
						message: 'Ingrese un Codigo válido.'
					}
				}
			},
			introduccion: {
                validators: {
                    notEmpty: {
                        message: 'La Introduccion no puede ser vacia.'
                    },
                    callback: {
                        message: 'La introduccion no puede ser menos de 200 caracteres.',
                        callback: function(value, validator, $field) {
                            if (value === '') {
                                return true;
                            }
                            // Get the plain text without HTML
                            var div  = $('<div/>').html(value).get(0),
                                text = div.textContent || div.innerText;

                            return text.length <= 200;
                        }
                    }
                }
            },
            objetivos: {
                validators: {
                    notEmpty: {
                        message: 'Los Objetivos no pueden ser vacios.'
                    },
                    callback: {
                        message: 'Los Objetivos no pueden ser menos de 200 caracteres.',
                        callback: function(value, validator, $field) {
                            if (value === '') {
                                return true;
                            }
                            // Get the plain text without HTML
                            var div  = $('<div/>').html(value).get(0),
                                text = div.textContent || div.innerText;

                            return text.length <= 200;
                        }
                    }
                }
            },
            generalidades: {
                validators: {
                    notEmpty: {
                        message: 'Las Generalidades no pueden ser vacias.'
                    },
                    callback: {
                        message: 'Las Generalidades no pueden ser menos de 200 caracteres.',
                        callback: function(value, validator, $field) {
                            if (value === '') {
                                return true;
                            }
                            // Get the plain text without HTML
                            var div  = $('<div/>').html(value).get(0),
                                text = div.textContent || div.innerText;

                            return text.length <= 200;
                        }
                    }
                }
            },	
            seguridad: {
                validators: {
                    notEmpty: {
                        message: 'La Seguridad no puede ser vacia.'
                    },
                    callback: {
                        message: 'La Seguridiad no puede ser menos de 200 caracteres.',
                        callback: function(value, validator, $field) {
                            if (value === '') {
                                return true;
                            }
                            // Get the plain text without HTML
                            var div  = $('<div/>').html(value).get(0),
                                text = div.textContent || div.innerText;

                            return text.length <= 200;
                        }
                    }
                }
            },				
			usuario_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Docente'
					}
				}
			},
			
			
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
