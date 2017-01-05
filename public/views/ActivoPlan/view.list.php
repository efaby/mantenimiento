<?php $title = "Grados Personal";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Planes Mantenimiento Asociados</h1>
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
<div style="width: 100%; text-align: center;">
	<h2><?php echo $activo->nombre;?></h2>
</div>

	<div class="col-lg-12">
		<button class="btn btn-primary" id="modalOpen1" onclick="javascript: loadModal('<?php echo  $activo->id.'-0';?>')">
			<i class="glyphicon glyphicon-plus"></i> Nuevo
		</button>
	</div>
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
	    <tr>
	    	<th>ID</th>
		    <th>Plan</th>		    
		    <th>Frecuencia Mantenimiento</th>
		    <th>Alerta Mantenimiento</th>
		    <th>Horas Operando</th>
		     <th>Desde</th>
		    <th style="text-align: center; width: 20%">Acciones</th>
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {
    		echo "<tr><td>".$item->id."</td>";
    		echo "<td>".$item->tarea."</td>";    		 
    		echo "<td> Cada ".$item->frecuencia_numero." ".$item->frecuencia."</td>";
    		$antes = ($item->frecuencia_id==1)?'Hora(s) Antes':'Día(s) antes';
    		echo "<td> Cada ".$item->alerta_numero." ".$antes."</td>";
    		echo "<td>".$item->horas_operacion."</td>";
    		echo "<td>".$item->fecha_inicio."</td>";
    		$id = $activo->id."-".$item->id;
    		echo "<td align='center'><a href='javascript: loadModal(\"".$id."\")' class='btn btn-warning btn-sm' title='Editar' ><i class='fa fa-pencil'></i></a>
					  <a href='javascript:if(confirm(\"Está seguro que desea eliminar el elemento seleccionado?\")){redirect(\"".$id."\");}' class='btn btn-danger btn-sm' title='Eliminar'><i class='fa fa-trash'></i></a></td>";
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
				<h3>Plan Activo</h3>
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