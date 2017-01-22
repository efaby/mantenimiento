<?php $title = "Activos";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Documentos a Generar</h1>
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

	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
	    <tr>
	    	<th>ID</th>
		    <th>Laboratorio</th>
		    <th>Nombre Activo</th>
		    <th style="text-align: center; width: 20%">Acciones</th>
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {
    		echo "<tr><td>".$item->id."</td>";
    		echo "<td>".$item->laboratorio."</td>";
    		echo "<td>".$item->nombre_activo."</td>";  		
    		echo "<td align='center'>
				<a href='../general/".$item->id."' class='btn btn-info btn-sm' title='FICHA TÉCNICA' ><i class='fa fa-file-pdf-o'></i></a>
				<a href='../planes/".$item->id."' class='btn btn-info btn-sm' title='PLANES DE MANTENIMENTO EQUIPO/INSTALACIONES' ><i class='fa fa-file-pdf-o'></i></a>
				<a href='javascript: loadModal(".$item->id.")' class='btn btn-info btn-sm' title='GUÍA DE PRÁCTICAS' ><i class='fa fa-file-pdf-o'></i></a>
				<a href='../downloadFile/".$item->diagram_proceso_url."' class='btn btn-info btn-sm' title='FLUJO DE OPERACIÓN' ><i class='fa fa-file-pdf-o'></i></a>				
				</td>";
    	}?>
    </tbody>
    </table>
</div>
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 450px;">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Prácticas</h3>
			</div>

			<div class="modal-body"></div>

		</div>

	</div>
</div>
<?php include_once PATH_TEMPLATE.'/footer.php';?>   
<link href="<?php echo PATH_CSS; ?>/dataTables.bootstrap.css" rel="stylesheet">
<script src="<?php echo PATH_JS; ?>/jquery.dataTables.min.js"></script>
<script src="<?php echo PATH_JS; ?>/dataTables.bootstrap.min.js"></script>
<script src="<?php echo PATH_JS; ?>/table.js"></script>
<script src="<?php echo PATH_JS; ?>/formValidation.js"></script>
<script src="<?php echo PATH_JS; ?>/bootstrap.js"></script>
<script src="<?php echo PATH_JS; ?>/currentList.js"></script>
<link href="<?php echo PATH_CSS; ?>/bootstrapValidator.min.css" rel="stylesheet">

<script type="text/javascript">

	function loadModal(id){
		$('.modal-body').load('../../Reporte/practicas/' + id,function(result){
		    $('#confirm-submit').modal({show:true});
		});
	}

	
</script>

</body>
</html>