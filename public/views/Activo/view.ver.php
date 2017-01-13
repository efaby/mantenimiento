	<div class="row">
	<ul>
	<?php foreach ($laboratorios as $item):?>
	<li>
		<label class="control-label"><?php echo $item->nombre;?></label>		
	</li>	
	<?php endforeach;?>
	</ul>
	</div>