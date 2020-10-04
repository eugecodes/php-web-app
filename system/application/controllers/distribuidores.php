<?php
class Distribuidores extends Controller 
{
	   public $distribuidor= NULL;

       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
			$this->distribuidor= new Distribuidor();	
			$this->lang->load('front', $_SESSION['idioma']);
			
       }
	   
	   function index()
	   {
		   
		    if($estado=="All") $estado="all";
		   if($ciudad=="All") $ciudad="all";
		   if($nombre=="All") $nombre="all";
		   if($cp=="All") $cp="all";
		   
		   $data=array();

		   $estado = ($estado && $estado!='all')	?	$estado	:	false;
		   $ciudad = ($ciudad && $ciudad!='all')	?	$ciudad	:	false;
		   $nombre = ($nombre && $nombre!='all')	?	urldecode($nombre)	:	false;
		   $cp = ($cp 	  && $cp	!='all')	?	$cp		:	false;
		   
		   $data['estados']			= $this->distribuidor->getEstados();
		   $data['ciudades']		= $this->distribuidor->getCiudades($estado);
		   $data['tiendas']			= $this->distribuidor->getTiendas();
		   $data['distribuidores']	= $this->distribuidor->getDistribuidores($estado, $ciudad, $nombre, $cp);
		   
		    top();
		   $this->load->view("distribuidores/index",$data); 
		   bottom();
	   }
	   


	### Filtrar
		function filtrar($estado, $ciudad, $nombre, $cp)
		{
		   if($estado=="All") $estado="all";
		   if($ciudad=="All") $ciudad="all";
		   if($nombre=="All") $nombre="all";
		   if($cp=="All") $cp="all";
		   
		   $data=array();

		   $estado = ($estado && $estado!='all')	?	$estado	:	false;
		   $ciudad = ($ciudad && $ciudad!='all')	?	$ciudad	:	false;
		   $nombre = ($nombre && $nombre!='all')	?	urldecode($nombre)	:	false;
		   $cp = ($cp 	  && $cp	!='all')	?	$cp		:	false;
		   
		   $data['estados']			= $this->distribuidor->getEstados();
		   $data['ciudades']		= $this->distribuidor->getCiudades($estado);
		   $data['tiendas']			= $this->distribuidor->getTiendas();
		   $data['distribuidores']	= $this->distribuidor->getDistribuidores($estado, $ciudad, $nombre, $cp);
		   
		   top();
		   $this->load->view("distribuidores/filtro",$data); 
		   bottom();
		}
	   
	   
	   
	   
	   function getmapa($id)
	   {
			$data=array();
			$data['mid'] 			= $id;
			$data['distribuidor']	= $this->distribuidor->getDistribuidor($id);
			$this->load->view("distribuidores/mapa",$data); 
	   }
	   
	   function getubicacion($id)
	   {
			$data=array();
			$data['distribuidor']	= $this->distribuidor->getDistribuidor($id);
			
			echo $data['distribuidor']->direccion.", ".$data['distribuidor']->ciudad.", ".$data['distribuidor']->estado;
	   }	   
	   
	   
	   
	   
	### Filtra las ciudades de acuerdo al estado seleccionado...
		function filtra_ciudades($estado)
		{
			$data['ciudades']		= $this->distribuidor->getCiudades($estado);
			$this->load->view("distribuidores/filtra_ciudades",$data); 
		}  
}

?>