$(document).ready(function() {
	
		
	// cufon
	Cufon.replace('#nav_principal li a', {fontFamily: 'plantin',	hover: true	});
	Cufon.replace('#menu li a', { hover: 'true', fontFamily: 'plantin' });
	$("#menu li").hover(function (){Cufon.refresh();}); 
	Cufon.replace('h1');
	Cufon.replace('h2');
	Cufon.replace('#banners li div');
	Cufon.replace('.agregarAlCarrito', {fontFamily: 'plantin',	hover: true	});
	
});
