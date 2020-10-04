<div class="colum_left">
        	<div class="filtersBox">
           		<img src="<?=$this->lang->line('recetas_img_categorias')?>" />
				<div class="listaRecetas">
            		<div class="top"></div>
					<ul class="menuBox">
                    	<li><a href=""><?=$this->lang->line('recetas_productos')?></a>
                        	<ul class="subCategory">
                            	<? foreach($productos as $producto){?>
                            	<li><a href="/recetas/producto/<?=$producto->id?>" <? if($this->uri->segment(2)=='producto' && $this->uri->segment(3)==$producto->id){?>class="naranja"<? }?>><?=$producto['nombre_'.$this->lang->line('db')]?></a></li>
                                <? }?>
                        	</ul>
                        </li>
                        <? foreach($categorias as $categoria){?>
                    	<li><a href="/recetas/categoria/<?=$categoria->id?>" <? if($this->uri->segment(2)=='categoria' && $this->uri->segment(3)==$categoria->id){?>class="naranja"<? }?>><?=$categoria['nombre_'.$this->lang->line('db')]?></a></li>
                        <? }?>
                    </ul> 
                    <div class="pBoth">
                    		<p class="buscareceta"></p>
                            
                             <div class="searchBox">
                                    <input type="text" placeholder="(Ej: Tacos)" class="searching" id="txtBuscar"/>
                                    <input name="" type="button" id="btnBuscar" />
                             </div>

                    </div>         
                </div>
            
            </div>
        </div> 
        
        <!--cambio la estructura de este bloque solo divs flexscroll y slider-->
        <div class="colum_right">
        
        
        	<?
			if(sizeof($recetas)>0)
			 foreach($recetas as $receta){?>
        	<div class="recetaCorta">
                  <div class="block1">
                    <h1><?=$receta['titulo_'.$this->lang->line('db')]?></h1>
                    <?
                    	$sinHtml=strip_tags(str_replace("<br/>","--salto--",$receta['instrucciones_'.$this->lang->line('db')]));
						$sinSalto=str_replace("--salto--","<br/>",$sinHtml);
					?>
                    
                    <p><?=substr($sinSalto,0,400)?>...</p>
                    <table width="400" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="2" valign="middle">
                            <a href="/recetas/ver/<?=$receta->id?>" style="height:30px; line-height:30px; font-family: 'Bliss2-Bold'; color:#0064b1;"><img src="images/ver_receta.png" width="81" height="30" alt="Ver receta" style="float:left; margin-right:10px;"/> <?=$this->lang->line('home_ver_receta')?></a>
                            </td>
                          </tr>
                          <tr>
                            <td width="178">
                            <ul>
                              <li class="tw"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$this->uri->uri_string()?>/ver/<?=$receta->id?>" data-via="your_screen_name" data-lang="en" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>

    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
                              <li class="fblike">
                             <div id="fb-root"></div>
								<div id="fb-root"></div>
									<script>(function(d, s, id) {
                                      var js, fjs = d.getElementsByTagName(s)[0];
                                      if (d.getElementById(id)) return;
                                      js = d.createElement(s); js.id = id;
                                      js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=44899549644";
                                      fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>
                                <div class="fb-like" data-href="http://isadorabeans.com/recetas/ver/<?=$receta->id?>" data-send="false" data-width="50" data-show-faces="false" data-layout="box_count"></div>
                              </li>
                              <li class="gPlus"></li>
                            </ul>
                            </td>
                            <td width="192" style="padding-top:40px;"><div class="calificar<?=$this->lang->line('subfijo')?> unastar"></div></td>
                          </tr>
                    </table>
                </div>  
                <div class="block2">

                	<img src="files/recetas/<?=$receta->imagen?>" width="308px" />
                </div>  
            </div>
            <? }?>
            

            
            <div class="division"></div>
            <div class="masrecetas">
            	<img src="images/recetas/titulo_otras_recetas_<?=$this->lang->line('db')?>.png" /><div class="space"></div><div class="top"></div>
                <ul>
                	<? foreach($otras as $otra){?>
                	<li>
                    	<img src="files/recetas/<?=$otra->imagen?>" width="108px" />
                        <div class="textInfo">
                        	<span><?=$otra['titulo_'.$this->lang->line('db')]?></span>
                          <?=substr(strip_tags($otra['instrucciones_'.$this->lang->line('db')]),0,50);?>
                        </div>
                        <a href="/recetas/ver/<?=$otra->id?>"><img src="images/arrow_more.png" width="13" height="86" alt="ver más" /></a>
                    </li>
                    <? }?>

                </ul>
            
            </div>	
      	</div>
        <script>
			$('btnBuscar').addEvent('click',function()
			{
					location.href='/recetas/buscar/'+$('txtBuscar').get('value');
			});
		</script>