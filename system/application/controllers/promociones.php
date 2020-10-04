<?php
class Promociones extends Controller 
{
	   public $distribuidor= NULL;

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
			$this->lang->load('front', $_SESSION['idioma']);
			
       }
	   
	   function index()
	   {
		   $data=array();
		   
		   
		   //top();
		   $this->load->view('promociones/index',$data);
		   //bottom();
	   }

}

?>