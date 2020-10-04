   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="http://isadorabeans.com/" />
<style type="text/css">
@charset "utf-8";
/* CSS Document */
ul, ol{
	display:block;
	margin:0;
	padding:0;
	list-style-type:none;
	}
a{ text-decoration:none;}
img{ border:0;}
.clear{ clear:both; margin-top:20px;}
h1,h2,h3{ display:block; margin:0; padding:0;}
@font-face {
    font-family: 'AngelinaRegular';
    src: url('angelina-webfont.eot');
    src: url('angelina-webfont.eot?#iefix') format('embedded-opentype'),
         url('angelina-webfont.woff') format('woff'),
         url('angelina-webfont.ttf') format('truetype'),
         url('angelina-webfont.svg#AngelinaRegular') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'Bliss2-Bold';
    src: url('bliss2b.eot');
    src: url('bliss2b.eot?#iefix') format('embedded-opentype'),
         url('bliss2b.woff') format('woff'),
         url('bliss2b.ttf') format('truetype'),
         url('bliss2b.svg#bliss2b') format('svg');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'Bliss2-Medium';
    src: url('bliss2m.eot');
    src: url('bliss2m.eot?#iefix') format('embedded-opentype'),
         url('bliss2m.woff') format('woff'),
         url('bliss2m.ttf') format('truetype'),
         url('bliss2m.svg#bliss2m') format('svg');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'Bliss2';
    src: url('bliss2r.eot');
    src: url('bliss2r.eot?#iefix') format('embedded-opentype'),
         url('bliss2r.woff') format('woff'),
         url('bliss2r.ttf') format('truetype'),
         url('bliss2r.svg#bliss2r') format('svg');
    font-weight: normal;
    font-style: normal;
}

.selectdBox
{
	color:#fff;
}
 .colum_left{
	float:left;
	width:638px;
	height:566px;
	background-color:#03458d;
	}
 .colum_left .filtersBox{ 	position:relative; padding-top:22px;}	

 .colum_left .filtersBox .filters{
	width:549px;
	height:415px;
	padding:20px 0 10px 0px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	position:relative;
	behavior: url(css/PIE.htc);
	position:relative;
	margin:auto;
	}	
	
 .colum_left .filtersBox .filters .title{
	display:block;
	width:100px;
	margin:0 0 10px 10px;
	font-family: 'Bliss2-Medium';
	font-size:15px;
	font-weight:bold;
	color:#ffffff;
	}	
.selectdBox .dropDownList li{
	display:block;
	margin-bottom:5px;
	font-family: 'Bliss2';
	font-size:12px;
	color:#013b84;
	position:relative;
	}
	.dropDownList
	{
		width:250px;
		float:left;
	}
	
.selectdBox .dropDownList li .selecter{
	display:block;
	width:250px;
	height:24px;
	padding-left:5px;
	line-height:24px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	cursor:pointer;
	background:url(../images/arrow_select.jpg) #ffffff no-repeat right top;
	behavior: url(css/PIE.htc);
	position:relative;
	}
.selectdBox .dropDownList li .list{ display:none; position:absolute; z-index:15; height:100px; width:300px; overflow:auto; background-color:#fff;}	
.selectdBox .dropDownList li:hover .list{ display:block;}	
.selectdBox .dropDownList li:hover .list li{ display:block; padding-left:5px; padding-bottom:5px; cursor:pointer;}
.selectdBox .dropDownList li:hover .list li.selthis{ background:#09569E; border:1px solid #FFF; color:#FFFFFF; }

.top{
	height:5px;
	margin-top:10px;}
.space{
	height:5px;
	margin-top:15px;}	
.spaceA{
	height:5px;
	margin-top:20px;}	

.selectdBox .zipcode{
	width:540px;
	height:24px;
	font-family: 'Bliss2';
	font-size:12px;
	color:#013b84;
	padding-left:5px;
	line-height:24px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	background-color:#FFF;
	border:none;
	behavior: url(css/PIE.htc);
	position:relative;
	}
	
.selectdBox .textarea{
	width:540px;
	height:170px;
	font-family: 'Bliss2';
	font-size:12px;
	color:#013b84;
	padding-left:5px;
	line-height:24px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	background-color:#FFF;
	border:none;
	behavior: url(css/PIE.htc);
	position:relative;

	}	
	
.inputs input[type=button],
.inputs input[type=submit]{
	display:block;
	width:134px;
	height:38px;
	font-family: 'Bliss2';
	font-size:17px;
	color:#fff;
	border:none;
	text-align:left;
	cursor:pointer;
	margin-top:17px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	background-color:#f68000;	
	behavior: url(css/PIE.htc);
}	
	
	.logo
	{
		float:left;
		width:150px;
	}
	
	.texto
	{
		float:left;
		font-family: 'Bliss2';
		color:#fff;
		width:260px;
		font-size:15px;
	}
	
	.divError
	{
		width:543px;
		margin:auto;
		clear:both;
		background-color:#F68000;
		color:#fff;
		display:none;
		font-family: 'Bliss2';
		padding:5px;
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
		behavior: url(css/PIE.htc);
	}
</style>
</head>

<body>
        <div class="colum_left">
        	<div class="filtersBox">
           <!--<img src="images/submenu_distribuidores.png" />-->
			<div class="filters">
            		<div class="top"></div>
                    <div class="selectdBox"><?=$nombre?></div>
                    <div class="clear"></div>
                    <div class="selectdBox"> <?=$apellido?></div>
                    <div class="clear"></div>
                    <div class="selectdBox"><?=$email?> </div>
                    <div class="clear"></div>
                    <div class="selectdBox"><?=$pais?> </div>
                    <div class="clear"></div>
                    <div class="selectdBox"> <?=$ciudad?></div>
                    <div class="clear"></div>
                    <div class="selectdBox"><?=$comentarios?> </div>
                    <div class="clear"></div>
                     

                      <div class="top"></div>
                     <div class="selectdBox inputs">
                     	<div class="logo"><img src="http://isadorabeans.com/images/logo_footer.png" /></div>
                        <div class="texto">Gracias por dejarnos sus comentarios. Pronto nos pondremos en contacto con usted.</div>
                     </div>
                     
                     
                </div>
            
            </div>
        </div> 
        <input type="hidden" name="pais" id="pais" value="México" />
        <input type="hidden" name="ciudad" id="ciudad" value="Guadalajara" />        
       
</body>
</html>

