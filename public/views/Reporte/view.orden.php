<?php $title = "Evaluación de Prácticas";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Reporte de Uso de Activo Físico</h1>
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
	    	<th>Activo</th>
		    <th>Práctica</th>
		    <th>Docente</th>
		    <th>Paralelo</th>
		    <th>Estudiante</th>
		    <th>Tiempo Ejecución</th>
		    <th>Fecha</th>
		   
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {
    		echo "<tr><td>".$item->id."</td>";
    		echo "<td>".$item->laboratorio."</td>";
    		echo "<td>".$item->nombre_activo."</td>";
    		echo "<td>".$item->practica."</td>";
    		echo "<td>".$item->docente_nombre." ".$item->docente_apellido."</td>"; 
    		echo "<td>".$item->paralelo."</td>";
    		echo "<td>".$item->nombres." ".$item->apellidos."</td>";
    		echo "<td style='text-align: center;'>".date('G:i',strtotime($item->duracion_practica))."</td>";
    		echo "<td style='text-align: center;'>".$item->fecha_practica."</td>";
    		echo "</tr>";
    	}?>
    </tbody>
    </table>
</div>
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 400px;">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Evaluar Practica</h3>
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


</body>
</html>