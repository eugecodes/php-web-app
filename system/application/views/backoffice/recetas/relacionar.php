<!-- Start: page-top-outer --><!-- End: page-top-outer --><!--  start nav-outer-repeat................................................................................................. START --><!--  start nav-outer-repeat................................................... END --><!-- start content-outer -->
<div id="content-outer">
    <!-- start content -->
    <div id="content">
        <div id="page-heading">
          <h1>Relacionar receta con productos: <?=$receta->titulo_es?></h1></div>
          <form name="frmRecetas" id="frmRecetas" action="backoffice/recetas/relacionar/id/<?=$receta->id?>" method="post" enctype="multipart/form-data">
          <div class="relacionarProductos">
          	<? foreach($productos as $producto){?>
          	<div>
            	<label><?=$producto->nombre_es?></label>
                <input type="checkbox" name="producto[]" value="<?=$producto->id?>" <?=(ProductoReceta::estarelacionado($producto->id,$receta->id))?"checked":""?> />
            </div>
            <? }?>
          <div class="clear">&nbsp;</div>
          <div  style="float:right">
                <input id="closePop" class="form-reset evalForm" type="button"  value="Cancelar"  onclick="history.back(-1);">
                <input id="guardarReceta" class="form-submit evalForm" type="submit" value="Guardar" name="guardarObra">
                <input type="hidden" name="id" value="<?=$receta->id?>" />
          </div>
          </div>

          </form>
          <div class="clear">&nbsp;</div>
        </div>
     </div>   
    <!--  end content -->
    <div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

