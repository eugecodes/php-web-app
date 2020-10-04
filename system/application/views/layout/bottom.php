  </div>
  
   <div class="base">
        	<ul>
            	<li class="fastfood">
                <? if($this->uri->segment(1)!='productos'){?>
                <a href="/recetas/categoria/2"><img src="<?=$this->lang->line('home_img_rapidas')?>" width="174" height="193" border="0" /></a>
                <? }else{?>
                <a href="http://choosemyplate.gov" target="_blank"><img src="images/choosemyplate.png" width="174" height="193" border="0" /></a>
                <? }?>
                </li>
                <li class="pouch<?=$this->lang->line('subfijo')?>" onclick="location.href='/pouch'"></li>
                <li class="ideas<?=$this->lang->line('subfijo')?>" onclick="location.href='/recetas/categoria/5'"></li>
            </ul>
   </div>

</div>
   <div class="footer">
   		<ul>
        	<li class="logo"><a href="/"><img src="images/logo_footer.png" width="108" height="60" alt="isadora" /></a></li>
            <li class="copy"><?=$this->lang->line('home_derechos')?></li>
            <li class="contact">
            	<!--<img src="images/contact-icon.png" width="25" height="18" /><a href="mailto:atenciónaclientes@isadora.com"> atenciónaclientes@isadora.com</a>-->
            </li>
            <li class="fsocial">
            <span><?=$this->lang->line('home_siguenos')?></span>
            <a href="/"><img src="images/footer_fb_logo.png" width="28" height="27" alt="facebook" /></a>
            <a href="/"><img src="images/footer_twitter_logo.png" width="28" height="27" alt="twittter" /></a>
            </li>
        </ul>
   
   </div>
   
   <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2423507-38']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> 

</body>
</html>
