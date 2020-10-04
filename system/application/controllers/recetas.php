<?php
class Recetas extends Controller 
{
	   public $receta= NULL;

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
			
			$this->receta= new Receta();
			$this->categoriareceta= new Categoriareceta();
			$this->lang->load('front', $_SESSION['idioma']);
			
       }
	   
	   function index()
	   {
		   $data=array();
		   
		    $objProductos=new Producto();
		   
		   $data['productos']=$objProductos->getProductos();
		   
		   $q=Doctrine_Query::create()->from('Receta')->orderBY('RAND()')->limit(1);
		   
		   $data['recetas']=$q->execute();
		   
		   $data['categorias']=$this->categoriareceta->getRecetas();
		   
		   ### Obtener otrras recetas
		   $qOtras=Doctrine_Query::create()->from('Receta')->where('id!=?',$data['recetas'][0]->id)->orderBY('RAND()')->limit(3);
		   $data['otras']=$qOtras->execute();
		   
		   
		   top();
		   $this->load->view('recetas/index',$data);
		   bottom();
	   }
	   
	   
	   	function producto()
	   {
		   $data=array();
		   
		    $objProductos=new Producto();
		   
		   $data['productos']=$objProductos->getProductos();
		   
		    $q=Doctrine_Query::create()->from('Receta')->where('id_producto LIKE ?',"%".$this->uri->segment(3)."%");
		   
		   $data['recetas']=$q->execute();
		   $data['categorias']=$this->categoriareceta->getRecetas();
		   
		   ### Obtener otrras recetas
		   $qOtras=Doctrine_Query::create()->from('Receta')->where('id_producto NOT LIKE ?',"%".$this->uri->segment(3)."%")->orderBY('RAND()')->limit(3);
		   $data['otras']=$qOtras->execute();
		   
		   
		   top();
		   $this->load->view('recetas/index',$data);
		   bottom();
	   }
	   
	    function ver()
	   {
		   $data=array();
		   
		    $objProductos=new Producto();
		   
		   $data['productos']=$objProductos->getProductos();
		   
		   $data['receta']=$this->receta->get_by_where('id='.$this->uri->segment(3).'',4);
		   $data['categorias']=$this->categoriareceta->getRecetas();
		   
		   
		   ### Obtener otrras recetas
		   $qOtras=Doctrine_Query::create()->from('Receta')->where('id_categoria=?',$data['receta'][0]->id_categoria)->orderBY('RAND()')->limit(3);
		   $data['otras']=$qOtras->execute();
		   
		   top();
		   $this->load->view('recetas/ver',$data);
		   bottom();
	   }
	   
	    function categoria()
	   {
		   $data=array();
		   
		    $objProductos=new Producto();
		   
		   $data['productos']=$objProductos->getProductos();
		   
		   $q=Doctrine_Query::create()->from('Receta')->where('id_categoria LIKE ?',"%".$this->uri->segment(3)."%");
		   $data['recetas']=$q->execute();
		   $data['categorias']=$this->categoriareceta->getRecetas();
		   
		    ### Obtener otrras recetas
		   $qOtras=Doctrine_Query::create()->from('Receta')->where('id_categoria NOT LIKE ?',"%".$this->uri->segment(3)."%")->orderBY('RAND()')->limit(3);
		   $data['otras']=$qOtras->execute();
		   
		   
		   top();
		   $this->load->view('recetas/index',$data);
		   bottom();
	   }	
	   
	    function buscar()
	   {
		   $data=array();
		   
		    $objProductos=new Producto();
		   
		   $data['productos']=$objProductos->getProductos();
		   
		   $q=Doctrine_Query::create()->from('Receta');
		   if($this->uri->segment(3)!='')
			   $q->where('titulo_es LIKE  ? OR titulo_en LIKE ?',array("%".$this->uri->segment(3)."%","%".$this->uri->segment(3)."%"));
		   $data['recetas']=$q->execute();
		   $data['categorias']=$this->categoriareceta->getRecetas();
		   
		   ### Obtener otrras recetas
		   $qOtras=Doctrine_Query::create()->from('Receta')->orderBY('RAND()')->limit(3);
		   if($this->uri->segment(3)!='')
			   $q->where('titulo_es NOT LIKE  ? OR titulo_en NOT LIKE ?',array("%".$this->uri->segment(3)."%","%".$this->uri->segment(3)."%"));
		   $data['otras']=$qOtras->execute();
		   
		   
		   top();
		   $this->load->view('recetas/index',$data);
		   bottom();
	   }		      
	   
	   

}

?>