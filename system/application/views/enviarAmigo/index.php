   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="http://isadorabeans.com/" />
<link href="css/contacto.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="js/mootools-core.js"></script>
<script type='text/javascript' src="js/mootools-more.js"></script>

<style type="text/css">
.colum_left {
    background:transparent url("images/recetas/bg-send.png") no-repeat scroll 0 22px;
    float: left;
    height: 626px;
    width: 636px;
}
.colum_left .filtersBox {
    padding-top: 41px;
}
.divError {;
    margin: 27px auto auto;
}
.selectdBox .textarea, .selectdBox .zipcode {
    font-family: arial;
}
</style>
</head>

<body> 
<form name="frmContacto" id="frmContacto" method="post" action="">
        <div class="colum_left">
        	<div class="filtersBox">
            <div style="width:311px;height:68px;background:transparent url('images/recetas/title-send-<?php echo ($this->lang->line('subfijo')=='eng'?'2':'1'); ?>.png') no-repeat scroll 0 0;position:absolute;top:-11px;left:27px;"></div>
           <!--<img src="images/submenu_distribuidores.png" />-->
           <div class="divError" id="divError"></div>
			<div class="filters">
            		<div class="top"></div>
                    <div class="selectdBox"><input type="text" value="<?=$this->lang->line('contacto_nombre')?>" onfocus="this.value='';" onblur="this.value=(this.value==''?'<?=$this->lang->line('contacto_nombre')?>':this.value)" class="zipcode" name="nombre" id="nombre"/> </div>
                    <div class="clear"></div>
                    <div class="selectdBox"><input type="text" value="<?=$this->lang->line('contacto_apellido')?>" onfocus="this.value='';" onblur="this.value=(this.value==''?'<?=$this->lang->line('contacto_apellido')?>':this.value)"  class="zipcode" name="apellido" id="apellido"/> </div>
                    <div class="clear"></div>
                    <div class="selectdBox"><input type="text" value="<?=$this->lang->line('contacto_email_1')?>" onfocus="this.value='';" onblur="this.value=(this.value==''?'<?=$this->lang->line('contacto_email_1')?>':this.value)"  class="zipcode" name="email" id="email"/> </div>
                    <div class="clear"></div>
                    <div class="selectdBox"><input type="text" value="<?=$this->lang->line('contacto_email_2')?>" onfocus="this.value='';" onblur="this.value=(this.value==''?'<?=$this->lang->line('contacto_email_2')?>':this.value)"  class="zipcode" name="email_dest" id="email_dest"/> </div>
                    <div class="clear"></div>
                     
                   <div class="clear"></div>
                    <div class="selectdBox"><textarea onfocus="this.value='';" onblur="this.value=(this.value==''?'<?=$this->lang->line('contacto_comentarios')?>':this.value)"  rows="10" class="textarea" name="comentarios" id="comentarios"><?=$this->lang->line('contacto_comentarios')?></textarea> </div>
                    <div class="clear"></div>
                     <div class="selectdBox inputs">
                     	<div class="logo"><img src="/images/logo_footer.png" /></div>
                        <div class="texto">&nbsp;</div>
                     	<div class="txtEnviar"><input type="submit" id="btnEnviar" value="<?=$this->lang->line('contacto_boton')?>" /></div>
                     </div>
                     
                     
                </div>
            
            </div>
        </div>      
        <input type="hidden" name="img" value=""/> 
         <input type="hidden" name="titulo" value=""/> 
          <input type="hidden" name="receta" value=""/>  
          <input type="hidden" name="idioma" value="<?php echo $this->lang->line('subfijo'); ?>" />
          <input type="hidden" name="curURL" value=""  />
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
			else if($('email_dest').get('value')=='')
			{
				$('divError').set('html','El campo email destinatario es obligatorio');
				$('divError').setStyle('display','block');
			}
			else if($('comentarios').get('value')=='')
			{
				$('divError').set('html','El campo comentarios es obligatorio');
				$('divError').setStyle('display','block');
			}
			else
			{					
			    document.frmContacto.img.value = window.parent.document.getElementById('fragment-img').value;
				document.frmContacto.titulo.value = window.parent.document.getElementById('fragment-titulo').value;
				document.frmContacto.receta.value = window.parent.document.getElementById('fragment-receta').value;	
				document.frmContacto.curURL.value = window.parent.document.getElementById('fragment-url').value;
				new Request.HTML({
					method		: 'post', 
					url			: 'enviarAmigo/enviar/',
					data		: $('frmContacto').toQueryString(),
					onComplete	: function(responseTree, responseElements, responseHTML, responseJavaScript)
					{
						$('divError').set('html','<?php echo ($this->lang->line('subfijo')=='eng'?'Thank you your recipe has been sent.':'Gracias, tu receta ha sido enviada.'); ?>');
						$('divError').setStyle('display','block');
					}
				}).send();
			}
			
});
</script>
   
