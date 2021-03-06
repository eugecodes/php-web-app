<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Isadora Beans</title>
<base href="http://isadorabeans.com/">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/oscar.css" rel="stylesheet" type="text/css" />
<link href="js/SqueezeBox/assets/SqueezeBox.css" rel="stylesheet" type="text/css" />
<link href="css/flexstyle.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="js/mootools-core.js"></script>
<script type='text/javascript' src="js/mootools-more.js"></script>
<script type='text/javascript' src="js/jscripts.js"></script>
<script type='text/javascript' src="js/flexcroll.js"></script>
<script type='text/javascript' src="js/SqueezeBox/SqueezeBox.js"></script>
<link rel="stylesheet" type="text/css" href="js/Mooflow/css/MooFlow.css" media="screen" />
<script type="text/javascript" src="js/Mooflow/js/MooFlow.js"></script>



<!-- GOOGLE MAPS -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDOC6fC8kOoqb2OtxwnxAzIM-7rY_M46Mc&sensor=false"></script>
<script type="text/javascript">
  var geocoder;
  var map;
  
   function codeAddress(add) 
  {
    var address =add;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map, 
            position: results[0].geometry.location
        });
      }
    });
  }
  
  function initialize(id) 
  {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = {
      zoom: 8,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"+id+""), myOptions);
	
	
		new Request.HTML({
		method		: 'post', 
		url			: 'distribuidores/getubicacion/'+id,
		data		: '',
		onComplete	: function(responseTree, responseElements, responseHTML, responseJavaScript)
		{
			codeAddress(responseHTML);
		}
	}).send();
	
	
  }
  

</script>
<link rel="shortcut icon" href="/images/isadora.ico"  type="image/x-icon" >

</head>



<body <?php echo $bodyClass?> >
<!--[if lte IE 7]>
  <iframe src="http://www.browserupgrade.info/ie6-upgrade/" frameborder="no" style="height: 81px; width: 100%; border: none;"></iframe>
<![endif]-->
<div class="wrapp">
	<div class="header">
   	  <p><a href="/"><img src="images/home/header_logo.png" border="0"/></a></p>
        <div class="social_lang">
        	<ul>
            	<li><a href=""><img src="images/facebook.png" width="20" height="21" alt="facebook" /></a></li>
                <li><a href=""><img src="images/twitter.png" width="20" height="21" alt="twitter" /></a></li>
                <!--<li><a href=""><img src="images/rss.png" width="20" height="21" alt="rss" /></a></li>-->
                <li><a href="#" class="btnsmall <? if($_SESSION['idioma']=="english"){?>selected<? }?>" id="changeEng">english</a></li>
                <li><a href="#" class="btnsmall <? if($_SESSION['idioma']=="spanish"){?>selected<? }?>" id="changeEsp"> español</a></li>
                <form name="frmIdioma" id="frmIdioma" method="post" action="">
                	<input type="hidden" name="hdnIdioma" id="hdnIdioma" value="" />
                </form>

            </ul>
        </div>
      <ul class="menuBox<?php echo $this->lang->line('subfijo');?>">
        	<li class="<? if($this->uri->segment(1)!="recetas"){?>recetas<? }else{?>recetasSelected<? }?>" onclick="location.href='/recetas'"><a href="/recetas"></a></li>
            <li class="<? if($this->uri->segment(1)!="productos"){?>productos<? }else{?>productosSelected<? }?>" onclick="location.href='/productos'"><a href="/productos"></a></li><!-- -->
            <li class="<? if($this->uri->segment(1)!="quienes"){?>qsomos<? }else{?>qsomosSelected<? }?>"><a href=""></a></li>
            <li class="<? if($this->uri->segment(1)!="distribuidores"){?>distribuidores<? }else{?>distribuidoresSelected<? }?>" onclick="location.href='/distribuidores'"><a href="distribuidores"></a></li>
            <li class="<? if($this->uri->segment(1)!="promociones"){?>promociones<? }else{?>promocionesSelected<? }?> abrirpromocion"><a href="promociones"></a></li>
            <li class="<? if($this->uri->segment(1)!="contacto"){?>contacto<? }else{?>contactoSelected<? }?> abrirContacto"><a href="/contacto"></a></li>
        </ul>
    </div>
    <div class="main">
    