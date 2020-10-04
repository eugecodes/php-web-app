window.addEvent('load',function(){
	//Activa los a con rel pops...
		$$('a[rel=pops], a[rel=popsCenter], a[rel=popsPos]').addEvent('click',function(e){
			e.stop();
			myCore.loadPop(this,this.get('href'),'');
		});
		
		
	//Fake Selects
		$$('.theSelect').addEvent('click', function(){
			var ul = this.getElement('ul');
			switch(this.getElement('ul').getStyle('display'))
			{
				case 'block':
					ul.setStyle('display','none');
				break;
				case 'none':
					ul.setStyle('display','block');
				break;
			}
		});
});