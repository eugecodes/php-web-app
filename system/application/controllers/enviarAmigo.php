<?php
class EnviarAmigo extends Controller 
{
	   public $pais= NULL;

       public function __construct()
       {
            parent::__construct();
			/*$this->pais=new Pais();
            // Your own constructor code*/
			$this->lang->load('front', $_SESSION['idioma']);
			
       }
	   
	   function index()
	   {
		   $data=array();
		  /* $data['paises']=$this->pais->getPaises();*/
		   
		   $this->load->view('enviarAmigo/index',$data);
	   }
	   function enviar()
	   {
		   $data=array();
			
			$html=$this->load->view('mailing/enviarAmigoReceta',$_POST,TRUE);
				
			
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			
			// Additional headers
			/*$headers .= 'To:KrystalCC <KrystalCC@verdevalle.com.mx>' . "\r\n";
			$headers .= 'From: Frijoles Isadora en línea <atenciónaclientes@isadora.com>' . "\r\n";*/
			
			$headers .= 'To:Amigo Isadora <'.$_POST['email_dest'].'>' . "\r\n";
			$headers .= 'From: '.$_POST['nombre'].' '.$_POST['apellido'].' te ha enviado una receta desde isadorabeans.com <atencionaclientes@isadora.com>' . "\r\n";
			
			//if(mail('KrystalCC@verdevalle.com.mx', 'Frijoles Isadora en línea',$html,$headers))
			if(mail($_POST['email_dest'], $_POST['nombre'].' / '.$_POST['email'].' te ha enviado una receta: '.$_POST['titulo'],$html,$headers))
				echo ''; //"Gracias, tu receta ha sido enviada correctamente.";	

	   }	   

}

?>