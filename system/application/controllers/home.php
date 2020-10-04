<?php
class Home extends Controller {

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
			$this->lang->load('front', $_SESSION['idioma']);
       }
	   
	   function index()
	   {
		   $data=array();
		   
		   $qRecetas=Doctrine_Query::create()->from('Receta');
		   $data['cantidad']=$qRecetas->count();
		   $data['recetas']=$qRecetas->execute();
		   
		   top();
		   $this->load->view('home/index', $data);
		   bottom();

	   }
}
?>