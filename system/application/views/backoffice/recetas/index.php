<script>
	function btnConfirm(element)
	{
		var count = 0;
		
		$$('.checkItem_active').each(function(el){
			if(el.get('onclick') == 'checkItem(this)')
				count = parseInt(count + 1);
		});

		if(count == 0)
		{
			getPop('/utilities/pop_no_seleccionados');
		}
		else
		{
			switch(element[0])
			{
				case 'btnAct':
					var accion = 'activar';
					getPop('/<?php echo $this->uri->segment(1); ?>/pop_confirmar_accion/'+count+'/'+accion+'');	
				break;
				
				case 'btnDes':
					var accion = 'desactivar';
					getPop('/<?php echo $this->uri->segment(1); ?>/pop_confirmar_accion/'+count+'/'+accion+'');	
				break;
			}
		}
	}
	function eliminarreceta(id)
	{
		if(confirm('Realmente desea eliminar esta receta?'))
		{
			location.href='/backoffice/recetas/eliminar/id/'+id;
		}
	}



	function btnAdd()
	{
		location.href='/backoffice/recetas/agregar'
	}
</script>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Recetas</h1>
        <div class="flexgrid" style="width:700px">
         <?php 
			showGrid(
				$controller,	//Controlador al que consulta...
				'982', 			//Ancho del grid...
				'300', 			//Alto del grid...
				false,			//De dónde obtiene detalles (si existen)...
				$botones, 		//Botones del grid...
				$columnas, 		//Columnas
				false
			);
		?>
        </div>
	</div>
	<!-- end page-heading -->

	
	<div class="clear">&nbsp;</div>
    
    

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>