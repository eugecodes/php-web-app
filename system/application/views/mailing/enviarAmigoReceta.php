<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<table width="600" height="678" border="0" cellpadding="0" cellspacing="0" background="http://www.isadorabeans.com/images/recetas/bg-mailing.jpg">
  <tr>
    <td valign="top">
    <table width="594" border="0">
      <tr>
        <td height="146" colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td width="28" height="92">&nbsp;</td>
        <td colspan="2"><img src="http://www.isadorabeans.com/images/recetas/m-t-<?php echo ($idioma=='eng'?'2':'1'); ?>.png"  /></td>
      </tr>
      <tr>
        <td height="62">&nbsp;</td>
        <td height="62" colspan="2">
        
        <div style="color: #0064B1;font-family: arial;font-size: 31px; font-weight: bold;display:block;"><?php echo $nombre.' '.$apellido; ?></div>
  <div style="color: #0064B1;  font-family: arial; font-size: 20px; font-weight: bold;    display:block;"><?php echo $email; ?></div>
        
        </td>
      </tr>
      <tr>
        <td height="165">&nbsp;</td>
        <td width="198" height="165">
          
          
          <a href="<?php echo $curURL; ?>" target="_blank">
            <img src="http://www.isadorabeans.com/<?php echo $img; ?>" width="180" border="0" />
            </a>
          
          
          </td>
        <td width="354" height="47">
          
          <div style="color: #0064B1;   font-family: arial;   font-size: 25px;display:block;font-weight: bold;  width: 345px;">
            <?php echo $titulo; ?>
            </div>
          <br />
          <div style="color: #666666;  font-family: arial;  font-size: 15px;display:block;  width: 334px;">
            <?php echo $comentarios.'<br/>'.$receta; ?>
            </div>
          
          </td>
      </tr>
      <tr>
      <td></td>
      <td height="70" colspan="2" align="left">
      
      
      <table width="421" border="0" background="http://www.isadorabeans.com/images/recetas/bg-arrow.jpg">
        <tr>
          <td width="415" height="41" style=" font-family: arial;  font-size: 20px;  font-weight: bold; display:block;padding-left: 22px;  padding-top: 10px;  ">
          <a  href="<?php echo $curURL; ?>" target="_blank" style="color: #FFFFFF;text-decoration: none;">
           <?php echo ($idioma=="eng"?'View recipe at www.isadorabeans.com':'Ver receta en www.isadorabeans.com'); ?>
           </a>
           </td>
        </tr>
      </table>
      
      </td>
      </tr>
      <tr>
      <td></td>
      <td height="40" colspan="2" align="left">
      
      <div style="color: #0064B1;   font-family: arial;   font-size: 25px;display:block;font-weight: bold;">
    <?php echo ($idioma=='eng'?'Visit our page for this and many <br/>more recipes with Isadora® Beans':'Visita nuestra página para encontrar esta y <br/>muchas más recetas con frijoles Isadora®  '  ); ?>
  </div>
  
      </td>
      </tr>
    </table></td>
  </tr>
</table>




<!--
<div style="background:transparent url('http://www.isadorabeans.com/images/recetas/bg-mailing.jpg') no-repeat scroll 0 0; width:600px; height:678px;display:block;">

  <div style="background:transparent url('http://www.isadorabeans.com/images/recetas/m-t-<?php echo ($idioma=='eng'?'2':'1'); ?>.png') no-repeat scroll 0 0;height: 70px;    left: 61px;position: absolute; top: 146px; width: 414px;display:block;">
  </div>

  <div style="color: #0064B1;font-family: arial;font-size: 31px; font-weight: bold; left: 63px;position: absolute; top: 215px;display:block;"><?php echo $nombre; ?></div>
  <div style="color: #0064B1;  font-family: arial; font-size: 20px; font-weight: bold;    left: 64px; position: absolute;  top: 251px;display:block;"><?php echo $email; ?></div>

  <div style="left: 63px;position: absolute;top: 302px;display:block;">
    <a href="<?php echo $curURL; ?>" target="_blank">
      <img src="http://www.isadorabeans.com/<?php echo $img; ?>" width="180" border="0" />
    </a>
  </div>
  
  <div style="color: #0064B1;   font-family: arial;   font-size: 25px;display:block;font-weight: bold;   height: 63px;   left: 255px;   overflow: hidden;   position: absolute;   top: 301px;    width: 345px;">
    <?php echo $titulo; ?>
  </div>
  
  <div style="color: #666666;  font-family: arial;  font-size: 15px;display:block;left: 251px;  position: absolute;   top: 354px;  width: 334px;">
    <?php echo $receta.'<br/>'.$comentarios; ?>
  </div>
  
  <a  href="<?php echo $curURL; ?>" target="_blank" style="color: #FFFFFF;display:block;display: block;  font-family: arial;  font-size: 20px;  font-weight: bold;  height: 48px;  left: 55px;  padding-left: 22px;  padding-top: 10px;  position: absolute;  text-decoration: none;  top: 493px;  width: 408px;">
    <?php echo ($idioma=="eng"?'View recipe at www.isadorabeans.com':'Ver receta en www.isadorabeans.com'); ?>
  </a>
  
  
  <div style="color: #0064B1;   font-family: arial;   font-size: 25px;display:block;font-weight: bold;   left: 57px;   position: absolute;   top: 576px;">
    <?php echo ($idioma=='eng'?'Visit our page for this and many <br/>more recipes with Isadora® Beans':'Visita nuestra página para encontrar esta y <br/>muchas más recetas con frijoles Isadora®  '  ); ?>
  </div>

</div>

//-->
</body>
</html>
