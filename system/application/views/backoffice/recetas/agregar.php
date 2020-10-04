<!-- Start: page-top-outer --><!-- End: page-top-outer --><!--  start nav-outer-repeat................................................................................................. START --><!--  start nav-outer-repeat................................................... END --><!-- start content-outer -->
<div id="content-outer">
    <!-- start content -->
    <div id="content">
        <div id="page-heading">
          <h1>Agregar receta</h1></div>
          <form name="frmRecetas" id="frmRecetas" action="backoffice/recetas/agregar" method="post" enctype="multipart/form-data">
          <ul class="commonUl">
          		<li>
                	<div>
                    	<label>Título en español:</label>
                        <input type="text" name="titulo_es" id="titulo_es"  value="<?=$receta->titulo_es?>" />
                    </div>
                    <div>
                    	<label>Título en inglés:</label>
                        <input type="text" name="titulo_en" id="titulo_en"  value="<?=$receta->titulo_en?>" />
                    </div>
                    <div>
                    	<label>Imagen</label>
                        <input type="file" name="imagen" id="imagen" />
                    </div>
                </li>   
                <li>    
                    <div>
                    	<label>Instrucciones en español:</label>
                        <textarea name="instrucciones_es" id="instrucciones_es" ><?=$receta->instrucciones_es?></textarea>
                    </div>
                 </li>
                 <li>   
                    <div>
                    	<label>Instrucciones en inglés:</label>
                        <textarea name="instrucciones_en" id="instrucciones_en" ><?=$receta->instrucciones_en?></textarea>
                    </div>
                 </li>

                <li>
                		<div>
                        	<input id="closePop" class="form-reset evalForm" type="button"  value="Cancelar"  onclick="history.back(-1);">
                            <input id="guardarReceta" class="form-submit evalForm" type="button" value="Guardar" name="guardarObra">
                            <input type="hidden" name="id" value="<?=$receta->id?>" />
                        </div>
                </li>                
                                               
          </ul>
          </form>
          <div class="clear">&nbsp;</div>
        </div>
     </div>   
    <!--  end content -->
    <div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->
<script type="text/javascript" language="javascript">
tinyMCE.init({
theme : "advanced",
mode : "textareas",
theme_advanced_buttons1 : "bold,italic,underline,forecolor,bullist,numlist,fontsizeselect,code",
theme_advanced_buttons2 : "",
theme_advanced_buttons3 : "",
theme_advanced_text_colors : "FF0000,000000",
verify_html : true,
width : "700",
height: "400"
});




$('guardarReceta').addEvent('click',function()
{
		if($('titulo_es').get('value')=='')
			alert("El  título en español es obligatorio");
		else if($('titulo_en').get('value')=='')
			alert("El  título en inglés es obligatorio");
		else
			$('frmRecetas').submit();			
});



</script>
