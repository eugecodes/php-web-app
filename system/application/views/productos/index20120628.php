			<div class="prodBox">
       	    	<img src="/files/productos/<?=$producto->id?>_front.png" id="imagenProducto" width="329" height="436" alt="<?=$producto['nombre_'.$this->lang->line('db')]?>" /> 
                <img src="/files/productos/<?=$producto->id?>_back.png" id="imagenProductoBack" style="display:none" width="329" height="436" alt="<?=$producto['nombre_'.$this->lang->line('db')]?>" /> 
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

$(window).addEvent('domready',function()
{
	var htmlNutricion='<h2><?=$producto['nombre_'.$this->lang->line('db')]?></h2><img src="/files/productos/big/<?=$producto->id?>_back_big.png" width="329" height="436" alt="<?=$producto['nombre_'.$this->lang->line('db')]?>" /> ';	
	$('menuAcerca').addEvent('click',function(event)
	{
			event.preventDefault();
			
			$$('.slider').set('html',$('temp').get('html'));
	});
	
	$('menuNutricion').addEvent('click',function(event)
	{
			event.preventDefault();
			$$('.slider').set('html',htmlNutricion);
	})
	
	
	$('imagenProducto').addEvent('click',function(event){
		
			if(event.page.x>446 && event.page.x<494 && event.page.y>418 && event.page.y<457)
			{	
				$('imagenProducto').setStyle('display','none');
				$('imagenProductoBack').setStyle('display','block');
			}		
			if(event.page.x>446 && event.page.x<494 && event.page.y>464 && event.page.y<501)
			{
				SqueezeBox.open('/files/productos/big/<?=$producto->id?>_front_big.png');
			}
	});
	
	$('imagenProductoBack').addEvent('click',function(event){
		
			if(event.page.x>446 && event.page.x<494 && event.page.y>418 && event.page.y<457)
			{	
				$('imagenProductoBack').setStyle('display','none');
				$('imagenProducto').setStyle('display','block');
			}	
			if(event.page.x>446 && event.page.x<494 && event.page.y>464 && event.page.y<501)
			{
				SqueezeBox.open('/files/productos/big/<?=$producto->id?>_back_big.png');
			}
	});	
});
	
</script>