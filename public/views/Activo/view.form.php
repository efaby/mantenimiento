<?php $title = "Activo";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Activo</h1>
   	</div>
</div>

<div class="row">
	<form id="frmActivo" method="post" action="../guardar/" enctype="multipart/form-data">
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-6">
				<label class="control-label">Nombre del Activo</label>
				<input type='text'
					name='nombre_activo' class='form-control'
					value="<?php echo $item->nombre_activo; ?>">
			</div>
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-3">
				<label class="control-label">Ficha</label>
				<input type='text'
					name='ficha' class='form-control'
					value="<?php echo $item->ficha; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">Código</label>
				<input type='text'
					name='codigo' class='form-control'
					value="<?php echo $item->codigo; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">Inventario</label>
				<input type='text'
					name='inventario' class='form-control'
					value="<?php echo $item->inventario; ?>">
			</div>			
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-3">
				<label class="control-label">Manuales de Fabricante</label>
				<input type='text'
					name='manual_fabricante' class='form-control'
					value="<?php echo $item->manual_fabricante; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">Sección</label>
				<input type='text'
					name='seccion' class='form-control'
					value="<?php echo $item->seccion; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">Versión</label>
				<input type='text'
					name='version' class='form-control'
					value="<?php echo $item->version; ?>">
			</div>
		</div>
		</div>		
		<div class="form-group  col-sm-12">
			<label class="control-label">DATOS DE LA MÁQUINA</label>
		</div>			
		<div class="form-group  col-sm-12">
				<label class="control-label">Fotografía de la Máquina</label>
					<img src="<?php isset($item->imagen_maquina_url)?$item->imagen_maquina_url:null ?>" alt="Imagen" height="100" width="100">
					<input type="file" name="foto" value="<?php echo $item->imagen_maquina_url; ?>">
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-3">
				<label class="control-label">Color</label>
		 		<input type='text'
					name='color' class='form-control'
					value="<?php echo $item->color; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">País de Origen</label>
		 		<input type='text'
					name='pais_origen' class='form-control'
					value="<?php echo $item->pais_origen; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">Capacidad</label>
		 		<input type='text'
					name='capacidad' class='form-control'
					value="<?php echo $item->capacidad; ?>">
			</div>		
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-3">
				<label class="control-label">Marca</label>
		 		<input type='text'
					name='marca_maquina' class='form-control'
					value="<?php echo $item->marca_maquina; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">Modelo</label>
		 		<input type='text'
					name='modelo_maquina' class='form-control'
					value="<?php echo $item->modelo_maquina; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">Serie</label>
		 		<input type='text'
					name='serie' class='form-control'
					value="<?php echo $item->serie; ?>">
			</div>
		</div>		
		<div class="form-group  col-sm-12">
			<label class="control-label">CARACTERISTICAS GENERALES</label>			
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-12" style="text-align: left;">
				<label class="control-label">Construido con</label>
		 		<textarea name="caracteristicas" id="caracteristicas" rows="5" cols="120">
                	<?php echo $item->caracteristicas; ?>
            	</textarea>
			</div>			
		</div>		
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-9">
				<label class="control-label">DATOS DEL MOTOR</label>
			</div>
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-3">
				<label class="control-label">Marca</label>
		 		<input type='text'
					name='marca_motor' class='form-control'
					value="<?php echo $item->marca_motor; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">TIPO HE</label>
		 		<input type='text'
					name='tipo_he' class='form-control'
					value="<?php echo $item->tipo_he; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label"># Fases</label>
		 		<input type='text'
					name='num_fases' class='form-control'
					value="<?php echo $item->num_fases; ?>">
			</div>
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-3">
				<label class="control-label">RPM</label>
		 		<input type='text'
					name='rpm' class='form-control'
					value="<?php echo $item->rpm; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">Voltaje</label>
		 		<input type='text'
					name='voltaje' class='form-control'
					value="<?php echo $item->voltaje; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">Hz</label>
		 		<input type='text'
					name='hz' class='form-control'
					value="<?php echo $item->hz; ?>">
			</div>
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-3">
				<label class="control-label">Amperios</label>
		 		<input type='text'
					name='amperios' class='form-control'
					value="<?php echo $item->amperios; ?>">
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">KW</label>
		 		<input type='text'
					name='kw' class='form-control'
					value="<?php echo $item->kw; ?>">
			</div>
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-3">
				<label class="control-label">Tipo de Motor</label>		 		
			</div>
		</div>		
		<div class="form-group  col-sm-12">
			<?php foreach ($tipo_motor as $tipo){?>
			<div class="form-group  col-sm-3">
				<input type="radio" name="tipo_motor_id" <?php if (isset($item->tipo_motor_id) && ($item->tipo_motor_id== $tipo->id)) echo "checked";?>
					value="<?php echo $tipo->id;?>"><?php echo $tipo->nombre;?>
			</div>
			<?php }?>
		</div>		
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-9">
				<label class="control-label">PARTES IMPORTANTES</label>
			</div>
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-3">
				<label class="control-label">#</label>
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">Denominación</label>
			</div>
			<div class="form-group  col-sm-3">
				<label class="control-label">Imagen</label>
			</div>
			<div class="form-group  col-sm-3">
				<div class="col-lg-12">
					<button class="btn btn-primary" id="modalOpen">
						<i class="glyphicon glyphicon-plus"></i>Agregar
					</button>
				</div>				
			</div>
		</div>
		
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-1">
				<label class="control-label">Función</label>		 		
			</div>
			<div class="form-group  col-sm-9">
				<input type='text'
					name='funcion' class='form-control'
					value="<?php echo $item->funcion; ?>">
			</div>
		</div>		
		<div class="form-group  col-sm-12">
			<label class="control-label">Seleccione el Laboratorio</label>
		</div>	
		<div class="form-group  col-sm-12">
			<?php foreach ($laboratorios as $lab){?>
			<div class="form-group  col-sm-3">
				<input type="checkbox" name="laboratorio_id" value="<?php echo $lab->id;?>"> <?php echo $lab->nombre;?>
			</div>
			<?php }?>
		</div>		
		
		
		<div class="form-group col-sm-12">
			<label class="control-label">Respado Digital</label> 
				<?php if(isset($item->diagram_proceso_url) &&  $item->diagram_proceso_url != ''):?>
					<input type='file' name='diagram_proceso_url' id="diagram_proceso_url" class="file">		
						<a href="../downloadFile/<?php echo $item->diagram_proceso_url;?>">Descargar</a>
					<input type="hidden" name="fileName" value="<?php echo $item->url;?>">
				<?php else :?>
					<input type='file' name='url' id="url" class="file">	
				<?php endif;?>
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
</div>

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Partes Importantes del Motor</h3>
			</div>			
			<div class="modal-body"></div>

		</div>
	</div>
