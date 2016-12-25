<?php $title = "Grados Personal";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Prácticas</h1>
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
		    <th>Maquina</th>
		    <th>Usuario</th>	
		    <th>Problema</th>
		    <th style="text-align: center; width: 20%">Acciones</th>
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {
    		$usuario = ($item->es_estudiante)?"Estudiante":"Técnico";
    		echo "<tr><td>".$item->id."</td>";    		
    		echo "<td>".$item->laboratorio."</td>";
    		echo "<td>".$item->maquina."</td>";    		
    		echo "<td>".$usuario."</td>";
    		echo "<td>".substr ( $item->problema , 0 ,20 )."</td>";
    		$tecnico = ($item->tecnico_asigna > 0)?'disabled':'';
    		$repara = ($item->tecnico_repara > 0)?'disabled':'';
    		echo "<td align='center'>
				
				<a href='../ver/".$item->id."' class='btn btn-info btn-sm' title='Ver Problema' ><i class='fa fa-info-circle '></i></a>
				<a href='javascript: loadModalAction(".$item->id.",\"asignar\")' class='btn btn-warning btn-sm ".$tecnico."' title='Asignar Técnico' ><i class='fa fa-user'></i></a>
				<a href='javascript: loadModalAction(".$item->id.",\"reparar\")' class='btn btn-warning btn-sm ".$repara."' title='Atender' ><i class='fa fa-edit'></i></a>
				</td>";
    	}?>
    </tbody>
    </table>
</div>
<div class="modal fade" id="asignar" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 700px;">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Asignar Tecnico</h3>
			</div>

			<div class="modal-body"></div>

		</div>

	</div>
</div>
<div class="modal fade" id="reparar" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 700px;">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Reparar Novedad</h3>
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