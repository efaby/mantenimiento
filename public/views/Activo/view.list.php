<?php $title = "Activos";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Activos Físicos</h1>
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
	<div class="col-lg-12">
	<?php if($_SESSION['SESSION_USER']->tipo == 1){?>
		<a href="../editar/0" class="btn btn-primary" id="nuevo" >
			<i class="glyphicon glyphicon-plus"></i> Nuevo
		</a>
		<?php }?>
	</div>
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
	    <tr>
	    	<th>ID</th>
		    <th>Código</th>
		    <th>Nombre Activo</th>
		    <th>Laboratorio</th>
		    <th style="text-align: center; width: 20%">Acciones</th>
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {
    		echo "<tr><td>".$item->id."</td>";
    		echo "<td>".$item->codigo."</td>";
    		echo "<td>".$item->nombre_activo."</td>"; 
    		echo "<td>".$item->laboratorio."</td>";
    		
    		if($_SESSION['SESSION_USER']->tipo == 1){
    			echo "<td align='center'>
				<a href='../../Partes/listar/".$item->id."' class='btn btn-success btn-sm' title='Partes' ><i class='fa fa-cubes'></i></a>			
				<a href='../editar/".$item->id."' class='btn btn-warning btn-sm' title='Editar' ><i class='fa fa-pencil'></i></a>					
				<a href='javascript:if(confirm(\"Está seguro que desea eliminar el elemento seleccionado?\")){redirect(".$item->id.");}' class='btn btn-danger btn-sm' title='Eliminar'><i class='fa fa-trash'></i></a></td>";
    		} else {
    			echo "<td align='center'>				
				<a href='../../ActivoPlan/listar/".$item->id."' class='btn btn-success btn-sm' title='Planes Asociados' ><i class='fa fa-gears'></i></a>				
				</td>";
    		}
    		
    		
    		
    	}?>
    </tbody>
    </table>
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