</div>

<?php include_once PATH_TEMPLATE.'/footer.php';?>   
<script src="<?php echo PATH_JS; ?>/formValidation.js"></script>
<script src="<?php echo PATH_JS; ?>/bootstrap.js"></script>
<script src="<?php echo PATH_JS; ?>/currentList.js"></script>
<link href="<?php echo PATH_CSS; ?>/bootstrapValidator.min.css" rel="stylesheet">

<script src="<?php echo PATH_JS; ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo PATH_JS; ?>/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript">

function loadModal(id){
	$('.modal-body').load('../editarModal/' + id,function(result){
	    $('#confirm-submit').modal({show:true});
	});
}

$(document).ready(function() {

	CKEDITOR.replace('caracteristicas');
	
    $('#frmActivo').formValidation({
    	message: 'This value is not valid',
    	excluded: [':disabled'],
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {			
			nombre_activo: {
				message: 'El nombre del activo no es válido',
				validators: {
					notEmpty: {
						message: 'El nombre del acctivo no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
						message: 'Ingrese un nombre de activo válido.'
					}
				}
			},
			ficha: {
				message: 'La ficha no es válida',
				validators: {
					notEmpty: {
						message: 'El ficha no puede ser vacía.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
						message: 'Ingrese una ficha válido.'
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
			manual_fabricante: {
				message: 'El manual de fabricante no es válida',
				validators: {
					notEmpty: {
						message: 'El manual de fabricante no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
						message: 'Ingrese un manual de fabricante válido.'
					}
				}
			},			
			seccion: {
				message: 'La sección no es válida',
				validators: {
					notEmpty: {
						message: 'La sección no puede ser vacía.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
						message: 'Ingrese una sección válida.'
					}
				}
			},
			version: {
				message: 'La version no es válida',
				validators: {
					notEmpty: {
						message: 'La version no puede ser vacía.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
						message: 'Ingrese una versión válida.'
					}
				}
			},
			caracteristicas: {
                validators: {
                    notEmpty: {
                        message: 'Las caracteristicas no pueden ser vacias.'
                    },
                    callback: {
                        message: 'Los caracteristicas no pueden ser menos de 200 caracteres.',
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
            }
		}
	});
    

	/*find('[name="caracteristicas"]')
    .each(function() {
        $(this)
            // Attach an editor to field
            .ckeditor()
            .editor
                .on('change', function(e) {
                    // Revalidate the field that
                    // the current editor is attached to
                    // e.sender.name presents the field name
                    $('#frmActivo').formValidation('revalidateField', e.sender.name);
                });
    });*/
        
});
</script>
</body>
</html> 