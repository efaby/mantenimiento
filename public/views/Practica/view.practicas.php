<?php $title = "Practicas";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Mis Prácticas</h1>
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
		    <th>Práctica</th>	
		    <th>Fecha de Práctica</th>
		    <th>Tiempo (Horas)</th>	 
		    <th>Ejecutado (Horas)</th>	    
		    <th>Nota</th>
		    <th style="text-align: center; ">Acciones</th>
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {   		
    		$date = new DateTime($item->fecha ." ".$item->hora_inicio);
    		$inicio = $date->getTimestamp();
    		$date = new DateTime($item->fecha ." ".$item->hora_fin);
    		$fin = $date->getTimestamp();
    		$date = new DateTime();
    		$hoy = $date->getTimestamp();
    		$disabled = 'disabled';
    		if($inicio<= $hoy && $hoy <= $fin){
    			$disabled = '';
    		}
    		if($item->ejecutado == 1){
    			$disabled = 'disabled';
    		}
    		echo "<tr><td>".$item->id."</td>";   		
    		echo "<td>".$item->laboratorio."</td>";
    		echo "<td>".$item->maquina."</td>"; 
    		echo "<td>".$item->nombre."</td>";
    		echo "<td>".$item->fecha." De ".date('G:i',strtotime($item->hora_inicio))." a ".date('G:i',strtotime($item->hora_fin))."</td>";
    		echo "<td>".$item->tiempo_duracion."</td>";
    		$tiempo = is_null($item->duracion_practica)?'':date('G:i',strtotime($item->duracion_practica));
    		echo "<td>".$tiempo."</td>";
    		echo "<td>".$item->nota_practica."</td>";
    		echo "<td align='center'>
				<a href='../ejecutar/".$item->id."' class='btn btn-warning btn-sm ".$disabled."' title='Ejecutar Práctica' ><i class='fa fa-pencil'></i></a>
		    		<a href='javascript: loadModal(".$item->id.")' class='btn btn-info btn-sm' title='Ver Práctica' ><i class='fa fa-info-circle'></i></td>";
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
				<h3>Práctica</h3>
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

<script type="text/javascript">

	function loadModal(id){
		$('.modal-body').load('../ver/' + id,function(result){
		    $('#confirm-submit').modal({show:true});
		});
	}

	
</script>


</body>
</html>