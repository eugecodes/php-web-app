		<? $this->load->view('distribuidores/frmFiltro')?>   
        <div class="colum_right">
        	<h1><?=$this->lang->line('dist_resultados')?></h1>
            <div class="slider">
            	<div id='mycustomscroll' class='flexcroll'>
                
                	<? foreach($distribuidores as $distribuidor){?>
                	<ul class="elements" id="distribuidor_<?=$distribuidor->id?>">
                   	  <li class="name"><?=$distribuidor->nombre?></li>
                      <li class="location"><?=$distribuidor->direccion?>  |   <?=$distribuidor->ciudad?>, <?=$distribuidor->estado?>.   |   ZIP Code: <?=$distribuidor->cp?></li>
                      <li class="map" id="map_<?=$distribuidor->id?>"><a href="" class="amap" id="a_<?=$distribuidor->id?>"></a></li>
                    </ul>
                    <ul class="elements" id="ulmap_<?=$distribuidor->id?>" >
                        <li class="gmap" id="limap_<?=$distribuidor->id?>" style="display:none"></li>
                    </ul>
                    <? }?>
                </div>
            	
            </div>
      </div>
<script>
window.addEvent('domready', function() {
	//Map Ajax...
	$$('a.amap').addEvent('click',function(event)
	{
			event.preventDefault();
			
			$$('li.name').removeClass('selected');
			$$('li.location').removeClass('selected');
			$$('li.map').removeClass('selected');
			$$('li.map a').removeClass('selected');
			
			var id=this.id.split('_');
			$$('li.gmap').setStyle('display','none');


			new Request.HTML({
				method		: 'post', 
				url			: 'distribuidores/getmapa/'+id[1],
				data		: '',
				onComplete	: function(responseTree, responseElements, responseHTML, responseJavaScript)
				{
					$$('#distribuidor_'+id[1]+' li.name').addClass('selected');
					$$('#distribuidor_'+id[1]+' li.location').addClass('selected');
					$$('#distribuidor_'+id[1]+' li.map').addClass('selected');
					$$('#distribuidor_'+id[1]+' li.map a').addClass('selected');
					
					$('limap_'+id[1]).set('html',responseHTML);
					$('limap_'+id[1]).setStyle('display','block');
									
					initialize(id[1]);	
					//Javascript...
					eval(responseJavaScript);
				}
			}).send();			
	});
});
</script>