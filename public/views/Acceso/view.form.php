<form id="frmAcceso" method="post" action="../guardar/">
<div style="overflow: auto;">
	<div class="form-group col-sm-6">
		<label class="control-label">Rol</label> <input type='text'
			name='rol_id' class='form-control'
			value="<?php echo $item->rol_id; ?>" id="rol_id">
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Acción</label> <input type='text'
			name='accion' class='form-control'
			value="<?php echo $item->accion; ?>" id="accion">
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Icono</label> <input type='text'
			name='icono' class='form-control' 
			value="<?php echo $item->icono; ?>" id="icono">
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Título</label> <input type='text'
			name='titulo' class='form-control' 
			value="<?php echo $item->titulo; ?>" id="titulo">
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Orden</label>
		<input type="text"
			name='orden' class='form-control'
			value="<?php echo $item->orden; ?>">

	</div>
	<div class="form-group col-sm-6">
			<label class="control-label">Menú</label>			
			<select class='form-control' name="menu">
				<option value="" >Seleccione</option>
			<?php foreach ($listMenu as $dato) { ?>
				<option value="<?php echo $dato->id;?>"  <?php if($item->menu==$dato->id):echo "selected"; endif;?>><?php echo $dato->nombre;?></option>
			<?php }?>
			</select>
	</div>
	<div class="form-group">
		<input type='hidden' name='id' class='form-control' value="<?php echo $item->id; ?>">		
		<button type="submit" class="btn btn-success boton" id="boton">Guardar</button>
	</div>
</div>	
</form>

<script type="text/javascript">
$(document).ready(function() {
    $('#frmAcceso').formValidation({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {			
			rol_id: {
				message: 'El Número de Rol no es válido',
				validators: {
							notEmpty: {
								message: 'El Número de Rol no puede ser vacío.'
							},	
							regexp: {
								regexp: /^[0-9]+$/,
								message: 'Ingrese un Número de Rol válido.'
							}
				}
			},											
			accion: {
				message: 'La Acción no es válido',
				validators: {
							notEmpty: {
								message: 'La Acción no puede ser vacía.'
							},
							regexp: {
								regexp: /^[a-zA-Z\/]+$/,
								message: 'Ingrese una Acción válido.'
						}
				}
			},
			icono: {
						message: 'El Icono no es válido',
						validators: {
										notEmpty: {
										message: 'El Icono no puede ser vacío.'
									},
									regexp: {
										regexp: /^[0-9a-zA-Z\-]+$/,
										message: 'Ingrese un Icono válido.'
									}
							}
					},
			orden: {
						message: 'El Orden no es válido',
						validators: {
									notEmpty: {
									message: 'El Orden puede ser vacío.'
									},	
									regexp: {
										regexp: /^[0-9]+$/,
										message: 'Ingrese un Orden válido.'
									}
							}
					},
			titulo: {
						message: 'El Título no es válida',
						validators: {
								notEmpty: {
									message: 'El Título no puede ser vacío.'
								},
								regexp: {
									regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-\s]+$/,
									message: 'Ingrese un email válido.'
								}
							}
					},		
			menu: {
				validators: {
					notEmpty: {
						message: 'Seleccione una Opción del menú'
					}
				}
			},
			
			
			
		}
	});
});
</script>
<style>
.boton {
	margin-left: 15px;
}
</style>