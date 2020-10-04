	myCore = new Class({

		//Overlay sobre pantalla...
			adopOverlay: function(){
				if($('overlay'))
				$('overlay').destroy();
				
				var wz = window.getScrollSize();
				var overlay = new Element('div',{
					'id': 'overlay',
					styles: {
						'height' : wz.y+'px'
					}
				});
				
				$(document.body).adopt(overlay);
			},
		
		
		//loadPop	
			loadPop: function(element,controller,data){
				//Overlay...
					myCore.adopOverlay();
				
				//Scroll en Y...
				document.scrollY = window.pageYOffset;
				
				var winScroller = new Fx.Scroll(window);
				
				new Request.HTML({
					method: 'post', 
					url: controller,
					data: data,
					onComplete: function(responseTree, responseElements, responseHTML, responseJavaScript)
					{
						//Content
							$('popBox').getElement('.alertloguinFormBox').set('html',responseHTML);
						//Show
							$('popBox').removeClass('displayNone');
							
						//Dimensiones del pop
							var thePop = document.getElementById('popBox');
							var x = thePop.offsetWidth;
							var y = thePop.offsetHeight;
						
						//Posición centro del elemento..
						$('popBox').setStyles({
							'position'	 	: 'fixed',
							'top' 		 	: '50%',
							'left'		 	: '50%',
							'margin-top' 	: '-'+(y/2)+'px',
							'margin-left'	: '-'+(x/2)+'px',
							'margin-bottom' : '30px',
							'z-index'	 	: '9999'
						});	

						//Javascript...
						if(responseJavaScript)
						eval(responseJavaScript);
					}
				}).send();
			},


		//Cierra el pop...
			closePop: function(){
				if($('popBox'))
				$('popBox').addClass('displayNone');
				
				if($('overlay'))
					$('overlay').destroy();
			},

		
		//fxFieldError...
			fxFieldError: function fxFieldError(element,msj){
				var winScroller = new Fx.Scroll(window);
				var pos    = element.getCoordinates();
				var globo  = $('globoAlert');
				var contxt = globo.getElement('h1');
				var closex = globo.getElement('.closebutton');
				//winScroller.start(0, pos.top-65);
				globo.setStyles({
					'top'  	  : pos.top-55,
					'left'	  : pos.left,
					'z-index' : '9999'
				});
				contxt.set('html',msj)
				closex.addEvent('click',function(){
					globo.tween('display', 'none');
				});
				globo.tween('display', 'block');
			}
			
	});

	var myCore = new myCore();