<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Isadora Beans</title>
<base href="<?=$this->config->item('base_url')?>" />
<link rel="stylesheet" href="css/backoffice.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="js/OmniGrid/omnigrid.css" type="text/css" media="screen" title="default" />
<script type="text/javascript" src="/js/mootools-core.js"></script>
<script type="text/javascript" src="/js/mootools-more.js"></script>
<script type="text/javascript" src="/js/OmniGrid/omnigrid.js"></script>
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>






</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	</div>
	<!-- end logo -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<a href="/backoffice/logout" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		

		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="<?=($this->uri->segment(2)=="recetas" || $this->uri->segment(2)=="")?"current" : "select";?>">
            <li><a href="/backoffice/recetas"><b>Recetas</b></a></li>
		</ul>
		
        
        <!--<ul class="<?=($this->uri->segment(2)=="distribuidores")?"current" : "select";?>">
            <li><a href="/backoffice/distribuidores/"><b>Distribuidores</b></a></li>
		</ul>-->
		
		<div class="nav-divider">&nbsp;</div>
		                    


		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 