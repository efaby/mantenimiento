	<div class="row " >
	<div class="col-lg-12">
	<table class="table table-bordered">
	<?php foreach ($practicas as $item):?>
	<tr>
	<td>
		<label class="control-label"><?php echo $item->nombre;?></label>	
	</td>	
	<td width="30%"><a href='../downloadFile/<?php echo $item->url;?>'>Descargar</a></td>
	</tr>	
	<?php endforeach;?>
	</table>
	</div>
	</div>