<?php
/**
 * - Carrusel de imagenes
 *  
 * @Params: 
 *      array $imagenes: arreglo con el nombre de las imagenes
 *     string $urlDelete: ruta del controlador que hace borra la imagen
 *     string $baseDir: directorio base, en donde se alojan las imagenes
 * 
 * @version: 1.0
 * @autor: Yuliana Martinez / Oscar López
 * @Creado: Octubre 08 del 2010
 */

//function slideGal($imagenes,$urlDelete,$baseDir='',$folder='')
function slideGal($imagenes,$urlDelete,$baseDir='')
{
	/*
	if($folder=='red')
		$bgcolor='#DD323E';
	if($folder=='green')
		$bgcolor='#A3CC34';
	if($folder=='blue')
		$bgcolor='#32D3DD';
	if($folder=='yellow')
		$bgcolor='#F8C31A';
	*/
?>
<link href="css/slidegal/slidegal.css" rel="stylesheet" type="text/css" />

<a id="slideLeftt" class="slideLeftt" style="background-color:<?=$bgcolor?>"></a>
<div id="slideGal">
<ul id="contentTabss">
	<?php if($folder==''){ ?>
		<?php foreach($imagenes as $indice => $nombre_img){?>
			<li><img src="<?=$baseDir.$nombre_img?>" width="105" height="100"></li>
		<?php }?>
	<?php }?>
	<?php /*if($folder!=''){?>
		<?php foreach($imagenes as $img){?>
			<li><img src="<?=$img->mini?>" width="37" height="37" id="img_<?=$img->mediana?>"></li>
		<?php  }?>
	<?php  }*/?>
</ul>
</div>
<a id="slideRightt" class="slideRightt" style="background-color:<?=$bgcolor?>"></a>
<script>
window.addEvent('domready', function() {
var numerote = 0;

var maximusTab = $$('#contentTabss li').length;

$('slideRightt').addEvent('click',function(){
										   
	if(numerote < maximusTab-3)
	{
		var el = $$('#contentTabss li')[numerote];
		var elo = el.getElement('img');
		elo.set('slide',{duration:1000,mode:'horizontal'});
		el.set('tween',{duration:1000});
		var lat = el.getSize().x;
		el.set('alt',lat);
		
		el.setStyle('width',lat);
		el.setStyle('min-width','0');
		
		el.set('tween',{duration:1000,onComplete:function(){
		el.setStyle('margin-right','0');
		}});
		
		el.tween('width','0');
		elo.slide('out');
		numerote++;
	}
	
});

$('slideLeftt').addEvent('click',function(){
	if(numerote > 0)
	{
		numerote--;
		
		var el = $$('#contentTabss li')[numerote];
		var elo = el.getElement('div');
		var eloa = el.getElement('img');
		
		elo.set('tween',{duration:1000});
		
		el.set('tween',{duration:1000});
		eloa.set('tween',{duration:1000});
		
		var lat = el.get('alt');
		
		el.setStyle('margin-right','5px');	
		el.set('tween',{duration:1000,onComplete:function(){
		}});
		
		el.tween('width',lat);
		elo.tween('width',lat);
		eloa.tween('margin-left',0);
	}
});
});
</script>
<?php } ?>