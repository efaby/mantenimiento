<?php $title = "Grados Personal";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Registro Novedad</h1>
   	</div>
</div>
<?php if (isset($_SESSION['message'])&& ($_SESSION['message'] != '')):?>
		<div class="alert alert-success fade in alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"
					aria-hidden="true">&times;</button>
								  <?php echo $_SESSION['message'];$_SESSION['message'] = ''?>
								</div>
		<?php endif;?>
<div class="row">
	
	<form id="frmItem" method="post" action="../guardar/" >


	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Laboratorio</label>
		<select class='form-control' name="lab_docente_id" id="laboratorio_id">
			<option value="" >Seleccione</option>
		<?php foreach ($laboratorios as $dato) { ?>
			<option value="<?php echo $dato->id;?>" ><?php echo $dato->nombre;?></option>
		<?php }?>
		</select>
	</div>
	</div>
	<div class="form-group  col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Activo Físico</label>
		<select class='form-control' name="activo_fisico_id" id="activo_fisico_id">
			<option value="" >Seleccione</option>
		<?php foreach ($maquinas as $dato) { ?>
			<option value="<?php echo $dato->id;?>"  <?php if($item->activo_fisico_id==$dato->id):echo "selected"; endif;?>><?php echo $dato->nombre;?></option>
		<?php }?>
		</select>
</div>
	</div>	
	
	<div class="form-group col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Problema</label>
		<textarea name='problema' id='problema' class='form-control' ></textarea>	
		</div>		
	</div>
	
	<div class="form-group col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Causa</label>
		<textarea name='causa' id='causa' class='form-control' ></textarea>		
		</div>	
	</div>
	
	<div class="form-group col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Solución</label>
		<textarea name='solucion' id='solucion' class='form-control' ></textarea>	
		</div>		
	</div>
	
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $item->id; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>

</form>

</div>

<?php include_once PATH_TEMPLATE.'/footer.php';?>   
<script src="<?php echo PATH_JS; ?>/formValidation.js"></script>
<script src="<?php echo PATH_JS; ?>/bootstrap.js"></script>
<script src="<?php echo PATH_JS; ?>/currentList.js"></script>
<link href="<?php echo PATH_CSS; ?>/bootstrapValidator.min.css" rel="stylesheet">


<script type="text/javascript">
$(document).ready(function() {

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
			activo_fisico_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Activo Físico'
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
			problema: {
				message: 'El Problema no es válido',
				validators: {	
					notEmpty: {
						message: 'El Problema no puede ser vacío.'
					},												
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
								message: 'Ingrese un problema válido.'
							}
						}
					},	
					causa: {
						message: 'La Causa no es válida',
						validators: {	
							notEmpty: {
								message: 'La Causa no puede ser vacía.'
							},												
									regexp: {
										regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
										message: 'Ingrese una Causa válida.'
									}
								}
							},
							solucion: {
								message: 'La Solución no es válido',
								validators: {												
											regexp: {
												regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
												message: 'Ingrese una Solución válida.'
											}
										}
									},
		}
	});
});
</script>


</body>
</html>