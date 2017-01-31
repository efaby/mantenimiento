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
			<div class="form-group  col-sm-12">
				<label class="control-label">Nombre del Activo</label>
				<input type='text'
					name='nombre_activo' class='form-control'
					value="<?php echo $item->nombre_activo; ?>">
			</div>
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-6">
				<label class="control-label">Alias del Activo</label>
				<input type='text'
					name='alias' class='form-control'
					value="<?php echo $item->alias; ?>">
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
		</div>
		<div class="form-group  col-sm-12" align="center">
			<label class="control-label">DATOS DE LA MÁQUINA</label>
		</div>			
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-6">
				<label class="control-label">Fotografía de la Máquina</label>
					<?php if(isset($item->imagen_maquina_url) &&  $item->imagen_maquina_url != ''):?>
						<input type='file' name='imagen_maquina_url1' id="imagen_maquina_url1" class="file">		
							<a href="../downloadFile/<?php echo $item->imagen_maquina_url;?>">Descargar</a>
						<input type="hidden" name="filename" value="<?php echo $item->imagen_maquina_url;?>">
					<?php else :?>
						<input type='file' name='imagen_maquina_url' id="imagen_maquina_url" class="file">	
					<?php endif;?>
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
					name='serie_maquina' class='form-control'
					value="<?php echo $item->serie_maquina; ?>">
			</div>
		</div>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-3">
				<label class="control-label">Color</label>
		 		<input type='text'
					name='color'  id='color' class='form-control'
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
			<div class="form-group  col-sm-6">
				<label class="control-label">CARACTERÍSTICAS GENERALES</label>
			</div>				
		</div>		
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-12" style="text-align: left;">
				
		 		<textarea name="caracteristicas" id="caracteristicas" rows="5" cols="120"><?php echo $item->caracteristicas; ?></textarea>
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
					name='voltaje_motor' class='form-control'
					value="<?php echo $item->voltaje_motor; ?>">
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
					name='amperios_motor' class='form-control'
					value="<?php echo $item->amperios_motor; ?>">
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
			<div class="form-group  col-sm-2">
				<label class="control-label">Función</label>		 		
			</div>
			<div class="form-group  col-sm-10">
				<input type='text'
					name='funcion' class='form-control'
					value="<?php echo $item->funcion; ?>">
			</div>
		</div>	
		<div class="form-group  col-sm-12">
		<div class="form-group  col-sm-6">
		<label class="control-label">Laboratorio/Centro de Simulación/Talleres</label>
		<select class='form-control' name="laboratorio_id">
			<option value="" >Seleccione</option>
		<?php foreach ($laboratorios as $dato) { ?>
			<option value="<?php echo $dato->id;?>"  <?php if($item->laboratorio_id==$dato->id):echo "selected"; endif;?>><?php echo $dato->nombre;?></option>
		<?php }?>
		</select>
	</div>
	</div>
		
		
		<div class="form-group col-sm-12">
			<div class="form-group col-sm-12">
				<label class="control-label">Guía de Operación</label> 
					<?php if(isset($item->diagram_proceso_url) &&  $item->diagram_proceso_url != ''):?>
						<input type='file' name='diagram_proceso_url1' id="diagram_proceso_url1" class="file">		
							<a href="../downloadFile/<?php echo $item->diagram_proceso_url;?>">Descargar</a>
						<input type="hidden" name="filename2" value="<?php echo $item->diagram_proceso_url;?>">
					<?php else :?>
						<input type='file' name='diagram_proceso_url' id="diagram_proceso_url" class="file">	
					<?php endif;?>
			</div>		
		</div>
		<div class="form-group">
		<input type='hidden' name='id' class='form-control' value="<?php echo $item->id; ?>">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="../listar/" class="btn btn-info"  >
				Cancelar
			</a>
		</div>
	
	</form>
</div>

<?php include_once PATH_TEMPLATE.'/footer.php';?>   
<script src="<?php echo PATH_JS; ?>/formValidation.js"></script>
<script src="<?php echo PATH_JS; ?>/bootstrap.js"></script>
<script src="<?php echo PATH_JS; ?>/currentList.js"></script>
<link href="<?php echo PATH_CSS; ?>/bootstrapValidator.min.css" rel="stylesheet">

