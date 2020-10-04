
<script>
	function scrollToYear(year)
	{
		new Fx.Scroll('zoomRail').toElement(''+year+'');
	}
</script>

        
    	<div id="zoomRail">
        	<div class="wide">
                    <div class="zblock" id="1967">
                        <div class="l">
                            <img src="/images/quienes_somos/1967.jpg"/>
                        </div>
                        <div class="r">
                            <h1><label>1967</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_1967'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="zblock" id="2000">
                        <div class="l">
                            <img src="/images/quienes_somos/2000.png"/>
                        </div>
                        <div class="r">
                            <h1><label>2000</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2000'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="zblock" id="2005">
                        <div class="l">
                            <img src="/images/quienes_somos/2005.jpg"/>
                        </div>
                        <div class="r">
                            <h1><label>2005</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2005'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="zblock" id="2007">
                        <div class="l">
                            <img src="/images/quienes_somos/2007.png"/>
                        </div>
                        <div class="r">
                            <h1><label>2007</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2007'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="zblock" id="2008">
                        <div class="l">
                            <img src="/images/quienes_somos/2008.png"/>
                        </div>
                        <div class="r">
                            <h1><label>2008</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2008'); ?> 
                            </p>
                        </div>
                    </div>
                    <div class="zblock" id="2010">
                        <div class="l">
                            <img src="/images/quienes_somos/2010.jpg"/>
                        </div>
                        <div class="r">
                            <h1><label>2010</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2010'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="zblock" id="2011">
                        <div class="l">
                            <img src="/images/quienes_somos/2011.png"/>
                        </div>
                        <div class="r">
                            <h1><label>2011</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2011'); ?>
                            </p>
                        </div>
                    </div>    
                    <div class="zblock" id="2012">
                        <div class="l">
                            <img src="/images/quienes_somos/2012.png"/>
                        </div>
                        <div class="r">
                            <h1><label>2012</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2012'); ?>
                            </p>
                        </div>
                    </div>                            	
        	</div>
        </div>
        
        
        <div id="timeline">
            <ul>
                <li class="uno selected" onclick="scrollToYear(1967)">1967</li>
                <li class="dos" onclick="scrollToYear(2000)">2000</li>
                <li class="tres" onclick="scrollToYear(2005)">2005</li>
                <li class="cuatro" onclick="scrollToYear(2007)">2007</li>
                <li class="cinco" onclick="scrollToYear(2008)">2008</li>
                <li class="seis" onclick="scrollToYear(2010)">2010</li>
                <li class="siete" onclick="scrollToYear(2011)">2011</li>
                <li class="ocho" onclick="scrollToYear(2012)">2012</li>
            </ul>
        </div>

      
 
<script type="text/javascript">
$$('#timeline ul li').addEvent('click', function(){
	$$('#timeline ul li').removeClass('selected');
	this.addClass('selected');
});
/* <![CDATA[
	var myMooFlowPage = {
	
		start: function(){
			var mf = new MooFlow($('MooFlow'), {
				useSlider: true,
				useCaption: true,
				useResize: true,
				useMouseWheel: true,
				useKeyInput: true
			});
			
			//mf.attachViewer();
		}
		
	};
	
	window.addEvent('domready', myMooFlowPage.start);
]]> */
</script>

