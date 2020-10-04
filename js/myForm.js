//	CLASE: myForm
//	AUTOR: Oscar Adrian Lopez Macias
//	FECHA: 21/Enero/2011


	var myForm = new Class({
		
		//Form = El elemento formulario. Ej $('formulario')...
		//Mode = 'submi' || 'ajax'...
		//ocf  = On Complete Function. Se utiliza cuando es envío ajax. Ej 'miFuncion()'...
		//wcf  = While Complete Function. Se utiliza cuando es envío ajax. Ej 'miFuncion()'...
		evalForm: function(form,mode,ocf,wcf){
			
			setTimeout(function(){
				if(form)
				{
					//Genera un array de los elementos del formulario [inputs, selects, textareas, radios, checks]...
						var fieldsOnForm = form.getElements('input, select, textarea');
					
					//Agrega la clase evalForm a todos los [inputs, selects, textareas, radios, checks] del form...
						fieldsOnForm.each(function(field){
							field.addClass('evalForm')
						});
						
					//Encuentra todos los elementos con clase "evalForm" y los retomo en orden de aparición...
						var fieldsToEval = form.getElements('.evalForm');
						
					//Detiene el submit hasta que los campos sean validados...
						form.addEvent('submit',function(event){
							event.stop();
							
							var goSubmit = true;
							
							//Validaciones...
								fieldsToEval.each(function(el){
									
									//Prioridad si el campo debe ser validado con una función especial...
									if(el.get('dir') && goSubmit)
									{
										var dirfunction = el.get('dir');
										var params = dirfunction.split('(');
										var funct  = params[0];
											params = params[1].split(')');
											params = params[0];
										if(params == '')
											var fun = ''+funct+'("'+el.get('id')+'")';
										else
											var fun = ''+funct+'("'+el.get('id')+'",'+params+')';
		
										if(!eval(fun))
										{
											goSubmit = false;
										}
									}
									
									//Si el campo no tiene una validación especial...
									if(!el.get('dir') && !el.get('disabled') && goSubmit && !el.hasClass('displayNone'))
									{
										if(el.get('name'))
											var whatkind = el.get('name').toLowerCase();
		
										switch(el.get('type'))
										{
											case "text":
												if(el.get('value')=='' && goSubmit)
												{
													myCore.fxFieldError(el,'Ha olvidado completar este campo.');
													goSubmit = false;
												}
												else
												{
													if((whatkind.search('user') != '-1' || whatkind.search('usuario') != '-1' || whatkind.search('apellido') != '-1' || whatkind.search('nombre') != '-1' || whatkind.search('pass') != '-1') && goSubmit)
													{
														if(!(/^([a-zA-Z.áéíóúÁÉÍÓÚñÑ]+\s{0,1})+$/.test(el.get('value'))))
														{
															myCore.fxFieldError(el,'Escriba sólo caracteres alfabéticos, no deje más de un espacio en blanco.');
															goSubmit = false;
														}
													}
													if((whatkind.search('email') != '-1' || whatkind.search('mail') != '-1') && goSubmit)
													{
														if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(el.get('value'))))
														{
															myCore.fxFieldError(el,'El email no tiene una esctructura válida.');
															goSubmit = false;
														}
													}
													if(whatkind.search('lada') != '-1' && goSubmit)
													{
														if(!(/(^[0-9]*)+$/.test(el.get('value'))))
														{
															myCore.fxFieldError(el,'Escriba únicamente números.');
															goSubmit = false;
														}
														else if(el.get('value').length < 2)
														{
															myCore.fxFieldError(el,'Se esperan al menos dos dígitos');
															goSubmit = false;
														}
													}
													if((whatkind.search('telefono') != '-1' || whatkind.search('phonenumber') != '-1') && goSubmit)
													{
														if(!(/(^[0-9]*)+$/.test(el.get('value'))))
														{
															myCore.fxFieldError(el,'Escriba únicamente números.');
															goSubmit = false;
														}
														else if(el.get('value').length < 8)
														{
															myCore.fxFieldError(el,'Se esperan al menos ocho dígitos');
															goSubmit = false;
														}
													}
												}
											break;
											case "password":
												if(el.get('value')=='' && goSubmit)
												{
													myCore.fxFieldError(el,'Ha olvidado completar este campo.');
													goSubmit = false;
												}
												if(whatkind.search('password') != '-1' && goSubmit)
												{
													if(el.get('value').length < 5)
													{
														myCore.fxFieldError(el,'Se recomienda que la contraseña contenga al menos 5 dígitos');
														goSubmit = false;
													}
												}		
											break;
											case "select-one":
												if((el.get('value')=='' || el.get('value')=='0') && goSubmit)
												{
													myCore.fxFieldError(el,'Ha olvidado seleccionar una opci&oacute;n.');
													goSubmit = false;
												}
											break;
											case "textarea":
												if(el.get('value')=='' && goSubmit)
												{
													myCore.fxFieldError(el,'Ha olvidado completar este campo.');
													goSubmit = false;
												}
											break;
											case "checkbox":
												/*
												if(el.get('value')=='on' && goSubmit)
												{
													myCore.fxFieldError(el,'Ha olvidado seleccionar la casilla.');
													goSubmit = false;
												}
												*/
											break;
											case "radio":
												if(el.get('value')=='on' && goSubmit)
												{
													myCore.fxFieldError(el,'Ha olvidado seleccionar la casilla.');
													goSubmit = false;
												}
											break;
										}
									}
								});
								if(goSubmit == true)
								{
									switch (mode)
									{
										
										case 'ajax':
										
											if(wcf)
											eval(wcf);
											
											new Request.HTML({
												method: 'post', 
												url: form.get('action'),
												data: form.toQueryString(),
												onComplete: function(responseTree, responseElements, responseHTML, responseJavaScript)
												{
													//Javascript...
													eval(responseJavaScript);
		
													if(ocf)
													eval(ocf)
												}
											}).send();
										break;
										
										case 'submit':
											form.submit();
										break;
									}
								}
						});
				}
			},1000);
		},
		
		
		
		
		ajaxRequest: function(url,form,ocf){
				new Request.HTML({
					method	: 'post', 
					url		: url,
					data	: form,
					onComplete: function(responseTree, responseElements, responseHTML, responseJavaScript)
					{
						if(ocf)
						eval(ocf)
						
						//Javascript...
						eval(responseJavaScript);
					}
				}).send();
		}
		
	});

	var myForm = new myForm();