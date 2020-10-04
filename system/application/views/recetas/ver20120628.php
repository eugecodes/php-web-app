<div class="colum_left">
        	<div class="filtersBox">
           		<img src="<?=$this->lang->line('recetas_img_categorias')?>" />
				<div class="listaRecetas">
            		<div class="top"></div>
					<ul class="menuBox">
                    	<li><a href=""><?=$this->lang->line('recetas_productos')?></a>
                        	<ul class="subCategory">
                            	<? foreach($productos as $producto){?>
                            	<li><a href="/recetas/producto/<?=$producto->id?>"><?=$producto['nombre_'.$this->lang->line('db')]?></a></li>
                                <? }?>
                        	</ul>
                        </li>
                        <? foreach($categorias as $categoria){?>
                    	<li><a href="/recetas/categoria/<?=$categoria->id?>"><?=$categoria['nombre_'.$this->lang->line('db')]?></a></li>
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
        
        	<div class="recetaCorta">
                  <div class="block1">
                    <h1><?=$receta[0]['titulo_'.$this->lang->line('db')]?></h1>
                    <p><?=$receta[0]['instrucciones_'.$this->lang->line('db')]?></p>
                    <table width="400" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="2" valign="middle">
                            </td>
                          </tr>
                          <tr>
                            <td width="178">
                            <ul>
                              <li class="tw"></li>
                              <li class="fblike"></li>
                              <li class="gPlus"></li>
                            </ul>
                            </td>
                            <td width="192" style="padding-top:40px;"><div class="calificar unastar"></div></td>
                          </tr>
                    </table>
                </div>  
                <div class="block2">

                	<img src="files/recetas/<?=$receta[0]->imagen?>" width="308px" />
                </div>  
            </div>
            

            
            <div class="division"></div>
            <div class="masrecetas">
            	<img src="images/otras_recetas.jpg" /><div class="space"></div><div class="top"></div>
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