<?php
class Contacto extends Controller 
{
	   public $pais= NULL;

       public function __construct()
       {
            parent::__construct();
			$this->pais=new Pais();
            // Your own constructor code
			$this->lang->load('front', $_SESSION['idioma']);
			
       }
	   
	   function index()
	   {
		   $data=array();
		   $data['paises']=$this->pais->getPaises();
		   
		   $this->load->view('contacto/index',$data);
	   }
	   
	   function enviar()
	   {
		   $data=array();
		   
			
			$html=$this->load->view('mailing/contacto',$_POST,TRUE);
				
			
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			// Additional headers
			$headers .= 'To:KrystalCC <KrystalCC@verdevalle.com.mx>' . "\r\n";
			$headers .= 'From: Frijoles Isadora en línea <atenciónaclientes@isadora.com>' . "\r\n";
			
			if(mail('KrystalCC@verdevalle.com.mx', 'Frijoles Isadora en línea',$html,$headers))
				echo "Gracias por dejarnos sus comentarios. Pronto nos pondremos en contacto con usted.";	

	   }	   

}

?>