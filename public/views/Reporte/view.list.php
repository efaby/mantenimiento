<?php $title = "Ordenes de Trabajo";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Reporte Matenimientos Preventivos</h1>
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
		    <th>Activo Físico</th>
		    <th>Orden</th>
		    <th>Tiempo Mantenimiento</th>
		    <th>Técnico</th>
		    <th>Fecha Mantenimiento</th>
		    <th>Tiempo Uso</th>
		    <th style="text-align: center; ">Acciones</th>
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {
    		
    		echo "<tr><td>".$item->id."</td>";
    		echo "<td>".$item->laboratorio."</td>";
    		echo "<td>".$item->maquina."</td>";
    		echo "<td>".$item->tarea."</td>";    
    		echo "<td>".$item->tiempo_ejecucion."</td>";
    		echo "<td>".$item->nombres." ".$item->apellidos."</td>";
    		echo "<td>".$item->fecha_atencion."</td>";
    		echo "<td>".$item->horas_totales."</td>";   		
    		echo "<td align='center'>						
		    		<a href='javascript: loadModal(".$item->id.")' class='btn btn-info btn-sm' title='Ver Orden' ><i class='fa fa-info-circle'></i></td>";
    	}?>
    </tbody>
    </table>
</div>
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 700px;">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Orden de Trabajo</h3>
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
		$('.modal-body').load('../ver/' + id,function(result){
		    $('#confirm-submit').modal({show:true});
		});
	}

	
</script>

</body>
</html>