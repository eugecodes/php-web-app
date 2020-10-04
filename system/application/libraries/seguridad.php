<?php
class seguridad extends Controller 
{
    ### Si hay un usuario en sesion...
    function is_logged()
    {
        ### Instanciamos el objeto code igniter
        $CI =& get_instance();
		
		if(!isset($_SESSION['idioma']))
		{ 
			if(!isset($_POST['hdnIdioma']) || empty($_POST['hdnIdioma']))
				$_SESSION['idioma']="english";
			else
				$_SESSION['idioma']=$_POST['hdnIdioma'];	
		}
		else
		{
			if(isset($_POST['hdnIdioma']) && !empty($_POST['hdnIdioma']))
			{
				$_SESSION['idioma']=$_POST['hdnIdioma'];	
				header("Location: ".$CI->uri->uri_string());
			}
		}
			

        if($CI->uri->segment(1)=='backoffice' )
        {
	
				
				if(!isset($_SESSION['sesion']) || empty($_SESSION['sesion']) )
                {
					if(isset($_POST['usuario']))
                    {
                        ### Consulta Doctrine Administradores...
                        $query= Doctrine_Query::create()
                        ->from('Usuario')
                        ->where('usuario = ?', $_POST['usuario'])
                        ->andWhere('password = ?', $_POST['password'])
                        ->limit(1);
                        $res = $query->execute()->getFirst();
                        if($query->count() > 0)
                        {
                                $dbSesion = array(
                                        'usuario'  => $res->usuario,
                                        'nombre'  => $res->nombre,
										'id'	  => $res->id
                                );
                                $_SESSION['sesion'] = $dbSesion;
										
							    header("Location: /backoffice/recetas");

                        }
                        else
                        {
							if($CI->uri->segment(2)!='login')
							{
								$data['error']="Su nombre de usuario y/o contraseña son incorrectos.";
								$CI->load->view('backoffice/loginScreen',$data);
								$CI->output->_display();
								exit();
							}
                        }
                    }
                    else
                    {
							if($CI->uri->segment(2)!='login')
							{
								header("Location: /backoffice/login");
								$data['error']="Su nombre de usuario y/o contraseña son incorrectos.";
								$CI->load->view('backoffice/loginScreen',$data);
								$CI->output->_display();
								exit();
							}
                    }
                }
        }

    }

	
}
?>