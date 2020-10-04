    <div id="homeProductoPrincipal"><img src="/images/home/producto_principal_<?=$this->lang->line('db')?>.png" /></div>
    <div class="cf">
        <div id="btn_slide_left" class="left"></div>
        <div id="homeRecetasWrapper">
            <div id="homeRecetas">
                <? $i=1;foreach($recetas as $receta){?>
                <div class="item">
                    <div class="contenido">
                        <span class="titulo <?php if(strlen($receta['titulo_'.$this->lang->line('db')]) > 40) echo 'small'; ?>"><?=$receta['titulo_'.$this->lang->line('db')]?></span>
                        <span class="descripcion"><?=substr(strip_tags($receta['instrucciones_'.$this->lang->line('db')]),0,50)?>...</span>
                        <div class="ver_receta" style="cursor:pointer" onclick="location.href='/recetas/ver/<?=$receta->id?>'"><?=$this->lang->line('home_ver_receta')?></div>
                    </div>
                    <div class="img"><img src="/files/recetas/<?=$receta->imagen?>" width="190px" height="132px" /></div>
                </div>
                <? if($i<$cantidad){?>
                <div class="separator"></div>
                <? }?>
                <? $i++;}?>
            </div>
        </div>
        <div id="btn_slide_right" class="right"></div>
    </div>
    <div id="labelRecetas"><img src="<?=$this->lang->line('home_img_recetas')?>" /></div>
    <script src="js/jquery/jquery.js"></script>
    <script src="js/home.js"></script>