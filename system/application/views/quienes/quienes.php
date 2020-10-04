<style>
#zoomRail {
	height: 370px;
	#height:430px;
}
#zoomRail .wide .zblock {
    width: 630px;
}
#zoomRail .wide .zblock .r p {
    font-size: 16px;
}
#inner {
  position:relative;
}
.l {
	height: 405px;
    line-height: 405px;
    width: 242px;
    float:left;
    position:absolute;
}
.l img {
    vertical-align: middle;
    width: 242px;
}
.r {
	position:absolute;
    float: left;
    margin-left: 10px;
    width: 280px;
}
.r h1 {
    background: url("/images/quienes_somos/banderin_anio.png") no-repeat scroll center top transparent;
    display: block;
    height: 61px;
    width: 156px;
}
.r h1 label {
    color: #FFFFFF;
    display: block;
    font-family: Verdana,Geneva,sans-serif;
    font-size: 35px;
    font-weight: lighter;
    padding-top: 10px;
    text-align: center;
    text-shadow: 1px 1px #000000;
}
.r p {
    color: #000000;
    font-family: Bliss;
    font-size: 11px;
    font-style: oblique;
}
.r p {
    font-size: 16px;
}
</style>


    	<div id="zoomRail">
        	<div class="wide" id="inner">
                    <div class="zblock" id="1967">
                        <div class="l" id="1967_1">
                            <img src="/images/quienes_somos/1967.jpg" style="margin-left:-120px;width:360px;"/>
                        </div>
                        <div class="r" id="1967_2">
                            <h1><label>1967</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_1967'); ?>
                            </p>
                        </div>
                    </div> 
                   <div class="zblock" id="2000"> 
                        <div class="l" id="2000_1">
                            <img src="/images/quienes_somos/2000.jpg"/>
                        </div>
                        <div class="r" id="2000_2">
                            <h1><label>2000</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2000'); ?>
                            </p>
                        </div>
                    </div> 
                   <div class="zblock" id="2005">
                        <div class="l" id="2005_1">
                            <img src="/images/quienes_somos/2005.jpg" style="height: 296px;margin-left: -77px;width: 322px;"/>
                        </div>
                        <div class="r" id="2005_2">
                            <h1><label>2005</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2005'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="zblock" id="2007">
                        <div class="l" id="2007_1">
                            <img src="/images/quienes_somos/2007.png"/>
                        </div>
                        <div class="r" id="2007_2">
                            <h1><label>2007</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2007'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="zblock" id="2008">
                        <div class="l" id="2008_1">
                            <img src="/images/quienes_somos/2008.png"/>
                        </div>
                        <div class="r" id="2008_2">
                            <h1><label>2008</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2008'); ?> 
                            </p>
                        </div>
                    </div>
                    <div class="zblock" id="2010">
                        <div class="l" id="2010_1">
                            <img src="/images/quienes_somos/2010.jpg" style="height: 258px;margin-left: -48px;margin-top: 13px; width: 293px;"/>
                        </div>
                        <div class="r" id="2010_2">
                            <h1><label>2010</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2010'); ?>
                            </p>
                        </div>
                    </div>
                   <div class="zblock" id="2011">
                        <div class="l" id="2011_1">
                            <img src="/images/quienes_somos/2011.jpg" style="height: 220px; margin-left: -49px; margin-top: 11px; width: 295px;"/>
                        </div>
                        <div class="r" id="2011_2">
                            <h1><label>2011</label></h1>
                            <p>
                            	<?php echo $this->lang->line('qs_texto_2011'); ?>
                            </p>
                        </div>
                    </div>    
                    <div class="zblock" id="2012">
                        <div class="l" id="2012_1">
                            <img src="/images/quienes_somos/2012.png"/>
                        </div>
                        <div class="r" id="2012_2">
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

      
 <script>
 function organize(param){
 	new Fx.Tween($('1967_1'), { duration: 1000, link: 'chain',  property: 'left'})
				.start(0-param);
	new Fx.Tween($('1967_2'), { duration:1300, link: 'chain',  property: 'left'})
				.start(264-param);
				
	new Fx.Tween($('2000_1'), { duration:1100, link: 'chain',  property: 'left'})
				.start(650-param);
    new Fx.Tween($('2000_2'), { duration:1400, link: 'chain',  property: 'left'})
				.start(919-param);
	new Fx.Tween($('2005_1'), { duration:1200, link: 'chain',  property: 'left'})
				.start(1300-param);
    new Fx.Tween($('2005_2'), { duration:1500, link: 'chain',  property: 'left'})
				.start(1569-param);
	new Fx.Tween($('2007_1'), { duration:1300, link: 'chain',  property: 'left'})
				.start(1920-param);
	new Fx.Tween($('2007_2'), { duration:1600, link: 'chain',  property: 'left'})
				.start(2170-param);
    new Fx.Tween($('2008_1'), { duration:1400, link: 'chain',  property: 'left'})
				.start(2490-param);
	new Fx.Tween($('2008_2'), { duration:1700, link: 'chain',  property: 'left'})
				.start(2740-param);
	new Fx.Tween($('2010_1'), { duration:1300, link: 'chain',  property: 'left'})
				.start(3100-param);
    new Fx.Tween($('2010_2'), { duration:1600, link: 'chain',  property: 'left'})
				.start(3370-param);
    new Fx.Tween($('2011_1'), { duration:1200, link: 'chain',  property: 'left'})
				.start(3720-param);
	new Fx.Tween($('2011_2'), { duration:1500, link: 'chain',  property: 'left'})
				.start(3990-param);
    new Fx.Tween($('2012_1'), { duration:1100, link: 'chain',  property: 'left'})
				.start(4300-param);
	new Fx.Tween($('2012_2'), { duration:1400, link: 'chain',  property: 'left'})
				.start(4550-param);
 }
	function scrollToYear(year)
	{
		/*x = new Fx.Scroll('zoomRail');
		//x.toElement(''+year+'');
		x.toElement(''+year+'_1',{offset: {
        x: 0,
        y: 0
    }});
		setTimeout(function(){
		  x.toElement(''+year+'_2',{offset: {
        x: 0,
        y: 100
    }});
		},500);*/
		year+='';
		
			if(year=='1967'){
				organize(120);
			}
			if(year=='2000'){
				organize(740);
			}
			if(year=='2005'){
				organize(1440);
			}
			if(year=='2007'){
			    organize(2130);
			}
			if(year=='2008'){
			    organize(2590);
			}
			if(year=='2010'){
			   organize(3220);
			}
			if(year=='2011'){
			    organize(3870);
			}
			if(year=='2012'){
			   organize(4440);
			}
		
		
	}
</script>
<script type="text/javascript">
$$('#timeline ul li').addEvent('click', function(){
	$$('#timeline ul li').removeClass('selected');
	this.addClass('selected');
});
$('inner').tween('left',400);
organize(0);
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

