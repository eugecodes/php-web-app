<form method="post" id="serachDisForm">
        <div class="colum_left">
        	<div class="filtersBox">
           <img src="images/distribuidores/titulo_submenu_distribuidores_<?=$this->lang->line('db')?>.png" />
			<div class="filters">
            		<div class="top"></div>
                    <div class="selectdBox">
                            <span class="title"><?=$this->lang->line('dist_estado')?></span>
                            <ul class="dropDownList">
                                <li><span class="selecter" id="dEstados"><?=$this->lang->line('dist_seleccione')?></span>
                                    <ul class="list" id="estados">
                                    		<li><?=$this->lang->line('dist_todos')?></li>
                                    	<? foreach($estados as $estado){?>
                                        	<li><?=$estado->estado?></li>
                                        <? }?>
                                    </ul>
                                
                                </li>
                            </ul>
                            <div class="clear"></div>
                     </div>
                     <div class="space"></div>
                     <div class="selectdBox">
                            <span class="title"><?=$this->lang->line('dist_ciudad')?></span>
                            <ul class="dropDownList">
                                <li><span class="selecter" id="dCiudades"><?=$this->lang->line('dist_seleccione')?></span>
                                    <ul class="list" id="ciudades">
                                    		<li onClick="oculta('All');"><?=$this->lang->line('dist_todos')?></li>
                                    	<?php foreach($ciudades as $c){ ?>
                                        	<li onClick="oculta('<?php echo $c->ciudad; ?>');"><?php echo $c->ciudad; ?></li>
                                        <?php } ?>
                                    </ul>
                                
                                </li>
                            </ul>
                            <div class="clear"></div>
                     </div>
                     <div class="top"></div>
                     <div class="selectdBox">
                            <span class="title">Zip Code</span>
                            <input type="text" name="cp" id="cp" value="<?php echo ($this->uri->segment(6) != '' && $this->uri->segment(6) != 'all') ? $this->uri->segment(6) : '';?>" placeholder="ZIP Code" class="zipcode"/>
                     </div>
                      <div class="space"></div>
                     <div class="selectdBox">
                            <span class="title"><?=$this->lang->line('dist_store')?></span>
                            <ul class="dropDownList">
                                <li><span class="selecter" id="dNombre"><?=$this->lang->line('dist_seleccione_tienda')?></span>
                                    <ul class="list" id="nombre">
                                    		<li onClick="oculta('All');"><?=$this->lang->line('dist_todos')?></li>
                                    	<?php foreach($tiendas as $t){ ?>
                                        	<li onClick="ocultaDistribuidor('<?php echo $t->nombre; ?>');"><?php echo $t->nombre; ?></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                            <div class="clear"></div>
                     </div>
                      <div class="top"></div>
                     <div class="selectdBox inputs">
                     	<input type="submit" value="<?=$this->lang->line('dist_genera')?>" />
                        <input type="hidden" name="sCiudad" id="sCiudad" value="all" />
                        <input type="hidden" name="sNombre" id="sNombre" value="all" />
                        <input type="button" onclick="location.href='/distribuidores/filtrar/all/all/all/all'" value="<?=$this->lang->line('dist_ver_lista')?>" />
                     </div>
                     
                     
                </div>
            
            </div>
        </div> 
</form>  
<script>

function oculta(ciudad)
{
	$$('ul.list').setStyle('display','none');
	$('dCiudades').set('html', ciudad);
	$('sCiudad').set('value', ciudad);
}

function ocultaDistribuidor(distribuidor)
{
	$$('ul.list').setStyle('display','none');
	$('dNombre').set('html', distribuidor);
	$('sNombre').set('value', distribuidor);
}
window.addEvent('domready', function() {
	
	$('dEstados').addEvent('click',function()
	{
		if($('estados').getStyle('display')=='none')
			$('estados').setStyle('display','block');
		else	
			$('estados').setStyle('display','none');
	});
	
	$('dCiudades').addEvent('click',function()
	{
		if($('ciudades').getStyle('display')=='none')
			$('ciudades').setStyle('display','block');
		else	
			$('ciudades').setStyle('display','none');
	});	
	
	$('dNombre').addEvent('click',function()
	{
		if($('nombre').getStyle('display')=='none')
			$('nombre').setStyle('display','block');
		else	
			$('nombre').setStyle('display','none');
	});		
	
	// Search Form
	$('serachDisForm').addEvent('submit', function(e)
	{
		e.stop();
		var estado = ($('estados').getElement('.selthis'))	? $('estados').getElement('.selthis').get('html') 	: 'all';
		var ciudad =$('sCiudad').get('value');
		var nombre = $('sNombre').get('value');
		var cp 	   = ($('cp').get('value') != '')?$('cp').get('value'):'all';
		location.href='/distribuidores/filtrar/'+estado+'/'+ciudad+'/'+nombre+'/'+cp;
	});
	
	
	//Fake Selects...

		$$('ul.list li').addEvent('click', function()
		{
			switch(this.getParent('ul').get('id'))
			{
				case 'estados':
					$$('ul.list').setStyle('display','none');
					var value = this.get('html');
					
					//Remueve la clase selthis...
					this.getParent('ul').getElements('li').each(function(li){
						li.removeClass('selthis');
					});
					
					//Agrega la clase selthis...
					this.addClass('selthis');				
					new Request.HTML({
						method		: 'post', 
						url			: 'distribuidores/filtra_ciudades/'+value,
						data		: '',
						onComplete	: function(responseTree, responseElements, responseHTML, responseJavaScript)
						{
							$('ciudades').set('html', responseHTML);
							
	
						}
					}).send();
					
					this.getParent('ul').getPrevious('.selecter').set('html', value);
				break;
			}
			
		});
	//addClick.periodical(1000);
	
	
	//Estado default selected...
	<?php if($this->uri->segment(3) != '' && $this->uri->segment(3) != 'all'){ ?>
		$$('#estados li').each(function(li){
			if(li.get('html') == '<?php echo $this->uri->segment(3); ?>')
			{
				var val = li.get('html');
				li.addClass('selthis');
				li.getParent('ul').getPrevious('.selecter').set('html', val);
			}
		});
	<?php } ?>
	
	//Ciudad default selected...
	<?php if($this->uri->segment(4) != '' && $this->uri->segment(4) != 'all'){ ?>
		$$('#ciudades li').each(function(li){
			if(li.get('html') == '<?php echo $this->uri->segment(4); ?>')
			{
				var val = li.get('html');
				li.addClass('selthis');
				li.getParent('ul').getPrevious('.selecter').set('html', val);
				$('sCiudad').set('value', '<?php echo $this->uri->segment(4); ?>');
			}
		});
	<?php } ?>
	
	//Tienda default selected...
	<?php if($this->uri->segment(5) != '' && $this->uri->segment(5) != 'all'){ ?>
		$$('#nombre li').each(function(li){
			if(li.get('html') == '<?php echo $this->uri->segment(5); ?>')
			{
				var val = li.get('html');
				li.addClass('selthis');
				li.getParent('ul').getPrevious('.selecter').set('html', val);
				$('sNombre').set('value', '<?php echo $this->uri->segment(5); ?>');
			}
		});
	<?php } ?>	

});
</script>