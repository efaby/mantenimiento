<?php $title = "Ejecutar Practica";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Ejecución de Práctica</h1>
   	</div>
</div>

<div class="row">
<div class="form-group  col-sm-6">

		<label class="control-label">Práctica</label>
		<div id="texto"> <?php echo $item->nombre; ?></div>
		<label class="control-label">Laboratorio</label>
		<div id="texto"> <?php echo $item->laboratorio; ?></div>
		<label class="control-label">Activo Físico</label>
		<div id="texto"> <?php echo $item->maquina; ?></div>
		<label class="control-label">Fecha de Práctica</label>
		<div id="texto"> <?php echo $item->fecha; ?></div>
		<label class="control-label">Hora de la practica</label>
		<div id="texto"> <?php echo date('G:i',strtotime($item->hora_inicio))." a ".date('G:i',strtotime($item->hora_fin)); ?></div>
		<label class="control-label">Tiempo Estimado (Horas)</label>
		<div id="texto"> <?php echo $item->tiempo_duracion; ?></div>
	</div>
	<div class="form-group  col-sm-6">
	<?php if($item->ejecutado == 0): ?>
		<div id="timer">
	            <div class="container1">
	                <div id="hour">00</div>
	                <div class="divider">:</div>
	                <div id="minute">00</div>
	                <div class="divider">:</div>
	                <div id="second">00</div>                
	            </div>
	            <button id="btn-comenzar">Comenzar</button>
	        </div>
	      <?php else: ?> 
	       <h2>La Práctica ya se encuentra ejecutada</h2>
	        <?php endif;?>
	</div>
	
	<div class="form-group  col-sm-12">
	
	<embed src="<?php echo PATH_JS."/../files/practicas/".$item->url;?>" type="application/pdf" width="100%" height="600"></embed>
	</div>
</div>




<?php include_once PATH_TEMPLATE.'/footer.php';?>   
<script src="<?php echo PATH_JS; ?>/formValidation.js"></script>
<script src="<?php echo PATH_JS; ?>/bootstrap.js"></script>
<link href="<?php echo PATH_CSS; ?>/bootstrapValidator.min.css" rel="stylesheet">
<style>
body{background:#ddd;font-family:Open Sans;}

#timer{margin:30px auto 0;width:400px;}
#timer .container1{display:table;background:#777;color:#eee;font-weight:bold;width:100%;text-align:center;text-shadow:1px 1px 4px #999;}
#timer .container1 div{display:table-cell;font-size:60px;padding:10px;width:20px;}
#timer .container1 .divider{width:10px;color:#ddd;}
#btn-comenzar{box-sizing:border-box;background:#eee;border:none;margin:0 auto;padding:20px;width:100%;font-size:30px;color:#777;}
#btn-comenzar:hover{background:#fff;}

</style>
<script type="text/javascript">
function loadModal(){	
	    $('#confirm-submit').modal({show:true});
}
$(document).ready(function(){

    var tiempo = {
        hora: 0,
        minuto: 0,
        segundo: 0
    };

    var tiempo_corriendo = null;

    $("#btn-comenzar").click(function(){
        if ( $(this).text() != 'Finalizar' )
        {
            $(this).text('Finalizar');                        
            tiempo_corriendo = setInterval(function(){
                // Segundos
                tiempo.segundo++;
                if(tiempo.segundo >= 60)
                {
                    tiempo.segundo = 0;
                    tiempo.minuto++;
                }      

                // Minutos
                if(tiempo.minuto >= 60)
                {
                    tiempo.minuto = 0;
                    tiempo.hora++;
                }

                $("#hour").text(tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora);
                $("#minute").text(tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto);
                $("#second").text(tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo);
            }, 1000);
        }
        else 
        {
            $(this).text('Seguir');
            clearInterval(tiempo_corriendo);
            $('#duracion_practica').val($("#hour").text()+':'+$("#minute").text()+':'+ $("#second").text());
            $
            loadModal();
        }
    })
})

</script>
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 450px;">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Registro Práctica</h3>
			</div>

			<div class="modal-body">
			<form id="frmItem" method="post" action="../guardarPractica/" enctype="multipart/form-data">
				<div class="form-group  col-sm-12">
					<label class="control-label">Tiempo de Ejecucion</label>
					<input type='text' name='duracion_practica' id='duracion_practica' class='form-control'
						value="">			
				</div>
				
				<div class="form-group col-sm-12">
				<label class="control-label">Archivo Práctica</label> 
					<input type='file' name='url' id="url" class="file">	
			</div>
			<div class="form-group col-sm-12">
		<label class="control-label">Desea registar alguna novedad</label>
		<select id="opcion" name="opcion">
		<option value="0">No</option>
		<option value="1">Si</option>
		</select>
	</div>
			<div id="novedad" style="display: none;">
			<div class="form-group col-sm-12">
		<label class="control-label">Problema</label>
		<textarea name='problema' id='problema' class='form-control' ></textarea>	
	</div>
	
	<div class="form-group col-sm-12">
		<label class="control-label">Causa</label>
		<textarea name='causa' id='causa' class='form-control' ></textarea>		
	</div>
	
	<div class="form-group col-sm-12">
		<label class="control-label">Solución</label>
		<textarea name='solucion' id='solucion' class='form-control' ></textarea>		
	</div>
			</div>
			
				<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $practica; ?>">
	<input type='hidden' name='activo_fisico_id' class='form-control' value="<?php echo $item->maquina_id; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>
			
			</form>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#opcion').on('change', function() {
			  if( this.value == 1){
				  $('#novedad').css({ display: "block" });
				  $('#problema').val('');
				  $('#causa').val('');
			  } else {
				  $('#novedad').css({ display: "none" });
				  $('#problema').val('-');
				  $('#causa').val('-');
				  $('#frmItem').formValidation('revalidateField', 'problema');
				  $('#frmItem').formValidation('revalidateField', 'causa');
			  }
			});

		$('#frmItem').formValidation({
	    	message: 'This value is not valid',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				url: {
					validators: {
						notEmpty: {
							message: 'Seleccione un Archivo.'
						},
						file: {
		                    extension: 'pdf',
		                    message: 'Seleccione un archivo válido. (pdf)'
		                }
					}
				},
				problema: {
					message: 'El Problema no es válido',
					validators: {	
						notEmpty: {
							message: 'El Problema no puede ser vacío.'
						},												
								regexp: {
									regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
									message: 'Ingrese un problema válido.'
								}
							}
						},	
						causa: {
							message: 'La Causa no es válida',
							validators: {	
								notEmpty: {
									message: 'La Causa no puede ser vacía.'
								},												
										regexp: {
											regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
											message: 'Ingrese una Causa válida.'
										}
									}
								},
								solucion: {
									message: 'La Solución no es válido',
									validators: {												
												regexp: {
													regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
													message: 'Ingrese una Solución válida.'
												}
											}
										},
				
			}
		});


		
	});	
	</script>		
			</div>

		</div>

	</div>
</div>
</body>
</html>
