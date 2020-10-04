<?php
/**
 * - Carga la librearia para envío de correso elctrónicos y 
 *   parsea un html para enviarlo con datos personalizados.
 *
 * @autor: Christian López
 * Creado: 17-Mar-2011
 */

/**
 * - Funcion para el envío de correo electrónico, recibe un 
 *   arreglo. 
 *
 * @params
 *     array $args:                    Arreglo completo con los datos de envio
 *           $args['nombreRemitente']: Nombre del remitente del correo electrónico. Ej.: Juan Pérez
 *			 $args['emailRemitente']:  Email del remitente del correo electrónico. Ej.: juanperez@gmail.com
 *			 $args['destinatarios']:   Arreglo con los destinatarios. Ej.: array('juanperez@gmail.com','ejimenez@gmail.com')
 *			 $args['asunto']:          Asunto del mensaje. Ej.: Gracias por registrarse
 *			 $args['vistaHtml']:       Ruta del html que se enviará por correo electrónico.
 *			 $args['mensajeAlterno']:  Mensaje alterno para las bandejas que no acepten html. Si no se define entonces
 *			                           se envia el mensaje definido por el parametro $args['vistaHtml'] pero aplicando
 *									   la funcion strip_tags() para limpiar todo el codigo html.
 * 			 $args['datos']:           Arreglo con todos los datos dinámicos que deben suplirse en el mensaje
 *			 $args['bcc']:             Arreglo de los destinatarios que recibirán copia oculta
 *			 $args['cc']:              Arreglo de los destinatarios que recibirán copia
 *			 $args['responderA']:      Cuenta de correo electrónico de respuesta. Si no existe no se define.
 *			 $args['adjuntar']:        Arreglo de urls de archivos que se ajuntarán al mensaje.
 *			 $args['autentificacion']: Arreglo con los datos de autentificación a al cuenta del remitente.
 *                                     Ej.: array('user'=>'xxx@xpc.mx','pass'=>'xxxxxxx');     
 * 
 * @return
 *      boolean true|false: Retorna verdadero si el envio es exitoso y false si hubo algun problema.

 *
 * @autor: Christian López
 * Creado: 17-Mar-2011
 */
 
	function enviarEmail($args=array())
	{
		### Declaraciones
			$config=array();
		  
		### Instanciamos el objeto Code Igniter para tener acceso a sus clases.
			$CI =& get_instance();
		
		### Cargamos la libreria email. Nativa de CodeIgniter
			$CI->load->library('email');
			
		### Definimos los parámetros de configuración
			$CI->load->config($correo, TRUE);
			$correo = $CI->config->item('correo');
			$config['protocol']='mail';
			$config['smtp_host']=$correo['host'];
			$config['smtp_port']=25;
			$config['smtp_user']=$args['autentificacion']['user'];
			$config['smtp_pass']=$args['autentificacion']['pass'];
			$config['mailtype']='html';
			
		### Establecemos la configuración definida	arriba
			$CI->email->initialize($config);
			
		### Configuramos los parámteros de envío
			$CI->email->from($args['emailRemitente'], $args['nombreRemitente']);
			$CI->email->to($args['destinatarios']);
			if(isset($args['cc']))
				$CI->email->cc($args['cc']);
			if(isset($args['bcc']))
				$CI->email->bcc($args['bcc']);
			$CI->email->subject($args['asunto']);
			
		### Configuramos el mensaje
			$html=$CI->load->view($args['vistaHtml'],$args['datos'],TRUE);
			$mensajeAlterno=(empty($args['mensajeAlterno']))?strip_tags($html):$args['mensajeAlterno'];
			
			$CI->email->message($html);
			$CI->email->set_alt_message($mensajeAlterno);
			
		### Adjuntamos archivos en caso de que se haya definido este parámetro	
		    if(isset($args['adjuntar']))
				foreach($args['adjuntar'] as $archivo)
				{
					$CI->email->attach($archivo);
				}

		### Finalmente enviamos el email
			if ( ! $CI->email->send())
			{
				echo $CI->email->print_debugger();
				return false;
			}
			else
				return true;	
		
	}
?>