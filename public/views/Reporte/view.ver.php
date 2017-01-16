	<div class="row">
	<div class="form-group  col-sm-12">
		<label class="control-label">Laboratorio</label>
		<div id="texto"> <?php echo $item->laboratorio; ?></div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Activo Físico</label>
		<div id="texto"> <?php echo $item->maquina; ?></div>
	</div>
		
	<div class="form-group  col-sm-6">
		<label class="control-label">Plan Mantenimiento</label>
		<div id="texto"> <?php echo $item->tarea; ?></div>
	</div>
	<div class="form-group  col-sm-6">
		<label class="control-label">Técnico</label>
		<div id="texto"> <?php echo " Cada ".$item->nombres." ".$item->apellidos; ?></div>
	</div>	
	
	<div class="form-group  col-sm-6">
		<label class="control-label">Fecha Emisión</label>
		<div id="texto"> <?php echo $item->fecha_emision; ?></div>
	</div>	
	
	<div class="form-group  col-sm-6">
		<label class="control-label">Fecha Atención</label>
		<div id="texto"> <?php echo $item->fecha_atencion; ?></div>
	</div>
	<div class="form-group  col-sm-4">
		<label class="control-label">Frecuencia Mantenimiento</label>
		<div id="texto"> <?php echo " Cada ".$item->frecuencia_numero." ".$item->frecuencia; ?></div>
	</div>	
	
	<div class="form-group  col-sm-4">
		<label class="control-label">Horas Operación</label>
		<div id="texto"> <?php echo $item->horas_operacion; ?></div>
	</div>
	<div class="form-group  col-sm-4">
		<label class="control-label">Horas Totales Operando</label>
		<div id="texto"> <?php echo $item->horas_totales; ?></div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Tiempo ejecución</label>
		<div id="texto"> <?php echo $item->tiempo_ejecucion; ?></div>
	</div>
	<div class="form-group  col-sm-12">
		<label class="control-label">Observaciones</label>
		<div id="texto"> <?php echo $item->observacion; ?></div>
	</div>
	
	</div>