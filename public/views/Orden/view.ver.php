	<div class="row">
	<div class="form-group  col-sm-12">
		<label class="control-label">Activo Físico</label>
		<div id="texto"> <?php echo $item->maquina; ?></div>
	</div>
		
	<div class="form-group  col-sm-12">
		<label class="control-label">Plan Mantenimiento</label>
		<div id="texto"> <?php echo $item->tarea; ?></div>
	</div>
	<div class="form-group  col-sm-6">
		<label class="control-label">Hora Límite</label>
		<div id="texto"> <?php echo $item->frecuencia_horas; ?></div>
	</div>	
	
	<div class="form-group  col-sm-6">
		<label class="control-label">Horas Operando</label>
		<div id="texto"> <?php echo $item->horas_operacion; ?></div>
	</div>
	<div class="form-group  col-sm-6">
		<label class="control-label">Fecha Emisión</label>
		<div id="texto"> <?php echo $item->fecha_emision; ?></div>
	</div>	
	
	<div class="form-group  col-sm-6">
		<label class="control-label">Fecha Atención</label>
		<div id="texto"> <?php echo $item->fecha_atencion; ?></div>
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