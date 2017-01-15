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



	
	
	<div class="form-group col-sm-12">
	<div class="form-group  col-sm-6">
		<label class="control-label">Detalle de la Novedad</label>
		<textarea name='descripcion' id='descripcion' class='form-control' rows="15" ></textarea>	
		</div>		
	</div>
	
	<div class="form-group col-sm-12">
	<input type='hidden' name='id' class='form-control' value="">
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

	
    $('#frmItem').formValidation({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {			
			
			
			descripcion: {
				message: 'El Detalle de la Novedad no es válido',
				validators: {	
					notEmpty: {
						message: 'El Detalle de la Novedad no puede ser vacío.'
					},												
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-]+$/,
								message: 'Ingrese un Detalle de Novedad válido.'
							}
						}
					},	
					
		}
	});
});
</script>


</body>
</html>