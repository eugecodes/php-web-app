			<div class="prodBox">
       	    	<img src="/files/productos/<?=$producto->id?>_front.png" alt="<?=$producto['nombre_'.$this->lang->line('db')]?>" width="329" height="436" border="0" usemap="#imagenProductoMap" id="imagenProducto" />
                <map name="imagenProductoMap" id="imagenProductoMap">
                  <area shape="rect" coords="263,223,327,269" href="#" id="verVuelta" />
                  <area shape="rect" coords="263,277,327,326" href="#" id="verZoomFrente"/>
                </map> 
                <img src="/files/productos/<?=$producto->id?>_back.png" id="imagenProductoBack" style="display:none" width="329" height="436" alt="<?=$producto['nombre_'.$this->lang->line('db')]?>" usemap="#imagenProductoBackMap" /> 
                 <map name="imagenProductoBackMap" id="imagenProductoBackMap">
                  <area shape="rect" coords="263,223,327,269" href="#" id="verFrente" />
                  <area shape="rect" coords="263,277,327,326" href="#" id="verZoomVuelta"/>
                </map> 
</div>
            <div class="dataBox">
                <div class="topBox">
                    <ul>
                        <li class="about"><a href="/" id="menuAcerca"><img src="images/about_this_<?=$this->lang->line('db')?>.png" width="114" height="42" alt="Acerca de este producto" /></a></li>
                        <li class="nutri"><a href="/" id="menuNutricion"><img src="images/datos_de_nutricion_<?=$this->lang->line('db')?>.png" width="100" height="42" alt="Datos de Nutrición" /></a></li>
                        <li class="fb"></li>
                        <li class="cnt"><a href="" class="abrirContacto"><img src="images/contact.png" width="32" height="24" alt="Contacto" /></a></li>
                    </ul>
                </div>
              <div class="contentData">
                    <div id='mycustomscroll2' >
                	<div class="slider">
                        	<h2><?=$producto['nombre_'.$this->lang->line('db')]?></h2>
                            <?=$producto['descripcion_'.$this->lang->line('db')]?>
                    </div>   
                   </div>   
              </div>
</div>
      <div class="prodBoxList">
            	<ul>
                	<? foreach($restantes as $pr){?>
                	<li><a href="/productos/index/<?=$pr->id?>"><img src="images/productos/<?=$pr->id?>.png"/><span><?=$pr['nombre_'.$this->lang->line('db')]?></span></a></li>
                    <? }?>
                </ul>
       		</div>
           <div id="temp" style="display:none"><h2><?=$producto['nombre_'.$this->lang->line('db')]?></h2> <?=$producto['descripcion_'.$this->lang->line('db')]?></div>
<script>
var path_img = '';
$(window).addEvent('domready',function()
{
	path_img = '/files/productos/big/<?=$producto->id?>_back_big.png';
	var htmlNutricion='<h2><?=$producto['nombre_'.$this->lang->line('db')]?></h2><img src="/files/productos/big/<?=$producto->id?>_back_big.png" width="329" height="436" alt="<?=$producto['nombre_'.$this->lang->line('db')]?>" /> ';	
	$('menuAcerca').addEvent('click',function(event)
	{
			event.preventDefault();
			
			$$('.slider').set('html',$('temp').get('html'));
	});
	
	$('menuNutricion').addEvent('click',function(event)
	{
			event.preventDefault();
			
			SqueezeBox.open(path_img);
			//$$('.slider').set('html',htmlNutricion);
	});
	
	
	$('verVuelta').addEvent('click',function(event)
	{
		event.preventDefault();
		$('imagenProducto').setStyle('display','none');
		$('imagenProductoBack').setStyle('display','block');
	});
	
	$('verZoomFrente').addEvent('click',function(event)
	{
		event.preventDefault();
		SqueezeBox.open('/files/productos/big/<?=$producto->id?>_front_big.png');
	});
	
	
	$('verFrente').addEvent('click',function(event)
	{
		event.preventDefault();
		$('imagenProducto').setStyle('display','block');
		$('imagenProductoBack').setStyle('display','none');
	});
	
	$('verZoomVuelta').addEvent('click',function(event)
	{
		event.preventDefault();
		SqueezeBox.open('/files/productos/big/<?=$producto->id?>_back_big_old.png');
	});	
	

});
	
</script>