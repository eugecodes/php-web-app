<?php 

	/*********************PARÁMETROS*********************/
	//	$fieldName => Nombre del hidden...				//
	//	$callbacks => Información extra (extensiones,   //
	//				  width,height,etc)...				//
	/****************************************************/
	
	function uploader($fieldName,$callbacks = array())
	{ 
		//Extensiones Válidas...
		$i=1;
		foreach($callbacks['ext'] as $res)
		{
			if($i<count($callbacks['ext']))
				$allowedExtensions.="'".$res."',";
			else
				$allowedExtensions.="'".$res."'";
				
			$i++;
		}

		
?>
    <!--Div que muestra el botón-->
        <div id="file-uploader-<?=$fieldName?>" class="main_div">       
            <noscript>          
                <p>Please enable JavaScript to use file uploader.</p>
                <!-- or put a simple form for upload here -->
            </noscript>         
        </div>
		
        <div id="hiddens">
        </div>        
    <!--Script-->
        <script>
        window.addEvent('domready', function() 
        {
            var uploader = new qq.FileUploader({
                element: $('file-uploader-<?=$fieldName?>'),
                action: '/tmp/uploader.php',
                allowedExtensions: ['xls'],        
                sizeLimit: 0,
                minSizeLimit: 0,
                debug: false,
                //onSubmit: function(id, fileName){},
                //onProgress: function(id, fileName, loaded, total){},
                onComplete: function(id, fileName, responseJSON){				
					if(responseJSON.error==null)
					{
						var hidden = new Element('input', {
							type: 'text',
							name: '<?=$fieldName?>[]',
							class: 'hiddeninput',
							value: 'tmp/'+fileName,
						});
						$('hiddens').adopt(hidden);
					}
				},
                onCancel: function(id, fileName){},
                messages: {
					typeError: "El archivo \"{file}\" tiene una extensión no permitida. Sólo se permiten {extensions}.",
					sizeError: "El archivo \"{file}\" es demasiado grande, evite archivos superiores a {sizeLimit}.",
					minSizeError: "El archivo \"{file}\" es demasiado pequeño, evite archivos inferiores a {minSizeLimit}.",
					emptyError: "El archivo \"{file}\" está vacío, al parecer está dañado.",
					onLeave: "Hay archivos cargados temporalmente, si usted deja el formulario los archivos se perderán."             
                },
                showMessage: function(message){
					alert('Formato inválido')
					//XP.tracsa.lightbox.show('/backoffice/notificaciones/error_upload','350px','mensaje='+message+'');
				}
            });
        });
        </script>
        
<?php }

	function ajaxMultiUpload($fieldName,$callbacks = array())
	{ 
		//Extensiones Válidas...
		$i=1;
		foreach($callbacks['ext'] as $res)
		{
			if($i<count($callbacks['ext']))
				$allowedExtensions.="'".$res."',";
			else
				$allowedExtensions.="'".$res."'";
				
			$i++;
		}
		
		//Medida válida
		$allowedSizeW=$callbacks['size'][0];
		$allowedSizeH=$callbacks['size'][1];
		
?>
	<!--Div que se encarga de contener multiples uploads-->	
	<button type="button" onclick="document.injectNewUpload();" style="cursor : pointer;">
		<img src="/images_bo/add_file.png"> 
	</button>	
	<div id='file-uploader_container'></div>
	
    <!--Script-->
    <script>    	
    	document.noUploads = 0;
    	
    	document.injectNewUpload = function()
    	{
    		document.noUploads++;
    		
    		var divx = document.createElement('div');
    		divx.id = "file-uploader-<?=$fieldName?>"+document.noUploads;
    		divx.set('class','main_div');
    		divx.innerHTML = '<noscript><p>Please enable JavaScript to use file uploader.</p></noscript>';
    		
    		var hiddenx = document.createElement('input');
    		hiddenx.name = '<?=$fieldName?>'+document.noUploads;
    		hiddenx.set('class','hiddeninput');
    		hiddenx.id = '<?=$fieldName?>'+document.noUploads;
    		hiddenx.type = 'hidden';
    		hiddenx.value = '';
    		
    		$('file-uploader_container').appendChild(divx);
    		$('file-uploader_container').appendChild(hiddenx);
    		
	        window.addEvent('domready', function() 
	        {
	            var uploader = new qq.FileUploader({
	                element: $('file-uploader-<?=$fieldName?>'+document.noUploads),
	                action: '/tmp/uploader.php',
	                // additional data to send, name-value pairs
	                params: {
						'ext'   : '<?=str_replace("'","\"",$allowedExtensions)?>',
						'w' : '<?=$allowedSizeW?>',
						'h'	: '<?=$allowedSizeH?>'
					},
	                allowedExtensions: [<?=$allowedExtensions?>],        
	                sizeLimit: 0,
	                minSizeLimit: 0,
	                debug: false,
	                //onSubmit: function(id, fileName){},
	                //onProgress: function(id, fileName, loaded, total){},
	                onComplete: function(id, fileName, responseJSON){				
						if(responseJSON.error==null)
							$('<?=$fieldName?>'+document.noUploads).set('value','tmp/'+fileName)
						else
							$('<?=$fieldName?>'+document.noUploads).set('value','')
					},
	                onCancel: function(id, fileName){},
	                messages: {
						typeError: "El archivo \"{file}\" tiene una extensión no permitida. Sólo se permiten {extensions}.",
						sizeError: "El archivo \"{file}\" es demasiado grande, evite archivos superiores a {sizeLimit}.",
						minSizeError: "El archivo \"{file}\" es demasiado pequeño, evite archivos inferiores a {minSizeLimit}.",
						emptyError: "El archivo \"{file}\" está vacío, al parecer está dañado.",
						onLeave: "Hay archivos cargados temporalmente, si usted deja el formulario los archivos se perderán."             
	                },
	                showMessage: function(message){
						XP.tracsa.lightbox.show('/backoffice/notificaciones/error_upload','350px','mensaje='+message+'');
					}
	            });
	        });
	   }
	   
	   document.injectNewUpload();
    </script>
<?php }?>