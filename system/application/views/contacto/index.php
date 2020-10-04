   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="http://isadorabeans.com/" />
<link href="css/contacto.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="js/mootools-core.js"></script>
<script type='text/javascript' src="js/mootools-more.js"></script>
</head>

<body>
<form name="frmContacto" id="frmContacto" method="post" action="">
        <div class="colum_left">
        	<div class="filtersBox">
           <!--<img src="images/submenu_distribuidores.png" />-->
           <div class="divError" id="divError"></div>
			<div class="filters">
            		<div class="top"></div>
                    <div class="selectdBox"><input type="text" placeholder="<?=$this->lang->line('contacto_nombre')?>" class="zipcode" name="nombre" id="nombre"/> </div>
                    <div class="clear"></div>
                    <div class="selectdBox"><input type="text" placeholder="<?=$this->lang->line('contacto_apellido')?>" class="zipcode" name="apellido" id="apellido"/> </div>
                    <div class="clear"></div>
                    <div class="selectdBox"><input type="text" placeholder="<?=$this->lang->line('contacto_email')?>" class="zipcode" name="email" id="email"/> </div>
                    <div class="clear"></div>

                     <div class="selectdBox">
                            <ul class="dropDownList" style="margin-right:40px;">
                                <li><span class="selecter" id="dPaisC"><?=$this->lang->line('contacto_pais')?></span>
                                    <ul class="list" id="paisc">
                                    		<? foreach($paises as $pais){?>
                                        	<li><?=$pais->pais?></li>
                                            <? }?>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="dropDownList">
                                <li><span class="selecter"><?=$this->lang->line('contacto_ciudad')?></span>
                                    <ul class="list" id="nombre">
                                        	<li></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="clear"></div>
                     </div>
                     
                   <div class="clear"></div>
                    <div class="selectdBox"><textarea placeholder="<?=$this->lang->line('contacto_comentarios')?>" rows="10" class="textarea" name="comentarios" id="comentarios"></textarea> </div>
                    <div class="clear"></div>
                     

                      <div class="top"></div>
                     <div class="selectdBox inputs">
                     	<div class="logo"><img src="/images/logo_footer.png" /></div>
                        <div class="texto"><?=$this->lang->line('contacto_texto')?></div>
                     	<div class="txtEnviar"><input type="submit" id="btnEnviar" value="<?=$this->lang->line('contacto_boton')?>" /></div>
                     </div>
                     
                     
                </div>
            
            </div>
        </div> 
        <input type="hidden" name="pais" id="pais" value="México" />
        <input type="hidden" name="ciudad" id="ciudad" value="Guadalajara" />        
</form>        
</body>
</html>
<script>
$('btnEnviar').addEvent('click',function(event)
{
			event.preventDefault();
			
			if($('nombre').get('value')=='')
			{
				$('divError').set('html','El campo nombre es obligatorio');
				$('divError').setStyle('display','block');
			}
			else if($('apellido').get('value')=='')
			{
				$('divError').set('html','El campo apellido es obligatorio');
				$('divError').setStyle('display','block');
			}
			else if($('email').get('value')=='')
			{
				$('divError').set('html','El campo email es obligatorio');
				$('divError').setStyle('display','block');
			}
			else if($('pais').get('value')=='')
			{
				$('divError').set('html','El campo pais es obligatorio');
				$('divError').setStyle('display','block');
			}	
			else if($('ciudad').get('value')=='')
			{
				$('divError').set('html','El campo ciudad es obligatorio');
				$('divError').setStyle('display','block');
			}	
			else if($('comentarios').get('value')=='')
			{
				$('divError').set('html','El campo comentarios es obligatorio');
				$('divError').setStyle('display','block');
			}
			else
			{						
				new Request.HTML({
					method		: 'post', 
					url			: 'contacto/enviar/',
					data		: $('frmContacto').toQueryString(),
					onComplete	: function(responseTree, responseElements, responseHTML, responseJavaScript)
					{
						$('divError').set('html',responseHTML);
						$('divError').setStyle('display','block');
					}
				}).send();
			}
});

window.addEvent('domready', function() {
	
	$('dPaisC').addEvent('click',function()
	{
		$('paisc').setStyle('display','block');
	});
	
	
$$('ul.list li').addEvent('click', function(){
			
			var value = this.get('html');
			$$('ul.list').setStyle('display','none');
			this.getParent('ul').getPrevious('.selecter').set('html', value);
});
	
});
</script>
   
