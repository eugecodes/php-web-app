<!-- GET POP -->
	function getPop(ruta)
	{
		var a = new Element('a', {
			href	: ruta,
			rel		: 'popsCenter'
		});

		myCore.loadPop(a,a.get('href'),'');
	}
	
	
	
<!-- RELOAD GRID -->
	function reloadGrid()
	{
		myCore.closePop();
		datagrid.refresh();
	}



<!-- enabledChars (evento, 'num|car|num_car'... -->
	function enabledChars(event, enabled) {
		// Variables que definen los caracteres enabled
		var numeros = "0123456789";
		var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
		var numeros_caracteres = numeros + caracteres;
		var teclas_especiales = [8, 37, 39, 46];
		// 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
		
		// Seleccionar los caracteres a partir del parámetro de la función
		switch(enabled) {
			case 'num':
			  enabled = numeros;
			break;
			case 'car':
			  enabled = caracteres;
			break;
			case 'num_car':
			  enabled = numeros_caracteres;
			break;
		}
		
		// Obtener la tecla pulsada 
		var evento = event || window.event;
		var codigoCaracter = evento.charCode || evento.keyCode;
		var caracter = String.fromCharCode(codigoCaracter);
		
		// Comprobar si la tecla pulsada es alguna de las teclas especiales
		// (teclas de borrado y flechas horizontales)
		var tecla_especial = false;
		for(var i in teclas_especiales) {
		if(codigoCaracter == teclas_especiales[i]) {
		  tecla_especial = true;
		  break;
		}
		}
		
		// Comprobar si la tecla pulsada se encuentra en los caracteres enabled
		// o si es una tecla especial
		return enabled.indexOf(caracter) != -1 || tecla_especial;
	}
	
	
	
<!-- FAKE RADIOS -->
	function niceRad(rad,value,field)
	{
		$$('.niceRad').each(function(rad){
			rad.removeClass('active');
		});
		if(rad.hasClass('active'))
			rad.removeClass('active');
		else
			rad.addClass('active');
			
		$(field).set('value',value);
	}
	
window.addEvent('domready', function() 
{
    $('changeEng').addEvent('click',function(event)
	{
		event.preventDefault();
		$('hdnIdioma')	.set('value','english');
		$('frmIdioma').submit();
	});
	
	 $('changeEsp').addEvent('click',function(event)
	{
		event.preventDefault();
		$('hdnIdioma')	.set('value','spanish');
		$('frmIdioma').submit();
	});
	
	  $$('.abrirContacto').addEvent('click',function(event)
	  {
		  event.preventDefault();
		  SqueezeBox.open('http://isadorabeans.com/contacto',{handler: 'iframe',size:{x:658, y:586}, marginInner: {x: 0, y: 0}});
	  });
	  
	  $$('.abrirpromocion').addEvent('click',function()
			  {
				  SqueezeBox.open('http://isadorabeans.com/promociones',{
					  size:{x:482, y:302},
					  marginInner: {x: 0, y: 0}
				  });
	  });
	  
});
