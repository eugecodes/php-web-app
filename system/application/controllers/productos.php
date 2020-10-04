<?php
class Productos extends Controller 
{
	   public $producto= NULL;

       public function __construct()
       {
            parent::__construct();
			$this->producto=new Producto();
            // Your own constructor code
			$this->lang->load('front', $_SESSION['idioma']);
			
       }
	   
	   function index()
	   {
		   $data=array();
			
			if($this->uri->segment(2)=='index')
			{
				$data['producto']=$this->producto->getProducto($this->uri->segment(3));
			}
			else	
			{
				$data['producto']=$this->producto->getProducto();
			}
			
			
			$data['restantes']=$this->producto->getRestante($data['producto']->id);
		   
		   top();
		   $this->load->view('productos/index',$data);
		   bottom();
	   }
	   


}

?>