<form id="frmEstudiante" method="post" action="../guardar/">
<div style="overflow: auto;">
	<div class="form-group  col-sm-6">
		<label class="control-label">Paralelo</label>
		<select class='form-control' name="paralelo_id" id="paralelo_id">
			<option value="" >Seleccione</option>
		<?php foreach ($paralelos as $dato) { ?>
			<option value="<?php echo $dato->id;?>"  <?php if(isset($item->paralelo_id)==$dato->id):echo "selected"; endif;?>><?php echo $dato->nombre;?></option>
		<?php }?>
		</select>
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Identificación</label>
		<input type='text' name='identificacion' class='form-control'
			value="<?php echo $item->identificacion; ?>" id="identificacion">
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Código</label> <input type='text'
			name='codigo' class='form-control'
			value="<?php echo $item->codigo; ?>" id="codigo">
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Nombres</label> <input type='text'
			name='nombres' class='form-control' 
			value="<?php echo $item->nombres; ?>" id="nombres">
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Apellidos</label> <input type='text'
			name='apellidos' class='form-control' 
			value="<?php echo $item->apellidos; ?>" id="apellidos">
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Email</label> <input type='text'
			name='email' class='form-control'
			value="<?php echo $item->email; ?>" id="email">
	</div>	
	<div class="form-group">
		<input type='hidden' name='id' id='id' class='form-control' value="<?php echo $item->id; ?>">		
		<button type="submit" class="btn btn-success boton" id="boton">Guardar</button>
	</div>

</form>
<script type="text/javascript">
$(document).ready(function() {

	$('#identificacion').change(function(){
	    var ci = jQuery("#identificacion").val();
	    var paralelo_id = jQuery("#paralelo_id").val();
	    if(ci.length == 10){
	    	jQuery.ajax({
		        type: "GET",
		        dataType: "json",
		        url: "../getExistEstudiante/",
		        data: {
		        	"identificacion": ci,
		        	"paralelo_id":paralelo_id
		        },
		        success:function(data) {
		        	if(data){
		        		alert("El estudiante ya esta registrado en ese paralelo.");
						jQuery("#boton").addClass('disabled');				
			        }
		        	else{
		        			jQuery("#boton").removeClass('disabled');
			        	}			    			           	
		        }
		    });
	    }
	});
	
	$('#identificacion').keyup(function(){
	    var ci = jQuery("#identificacion").val();
	    if(ci.length == 10){
	    	jQuery.ajax({
		        type: "GET",
		        dataType: "json",
		        url: "../getEstudianteByIde/",
		        data: {
		        	"identificacion": ci
		        	
		        },
		        success:function(data) {
		        	jQuery("#codigo").val('');
		        	jQuery("#nombres").val('');
		        	jQuery("#apellidos").val('');
		        	jQuery("#email").val('');
		        	jQuery("#id").val(0);
			        if(data){
			        	jQuery("#codigo").val(data.codigo);
			        	jQuery("#nombres").val(data.nombres);
			        	jQuery("#apellidos").val(data.apellidos);
			        	jQuery("#email").val(data.email);
			        	jQuery("#id").val(data.id);
			        	$('#frmEstudiante').formValidation('revalidateField', 'estudiante');			        	
			        }
		        }
		    });
	    }
	});

	$('#paralelo_id').change(function(){
	    var ci = jQuery("#identificacion").val();
	    var paralelo_id = jQuery("#paralelo_id").val();
	    if(ci.length == 10){
	    	jQuery.ajax({
		        type: "GET",
		        dataType: "json",
		        url: "../getExistEstudiante/",
		        data: {
		        	"identificacion": ci,
		        	"paralelo_id":paralelo_id
		        },
		        success:function(data) {
		        	if(data){
		        		alert("El estudiante ya esta registrado en ese paralelo.");
						jQuery("#boton").addClass('disabled');				
			        }
		        	else{
		        			jQuery("#boton").removeClass('disabled');
			        	}			    			           	
		        }
		    });
	    }
	});	

		
    $('#frmEstudiante').formValidation({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {	
			identificacion: {
				message: 'El Número de Identificación no es válido',
				validators: {
							notEmpty: {
								message: 'El Número de Identificación no puede ser vacío.'
							},					
							regexp: {
								regexp: /^(?:\+)?\d{10,13}$/,
								message: 'Ingrese un Número de Identificación válido.'
							},
				
							callback: {
					                message: 'El Número de Identificación no es válido.',
                         				callback: function (value, validator, $field) {
								    var cedula = value;
								    try {
								        array = cedula.split("");
								    }
								    catch (e) {
								        //array = null;
								    }
								    num = array.length;
								    if (num === 10) {
								        total = 0;
								        digito = (array[9] * 1);
								        for (i = 0; i < (num - 1); i++) {
								            mult = 0;
								            if ((i % 2) !== 0) {
								                total = total + (array[i] * 1);
								            } else {
								                mult = array[i] * 2;
								                if (mult > 9)
								                    total = total + (mult - 9);
								                else
								                    total = total + mult;
								            }
								        }
								        decena = total / 10;
								        decena = Math.floor(decena);
								        decena = (decena + 1) * 10;
								        final = (decena - total);
								        if ((final === 10 && digito === 0) || (final === digito)) {
								
								            return true;
								        } else {
								
								            return false;
								        }
								    } else {
								
								        return false;
								    }
								}
								}
						}
					},
							
			codigo: {
				message: 'El Código no es válido',
				validators: {
							notEmpty: {
								message: 'El Código no puede ser vacío.'
							},
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.\,\_\-]+$/,
								message: 'Ingrese un Código válido.'
							}
						}
					},

			nombres: {
						message: 'El Nombre no es válido',
						validators: {
									notEmpty: {
										message: 'El Nombre no puede ser vacío.'
									},
									regexp: {
										regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
										message: 'Ingrese un Nombre válido.'
									}
								}
							},
			apellidos: {
						message: 'El Apellido no es válido',
						validators: {
										notEmpty: {
										message: 'El Apellido no puede ser vacío.'
									},
									regexp: {
										regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
										message: 'Ingrese un Apellido válido.'
									}
								}
						},
					
			email: {
				message: 'El email no es válida',
				validators: {
					notEmpty: {
						message: 'El Email no puede ser vacío.'
					},	
					regexp: {
						regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
						message: 'Ingrese un email válido.'
					}
				}
			},
			paralelo_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Paralelo'
					}
				}
			},
			
		}
	});
});
</script>
<style>
<style>
.boton {
	margin-left: 15px;
}
</style>