<script src="<?php echo PATH_JS; ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo PATH_JS; ?>/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript">

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
						message: 'El nombre del activo no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un nombre de activo válido.'
					}
				}
			},
			alias:{
				message: 'El alias no es válido',
				validators: {
					notEmpty: {
						message: 'El alias no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un alias válido.'
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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese una ficha válido.'
					}
				}
			},
			codigo: {
				message: 'El Código no es válido',
				validators: {
					notEmpty: {
						message: 'El Codigo no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un Código válido.'
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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un manual de fabricante válido.'
					}
				}
			},			
			inventario:{
				message: 'El inventario no es válido',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un inventario válido.'
					}
				}
			},
			color:{
				message: 'El color no es válido',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un color válido.'
					}
				}
			},
			pais_origen:{
				message: 'El país de origen no es válido',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un país de origen válido.'
					}
				}
			},
			capacidad:{
				message: 'La capacidad no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese una capacidad válida.'
					}
				}
			},
			marca_maquina:{
				message: 'La marca de la máquina no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese una  marca de la máquina válida.'
					}
				}
			},
			modelo_maquina:{
				message: 'El modelo de la máquina no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un modelo de la máquina válida.'
					}
				}
			},
			serie_maquina:{
				message: 'La serie no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese una serie válida.'
					}
				}
			},
			marca_motor:{
				message: 'La marca del motor no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese una  marca del motor válida.'
					}
				}
			},
			tipo_he:{
				message: 'El tipo HE no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un tipo HE válido.'
					}
				}
			},
			num_fases:{
				message: 'El número de fases no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un número de fases válido.'
					}
				}
			},
			rpm:{
				message: 'El RPM no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un RPM válido.'
					}
				}
			},
			voltaje_motor:{
				message: 'El voltaje no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un voltaje válido.'
					}
				}
			},
			hz:{
				message: 'El HZ no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un HZ válido.'
					}
				}
			},
			amperios_motor:{
				message: 'Los amperios no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese amperios válido.'
					}
				}
			},
			kw:{
				message: 'El kw no es válida',
				validators: {
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese un kw válido.'
					}
				}
			},
			funcion:{
				message: 'La función no es válida',
				validators: {
					notEmpty: {
						message: 'El manual de fabricante no puede ser vacío.'
					},
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
						message: 'Ingrese una función válido.'
					}
				}
			},
			/*caracteristicas: {
                validators: {
                    notEmpty: {
                        message: 'Las características no pueden ser vacías.'
                    }
                }
            },*/
            imagen_maquina_url: {
				validators: {
					notEmpty: {
						message: 'Seleccione una Imagen.'
					},
					file: {
	                    extension: 'jpg, gif, jpeg, png',
	                    message: 'Seleccione una imagen válido. (jpg, jpeg, gif, png)'
	                }
				}
			},
			imagen_maquina_url1: {
				validators: {					
					file: {
	                    extension: 'jpg, gif, jpeg, png',
	                    message: 'Seleccione una imagen válido. (jpg, jpeg, gif, png)'
	                }
				}
			},
			diagram_proceso_url:{
					validators: {
						notEmpty: {
							message: 'Seleccione un Archivo.'
						},
						file: {
		                    extension: 'pdf,docx,doc',
		                    message: 'Seleccione un archivo válido. (pdf, doc, docx)'
		                }
				}
			},	
			diagram_proceso_url1:{
				validators: {
					file: {
	                    extension: 'pdf,docx,doc',
	                    message: 'Seleccione un archivo válido. (pdf, doc, docx)'
	                }
				}
			},
			tipo_motor_id:{
				message: 'El tipo de motor no es válido',
				validators: {
					notEmpty: {
						message: 'El tipo de motor no puede ser vacío.'
					}
				}
			},	
			laboratorio_id: {
	                validators: {
	                    notEmpty: {
	                        message: 'Seleccione un laboratorio.'
	                    }
	                }
	        }			
      }		
	})
});
</script>
</body>
</html> 