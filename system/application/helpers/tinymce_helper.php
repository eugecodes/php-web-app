<?php
/*
	Autor:      Yuliana Martinez / Oscar López
	Version:    1.0
	Fecha:      Octubre 08 de 2010
	Parametros: $saveUrl     = Ruta al controlador y función que guardará el contenido.
				$btnSave     = Id del botón que hará el guardado.
				$urlReturn   = Url a la cuál regresará una vez que guarde el contenido.
				$html        = El contenido existente.
*/
// function tinyMce($saveUrl,$btnSave,$urlReturn,$html='')
function tinyMce($html = '')
{
?>
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init
	({
		// General options
		width : "100%",
		height : "500",
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		/*
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo",
		theme_advanced_buttons3 : "|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons4 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr",
		theme_advanced_buttons5 : "|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons6 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		*/
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,|,undo,redo",
		theme_advanced_buttons2 : "forecolor,backcolor,|,bullist,numlist,|,cut,copy,paste,pastetext,pasteword,|,outdent,indent,blockquote,cite,|,link,unlink,|,ltr,rtl,|,sub,sup,|,charmap,|,insertdate,inserttime",
		theme_advanced_buttons3 : "anchor,cleanup,code,|,preview,search,replace,tablecontrols,|,hr,removeformat,visualaid,iespell,media,advhr,nonbreaking,restoredraft",
		
	
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "/css/common.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : 
		[
			{title : 'Texto de columna arriba', selector: 'td,div', styles : {'vertical-align' : 'top'}},	
			{title : 'Texto de columna abajo', selector: 'td,div', styles : {'vertical-align' : 'text-bottom'}},
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}}
		]
	});

	function ajaxSave() 
	{
		//Fija el valor del campo textarea#contenido...
			var precontenido = tinyMCE.get('contenido');
			var	contenido	 = precontenido.getContent();
			
		//Tiny Zone Coordinates...
			var tz=$('contenido_tbl').getCoordinates()
			
		//Overlay
			var overlay = new Element
			(
				'div', 
				{
					styles: 
					{
						'position'	    : 'absolute',
						'left'		    : tz.left,
						'top'			: tz.top,
						'width'			: tz.width,
						'height'      	: tz.height,
						'display'		: 'block',
						'background'	: '#ECECEC url(/images_bo/ajax-loader.gif) no-repeat center',
						'filter'      	: 'alpha(opacity=65)',
						'-moz-opacity' 	: 0.65,
						'opacity'     	: 0.65
					}
				}
			);
			
			overlay.inject($(document.body), "after"); 
			
		//Guarda en Bd	
		/*
			var req = new Request.HTML({
				method: 'post',
				url: '<?=$saveUrl?>',
				data: "contenido="+contenido,
				onComplete: function(response) {
					setTimeout(function() {overlay.destroy();}, 3000);
				}
			}).send();
		*/
		document.formtiny.submit();
	}
</script>
<!-- /TinyMCE -->
<textarea id="contenido" name="contenido">
	<?=$html?>
</textarea>
<!--form name="formtiny" id="formtiny" method="post" action="<?=$saveUrl?>" enctype="multipart/form-data">
	<textarea id="contenido" name="contenido">
		<?=$html?>
	</textarea>
</form-->
<?php } ?>