<?php $title = "Mantenimiento Correctivo";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Novedades</h1>
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

	<table class="table table-striped table-bordered table-hover" id="dataTables-example1">
    <thead>
	    <tr>
	    	<th style="width: 5%">ID</th>		   
		    
		    <th style="width: 25%">Tecnico</th>
		    <th style="width: 10%">Fecha</th>	
		    <th>Novedad</th>
		   
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {
    		$usuario = ($item->es_estudiante)?"Estudiante":"Técnico";
    		echo "<tr><td>".$item->id."</td>";    		
    		
    		echo "<td>".$item->nombres. " ".$item->apellidos."</td>";    		
    		echo "<td>".$item->fechas."</td>";
    		echo "<td>".$item->descripcion."</td>";
    		
    	}?>
    </tbody>
    </table>
</div>

<div class="modal fade" id="atenderNovedad" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 700px;">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3 id="titles"></h3>
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
$(document).ready(function() {
    $('#dataTables-example1').DataTable({
    	 	order: [[ 0, "desc" ]],
            responsive: true,
            lengthChange: false,
            // iDisplayLength: 2,
            info: false,
            oLanguage: {
           	sProcessing:     "Procesando...",
            sLengthMenu:     "Mostrar _MENU_ registros",
            sZeroRecords:    "No se encontraron resultados",
            sEmptyTable:     "Ningún dato disponible en esta tabla",
            sInfo:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered:   "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix:    "",
            sSearch:         "Buscar:",
            sUrl:            "",
            sInfoThousands:  ",",
            sLoadingRecords: "Cargando...",
           
            oPaginate: {
            sFirst:    "Primero",
            sLast:     "Último",
            sNext:     "Siguiente",
            sPrevious: "Anterior"
            },
    fnInfoCallback: null,
            }
    });
});
</script>

</body>
</html>