	<div class="row">
	<ul>
	<?php foreach ($docentes as $item):?>
	<li>
		<label class="control-label"><?php echo $item->nombres." ".$item->apellidos;?></label>	  	
	</li>	
	<?php endforeach;?>
	</ul>
	</div>