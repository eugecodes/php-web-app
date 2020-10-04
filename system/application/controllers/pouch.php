<?php
class Pouch extends Controller 
{

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
			$this->lang->load('front', $_SESSION['idioma']);
			
       }
	   
	   function index()
	   {
		   $data=array();
		   top();
		  $this->load->view("pouch/index",$data); 
		   bottom();
	   }
	   
	   
	   function test()
	   {
		   $data=array();
		   top();
		   $this->load->view("pouch/test",$data); 
		   bottom();
	   }	   
	   

}

?>