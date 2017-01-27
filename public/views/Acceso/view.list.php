<?php $title = "Acceso";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Accesos</h1>
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
		<button class="btn btn-primary" id="modalOpen">
			<i class="glyphicon glyphicon-plus"></i> Nuevo
		</button>
	</div>
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
	    <tr>
	    	<th>ID</th>
	    	<th>Rol</th>
	    	<th>Acción</th>
		    <th>Icono</th>
		    <th>Título</th>		   
		    <th>Orden</th>
		    <th>Menú</th>
		    <th style="text-align: center;">Acciones</th>
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {
    		echo "<tr><td>".$item->id."</td>";
    		echo "<td>".$item->rol_id."</td>";
			echo "<td>".$item->accion."</td>";
    		echo "<td>".$item->icono."</td>";
    		echo "<td>".$item->titulo."</td>";
    		echo "<td>".$item->orden." </td>";
    		echo "<td>";
    		if ($item->menu==1){
    			echo "Nivel Raíz";    		
    		}else if ($item->menu==0){
    			echo "Nivel Padre";
    		}else{
    			echo "Nivel Final Padre";
    		}    	
    		echo "</td>";
    		
    		echo "<td align='center'><a href='javascript: loadModal(".$item->id.")' class='btn btn-warning btn-sm' title='Editar' ><i class='fa fa-pencil'></i></a>
					  <a href='javascript:if(confirm(\"Est\u00e1 seguro que desea eliminar el elemento seleccionado?\")){redirect(".$item->id.");}' class='btn btn-danger btn-sm' title='Eliminar'><i class='fa fa-trash'></i></a></td>";
    	}?>
    </tbody>
    </table>
</div>
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Acceso</h3>
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