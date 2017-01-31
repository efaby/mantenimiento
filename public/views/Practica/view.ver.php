	<div class="row">
	<div class="form-group  col-sm-12">
		<label class="control-label">Nombre</label>
		<div id="texto"> <?php echo $item->nombre; ?></div>
	</div>
		
	<div class="form-group  col-sm-12">
		<label class="control-label">Lab/CSin/Tall</label>
		<div id="texto"> <?php echo $item->laboratorio; ?></div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Activo Físico</label>
		<div id="texto"> <?php echo $item->maquina; ?></div>
	</div>	
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Fecha de Práctica</label>
		<div id="texto"> <?php echo $item->fecha; ?></div>
	</div>
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Hora de la Práctica</label>
		<div id="texto"> <?php echo date('G:i',strtotime($item->hora_inicio))." a ".date('G:i',strtotime($item->hora_fin)); ?></div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Tiempo de Duración (Horas)</label>
		<div id="texto"> <?php echo $item->tiempo_duracion; ?></div>
	</div>
	<div class="form-group col-sm-12">
		<label class="control-label">Archivo Práctica</label> 		
		<div id="texto"><a href="../downloadFile/<?php echo $item->url;?>">Descargar</a></div>			
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Tiempo Duración Práctica</label>
		<div id="texto"> <?php echo $item->duracion_practica; ?></div>
	</div>
	
	<div class="form-group  col-sm-12">
		<label class="control-label">Observaciones</label>
		<div id="texto"> <?php echo $item->observaciones; ?></div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Fecha Calificación</label>
		<div id="texto"> <?php echo $item->fecha_calificacion; ?></div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Calificación</label>
		<div id="texto"> <?php echo $item->nota_practica; ?></div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Docente</label>
		<div id="texto"> <?php echo $item->nombres." ".$item->apellidos; ?></div>
	</div>

<div class="form-group col-sm-12">
		<label class="control-label">Informe</label> 	
		<?php if(strlen($item->archivo_url)>0):?>	
			<div id="texto"><a href="../downloadFile/<?php echo $item->archivo_url;?>">Descargar</a></div>
			<?php endif;?>			
	</div>
	</div>