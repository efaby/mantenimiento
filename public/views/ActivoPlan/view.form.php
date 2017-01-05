<form id="frmItem" method="post" action="../guardar/">

	<div class="form-group  col-sm-12">
		<label class="control-label">Plan Mantenimiento</label>
		<select class='form-control' name="plan_mantenimiento_id">
			<option value="" >Seleccione</option>
		<?php foreach ($planes as $dato) { ?>
			<option value="<?php echo $dato->id;?>"  <?php if($item->plan_mantenimiento_id==$dato->id):echo "selected"; endif;?>><?php echo $dato->tarea;?></option>
		<?php }?>
		</select>

	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Frecuencia</label>
		<div class="form-group  col-sm-12">
			<div class="form-group  col-sm-4">
			<input type='text'
			name='frecuencia_numero' class='form-control'
			value="<?php echo $item->frecuencia_numero; ?>">
			</div>
			<div class="form-group  col-sm-8">
		<select class='form-control' name="frecuencia_id">
			<option value="" >Seleccione</option>
		<?php foreach ($frecuencias as $dato) { ?>
			<option value="<?php echo $dato->id;?>"  <?php if($item->frecuencia_id==$dato->id):echo "selected"; endif;?>><?php echo $dato->nombre;?></option>
		<?php }?>
		</select>
		</div>
	</div>
	</div>

	
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $item->id; ?>">
	<input type='hidden' name='activo_fisico_id' class='form-control' value="<?php echo $activo_id; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>

</form>

<script type="text/javascript">
$(document).ready(function() {
	
    $('#frmItem').formValidation({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {			
			frecuencia_numero: {
				message: 'El valor de la frecuencia no es válido',
				validators: {
					notEmpty: {
						message: 'El valor de la frecuencia no puede ser vacío.'
					},					
					regexp: {
						regexp: /^\d*$/,
						message: 'Ingrese un valor de la frecuencia válido.'
					}
				}
			},
			
			plan_mantenimiento_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Plan'
					}
				}
			},
			frecuencia_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione una Frecuencia'
					}
				}
			},
			
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