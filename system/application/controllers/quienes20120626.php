<?php
class Quienes extends Controller {

       public function __construct()
       {
		    
            parent::__construct();
            // Your own constructor code
			 $this->lang->load('front', $_SESSION['idioma']);
       }
	   
	   function index()
	   {
		   
		  top();
		  $this->load->view("quienes/quienes"); 
		  bottom();
	   }
}
?>