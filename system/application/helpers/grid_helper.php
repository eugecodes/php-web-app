<?php
	/**
	 * @autor: Oscar Adrián López Macías.
	 * @creado: 18 de Marzo de 2011.
	 * @version: V.1.0.
	 */
	function showGrid($controlador,$ancho,$alto,$detalles,$botones,$columnas)
	{
		$CI =& get_instance();
		$numcols = count($columnas)-1;
?>
		<script type="text/javascript">
		//checkbox...
			function checkItem(element)
			{
				if(element.hasClass('checkItem_active'))
					element.removeClass('checkItem_active');
				else
					element.addClass('checkItem_active');
			}
			
        //Genera la estructura de columnas...
            var cmu = 
			[
				<?php
					$cc=0; 
					foreach($columnas as $k=>$v)
					{
						if(!is_array($v))
							$cw=floor((($ancho-5)/$numcols));
						else
						{
							$cw	= $v[1];
							$v 	= $v[0];
						}
				?>
					{
					   header: "<?php echo $k?>",
					   dataIndex: '<?php echo $v?>',
					   dataType:'string',
					   width:<?php echo $cw?>
					   <?php if($cc == 0){?>
					   ,hidden:true
					   <?php }?>
					}
					<?php if($cc!=$numcols){?>,<?php }?>
				<?php $cc++; }?>
			]; 
   
            
        
        //Dispara el grid en cuanto se carga el dom
            window.addEvent("domready", function(){
				showGrid('<?php echo $controlador?>');
					
				if($("filterBox"))
				{
					$("filterBox").addEvent('submit', function(e){
						e.stop();
						datagrid.filter($('searchfl').value.toLowerCase());
					});
				}
			});
        
        //Dispara el grid cuando se manda llamar la función		
            function showGrid(ruta)
            {
                datagrid = new omniGrid
				(
					'mygrid', 
					{
						columnModel: cmu,
						buttons : 
						[
						  <?php $n=0; foreach($botones as $btn) { ?>	
							{
								name: '<?php echo $btn['btnnombre']; ?>', 
								bclass: '<?php echo $btn['btncss']; ?>', 
								onclick : <?php echo $btn['btnfun']; ?>
							},
							{
								separator: true
							},
							<?php $n++; } ?>
						],
						url:ruta,
						perPageOptions: [10,20,50,100],
						perPage:20,
						page:1,
						pagination:true,
						serverSort:true,
						showHeader: true,
						alternaterows:true,
						sortHeader:true,
						resizeColumns:true,
						multipleSelection:true,
						<?php if(!empty($detalles)){?>
							accordion:true,
							accordionRenderer:accordionFunction,
							autoSectionToggle:true,
						<?php } ?>
						width:<?php echo $ancho; ?>,
						height: <?php echo $alto; ?>
					}
				);
            }
			
        </script>
        
        <!--Contenedor del grid-->
        <div id="mygrid" ></div>
<?php }?>