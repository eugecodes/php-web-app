<?php 
	/*
		Autor:         Oscar Adrián López Macías.
		Fecha:         22 de Marzo de 2011.
		Documentación: 
			$NombreId: 
				El nombe y el id que serán aplicados al input text.
			$Cssclase:
				La clase css que rige al campo. Esto nos permite tener "sugeridores" con la apariencia que deseemos.
			$Controlador:
				La ruta al controlador que consultará. De esta manera el sugeridor puede funcionar con cualquier modelo.
				En nuestro controlador, la vista de respuesta determina cómo se puede ver el listado de sugerencias, manejarlo
				de esta manera nos permite darle libertad a diseño. 
	*/
	function suggestMe($NombreId,$Cssclase,$Controlador){ 
?>
	<input type="text" id="<?=$NombreId?>" class="<?=$Cssclase?>" autocomplete="off" name="<?=$NombreId?>">
	<script>
		$('<?=$NombreId?>').addEvent('keyup',function(){
			if(this.get('value').length == 3)
			{
				var input = this; //Esto hace referencia al input...
				
				var suggestpos = this.getCoordinates(); //Obtiene las coordenadas del campos. Sirve para después ubicar la respuesta.
				
				$$('.autosuggest').setStyles({
					'top'		: suggestpos.top + suggestpos.height,
					'left'		: suggestpos.left,
					'display'	: 'block'
				}); //Posiciona la respuesta de acuerdo al input y cambia su diplay a block.
				
				$$('.autosuggest ul.suggestBox').set('html','<li class="suggestItem"><img src="images/ajax-loader-inputs.gif" align="absmiddle"/> Espere un momento...</li>'); //Mensaje de espera en tanto encuentra coincidencias
				
				var req = new Request({
					method: 	'post',
					url: 		'<?=$Controlador?>', //Aquí se consulta al controlador enviado en la variable $Controlador...
					data: 		'key='+this.get('value'), //Se envía la palabra clave...
					onSuccess: 	function(res){		
										
						$$('.autosuggest ul.suggestBox').set('html',res); //Inserta la vista de respuesta en el sugeridor...
						$$('.autosuggest').fade('in');	//Aplica un efecto de "aparición" al sugeridor (esto es estético)...	
													
						$$('.autosuggest ul.suggestBox li').addEvent('click',function(){ //Al click sobre uno de los elementos li del sugeridor transfiere su contenido html al input...
							if(this.get('title')) 
							{
								var stringxpd = this.get('title').split(',');
								var pais	  = stringxpd[0];
								var estado	  = stringxpd[1];
								var ciudad	  = stringxpd[2];
								
								input.getNext('.pais').set('value',pais);
								input.getNext('.estado').set('value',estado);
								input.getNext('.ciudad').set('value',ciudad);
							}
							/*
								El fragmento de código anterior está pensado para los sugeridores de ciudades.
								Cuando se sugiere una ciudad normalmente se espera que al seleccionar una opción
								el sugeridor transfiera el valor de la ciudad, además del estado y país al que pertenece,
								por esta razón, los id´s se encuentran implícitos en el title de los li. De esta manera
								con el manejador de DOM de mootools accedemos a estos id´s y los transferimos como valor a campos
								ocultos.
							*/
							input.set('value',this.get('html')); //Transfiere el contenido html del li seleccionado al input.
							
							$$('.autosuggest').fade('out');	 //Efecto fade out para el sugeridor una vez que se se selecciona una opción...
							
							$$('.autosuggest ul.suggestBox').set('html','<li class="suggestItem"><img src="images/ajax-loader-inputs.gif" align="absmiddle"/> Espere un momento...</li>');	//Devuelve el valor inicial al sugeridor...
						});
					}
				}).send();	
			}
			
			if(this.get('value').length == 0)
			{
				$$('.autosuggest').fade('out'); //Si la longitud del texto en el campo es 0 desaparece el sugeridor...
				$$('.autosuggest ul.suggestBox').set('html','<li class="suggestItem"><img src="images/ajax-loader-inputs.gif" align="absmiddle"/> Espere un momento...</li>');	//Devuelve el valor inicial al sugeridor...
			}
			
			if(this.get('value').length > 3)
			{
				var stringkey = this.get('value').toLowerCase();//Transforma el valor del input a minúsculas para poder comparar en un ambiente controlado...
				
				/*
				  En este fragmento de código mootools navega el árbol de elementos para obtener su
				  contenido html, el contenido de texto es modificado a minúsculas para hacerlo coincidir 
				  con el contenido transformado del input en el paso anterior.
				  Todos los li´s cuyo contenido html NO sea conicidente con el valor del input será ocultado.
				  Manejar una búsqueda en el html de esta manera nos permite realizar búsquedas más rápidas
				  sin tener que re-consultar la base de datos. 
				*/
				$$('.autosuggest ul.suggestBox li').each(function(li){
					var livalue = li.get('html').toLowerCase();
					if(livalue.search(stringkey) == '-1')
						li.setStyle('display','none');
					else
						li.setStyle('display','block');	
				});
			}
		});
	</script>

<?php } ?>