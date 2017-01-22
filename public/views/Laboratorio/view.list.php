<?php $title = "Laboratorios";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Laboratorio/Centro de Simulación/Talleres</h1>
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
	<div class="col-lg-6">
		<a href="../editar/0" class="btn btn-primary" id="nuevo" >
			<i class="glyphicon glyphicon-plus"></i> Nuevo
		</a>
	</div>
	<div class="col-lg-6" style="text-align: right; margin-bottom: 10px;">
		<a href="../../Documento/labByTecnico/" target='_blank' class="btn btn-info btn-sm" title='INVENTARIO DE LABORATORIO/CENTRO DE SIMULACION/TALLER' >
			<i class='fa fa-file-pdf-o'></i>
			</a>
	</div>
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
	    <tr>
	    	<th>ID</th>
		    <th>Código</th>
		    <th>Laboratorio</th>
		        
		    <th style="text-align: center; width: 20%">Acciones</th>
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {
    		echo "<tr><td>".$item->id."</td>";
    		echo "<td>".$item->codigo."</td>";
    		echo "<td>".$item->nombre."</td>";  		
    		
    		echo "<td align='center'>
				<a href='../../Documento/general_laboratorio/".$item->id."' target='_blank' class='btn btn-info btn-sm' title='NORMATIVA/SEGURIDAD' ><i class='fa fa-file-pdf-o'></i></a>
    			<a href='../../Documento/laboratorios/".$item->id."' target='_blank' class='btn btn-info btn-sm' title='ACTIVOS' ><i class='fa fa-file-pdf-o'></i></a>
				<a href='javascript: loadModal(".$item->id.")' class='btn btn-info btn-sm' title='Docentes' ><i class='fa fa-users'></i></a>
				<a href='../editar/".$item->id."' class='btn btn-warning btn-sm' title='Editar' ><i class='fa fa-pencil'></i></a>
				<a href='javascript:if(confirm(\"Está seguro que desea eliminar el elemento seleccionado?\")){redirect(".$item->id.");}' class='btn btn-danger btn-sm' title='Eliminar'><i class='fa fa-trash'></i></a></td>";
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
				<h3>Docentes</h3>
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