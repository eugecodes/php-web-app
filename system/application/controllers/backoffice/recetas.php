<?php
class Recetas extends Controller 
{
	
	### Declaramos un atributo público
	public $receta= NULL;
	
	public function __construct()
   {
		parent::__construct();
		### Instanciamos el modelo y lo tenemos disponible en todo momento
		$this->receta= new Receta();		
   }
	
	
	function index()
	{
		$data=array();
		
		### Grid...
		$data['columnas'] 	= array(
								'No.'					=> 'id',
								'Titulo'				=> array('titulo_es',300),
								'Relacionar'	=> array('relacionar',70),
								'Editar'	=> array('editar',70),
								'Eliminar'	=> array('eliminar',70)
							  );
		$data['botones']  	= array(
								array('btnnombre'=>'Crear Receta','btncss'=>'btnAdd','btnfun'=>'btnAdd'),
							  );
		$data['controller'] = '/backoffice/recetas/main_query'; 
		
		### 4 Más recientes...
		$data['recientes']	=$this->receta->get_by_where('id IS NOT NULL',4);
		
		### Vistas...
		adminTop($data);
		$this->load->view('/backoffice/recetas/index',$data);
		adminBottom($data);
	}	
	
	
	
	
	### Query...	
	function main_query()
	{
		### Models & Vars...
		$rows	= array();
		$total	= 0;
		$offset	= ($_REQUEST['page']-1)*$_REQUEST['perpage'];
		$limit	= $_REQUEST['perpage'];

		### Where | Offset | Limit...
		$return = $this->receta->get_data_grid('id IS NOT NULL', $offset, $limit); 
		$res   	= $return['res'];
		$total 	= $return['total'];
		$i		= 0;
		foreach($res as $r)
		{
			$rows[$i]['id'] 			= $r->id;
			$rows[$i]['titulo_es'] 		= $r->titulo_es;
			$rows[$i]['relacionar'] 			= '<span class="grid_tool" title="Relacionar productos"><a href="/backoffice/recetas/relacionar/id/'.$r->id.'">Relacionar</a></span>';
			$rows[$i]['editar'] 			= '<span class="grid_tool" title="Editar receta"><a href="/backoffice/recetas/agregar/id/'.$r->id.'">Editar</a></span>';
			$rows[$i]['eliminar'] 			= '<span class="grid_tool" title="Eliminar receta" onclick="eliminarreceta('.$r->id.');">Eliminar</span>';

			$i++;
		}
		### Sort Jason...			
		if(!($_REQUEST['page']))
			$_REQUEST['page']=1;
		function sort_asc_json($a,$b)
		{
			if($a[$_REQUEST['sorton']]==$b[$_REQUEST['sorton']]) return 0;
			return ($a[$_REQUEST['sorton']] < $b[$_REQUEST['sorton']]) ? -1 : 1;
		}
		function sort_dsc_json($a,$b)
		{
			if($a[$_REQUEST['sorton']]==$b[$_REQUEST['sorton']]) return 0;
			return ($a[$_REQUEST['sorton']] > $b[$_REQUEST['sorton']]) ? -1 : 1;
		}
		($_REQUEST['sortby']=='ASC')?$sorfun='sort_asc_json':$sorfun='sort_dsc_json';
		usort($rows, $sorfun);
		$data['ret'] = array("page"=>$_REQUEST['page'], "total"=>$total, "data"=>$rows);
		echo json_encode($data['ret']);	
	}
	
	
	
		
	
	function agregar()
	{
		$data=array();
		
		
		if(isset($_POST['titulo_es']))
		{
			if($_POST['id']>0)
			{
				$recetaTable = Doctrine_Core::getTable('Receta');
				$receta = $recetaTable->findOneById($_POST['id']);
			}
			else
				$receta=new Receta();
				
			$receta->titulo_es=$_POST['titulo_es'];
			$receta->titulo_en=$_POST['titulo_en'];
			$receta->instrucciones_es=$_POST['instrucciones_es'];
			$receta->instrucciones_en=$_POST['instrucciones_en'];
			
			$receta->save();
			
			if(is_uploaded_file($_FILES['imagen']['tmp_name']))
			{ 
				$extension=str_replace(".","",strstr($_FILES['imagen']['name'],"."));

				$ruta="files/recetas/".$receta->id.$extension;
				if(move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta))
				{
					$receta->imagen=$ruta;
					$receta->save();	
				}
			}
			header("Location: /backoffice/recetas");
			
	
		}
		
		### Si estamos modificando el registro extraemos los datos de la subcategoria
		if($this->uri->segment(5)!='')
		{
			$qProducto = Doctrine_Query::create()
									->from('receta')
									->where('id=?',$this->uri->segment(5));
			$data['receta']=$qProducto->execute()->getFirst();	
		
					
		}			
						
		
		adminTop();
		$this->load->view("backoffice/recetas/agregar",$data);
		adminBottom();
	}
	
	function relacionar()
	{
		$data=array();
		
		if(isset($_POST['producto']))
		{
			$i=0;
			foreach($_POST['producto'] as $producto)
			{
				if($i==0)
					$cad=$producto;
				else
					$cad.=",".$producto;
				
				$i++;
			}
			echo $cad;
			$q=Doctrine_Query::create()->update('Receta')->set('id_producto',"'".$cad."'")->where('id=?',$_POST['id']);
			echo $q->getSqlQuery();
			$q->execute();
			
		}
		
		### Obtenemos la receta
		$qReceta=Doctrine_Query::create()->from('Receta')->where('id=?',$this->uri->segment(5));
		$data['receta']=$qReceta->execute()->getFirst();
		
		### Obtenemos los productos
		$qProductos=Doctrine_Query::create()->from('Producto')->orderBy('nombre_es');
		$data['productos']=$qProductos->execute();
		
		adminTop();
		$this->load->view("backoffice/recetas/relacionar",$data);
		adminBottom();
	}
	
	function eliminar()
	{
		Doctrine_Query::create()->delete('Receta')->where('id=?',$this->uri->segment(5))->execute();
		header("Location: /backoffice/recetas");
	}
	
	
	/*
	function modificar()
	{
		$this->agregarProducto();	
	}	
	
	
	function guardarProducto()
	{
		if(!isset($_POST['id']))
			header("Location: /backoffice/productos");
		else
		{	
		
			if($_POST['id']>0)
			{
				$productoTable = Doctrine_Core::getTable('Producto');
				$producto = $productoTable->findOneById($_POST['id']);
			}
			else
				$producto=new Producto();
				$producto->plu=$_POST['plu'];
				$producto->nombre=$_POST['nombre'];
				$producto->categoria_id=$_POST['categoria'];
				$producto->subcategoria_id=$_POST['subcategoria'];
				$producto->informacion=$_POST['informacion'];
				$producto->beneficios=$_POST['beneficios'];
				$producto->ingredientes=$_POST['ingredientes'];
				$producto->contenido=$_POST['contenido'];
				$producto->costo=$_POST['costo'];
				if($_POST['id']=="")
						$producto->activo=1;
				if(isset($_POST['nuevo']))		
					$producto->nuevo=$_POST['nuevo'];
				else
					$producto->nuevo=0;	
			$producto->save();
			
			
			### Ya que se guardó el producto proceso la imagen
			if(is_uploaded_file($_FILES['imagen']['tmp_name']))
			{ 
				$extension=str_replace(".","",strstr($_FILES['imagen']['name'],"."));
				if(!is_dir("files/productos/".$producto->id))
				{
					umask(000);
					mkdir("files/productos/".$producto->id,0777);
				}
				$ruta="files/productos/".$producto->id."/original.".$extension;
				if(move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta))
				{
					$producto->imagenoriginal=$ruta;
					$producto->save();	
				}
				
				### Partiendo de la imagen original creamos un thumb de 600 pixeles de ancho
				$config['image_library'] = 'gd2';
				$config['source_image'] = $ruta;
				$config['new_image'] = "files/productos/".$producto->id."/mediana.".$extension;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 600;
				
				$this->load->library('image_lib', $config);
				
				$image=new CI_Image_lib();
				$image->initialize($config);
				$image->resize();
				$image->clear();
				$producto->imagenmediana="files/productos/".$producto->id."/mediana.".$extension;
				$producto->save();	
				
				### Partiendo de la imagen original creamos un thumb de 150 pixeles de ancho
				$config['image_library'] = 'gd2';
				$config['source_image'] = $ruta;
				$config['new_image'] = "files/productos/".$producto->id."/pequena.".$extension;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 150;
				$image->initialize($config);
				$image->resize();
				$image->clear();
				$producto->imagenpequena="files/productos/".$producto->id."/pequena.".$extension;
				$producto->save();	
				
			}
		}
		header("Location: /backoffice/productos");
	}	
	
	
	function eliminar()
	{
		if($this->uri->segment(5)==0)
			$activo=1;
		else
			$activo=0;	
		
		$qProducto = Doctrine_Query::create()
									->update('producto')
									->set('activo=?',$activo)
									->where('id=?',$this->uri->segment(4));
		$qProducto->execute();	
		header("Location: /backoffice/productos");
	}
	
	
	
	function getXmlrelacionar()
	{
		$qProductos = Doctrine_Query::create()
								->from('Producto p')
								->where('p.id NOT IN  (SELECT pr.producto_relacionado_id  FROM  RelacionProducto pr WHERE pr.producto_id='.$this->uri->segment(4).')')
								->andWhere('p.id!='.$this->uri->segment(4).'');
		
		### Antes de aplicar clausulas a la consulta obtenemos el total de registros
		$total=$qProductos->count();
		
		### Aplicamos las clausulas a la consulta
		$offset=(($_POST['page']-1)*$_POST['rp']);
		$qProductos->limit($_POST['rp']);
		$qProductos->offset($offset);
		$qProductos->orderBy($_POST['sortname'].' '.$_POST['sortorder']);
		
		if(isset($_POST['query']) && !empty($_POST['query']))
			$qProductos->where("nombre LIKE ? ",array('%'.$_POST['query'].'%'));
		
		$dProductos=$qProductos->execute();
		
		
		### Generamos el XML de datos
		$xml='<rows><page>'.$_POST['page'].'</page><total>'.$total.'</total>';
		foreach($dProductos as $producto)
		{
			$xml.='<row id="'.$producto->id.'">';
				$xml.='<cell>'.$producto->nombre.'</cell>';
				$xml.='<cell>'.$producto->Categoria->nombre.'</cell>';
				$xml.='<cell>'.$producto->Subcategoria->nombre.'</cell>';
				$xml.='<cell><![CDATA[<input type="checkbox" class="chkRelacionar" name="relacionar_'.$producto->id.'"  id="relacionar_'.$producto->id.'" onclick="relacionar('.$producto->id.');" />]]></cell>';
			$xml.='</row>';
		}
		header ("Content-Type:text/xml");  
		echo $xml.="</rows>";		
		
	}	
	
	
	function getXmlrelacionados()
	{
		$qProductos = Doctrine_Query::create()
								->from('Producto p')
								->where('p.id  IN  (SELECT pr.producto_relacionado_id  FROM  RelacionProducto pr WHERE pr.producto_id='.$this->uri->segment(4).')')
								->andWhere('p.id!='.$this->uri->segment(4).'');
		
		### Antes de aplicar clausulas a la consulta obtenemos el total de registros
		$total=$qProductos->count();
		
		### Aplicamos las clausulas a la consulta
		$offset=(($_POST['page']-1)*$_POST['rp']);
		$qProductos->limit($_POST['rp']);
		$qProductos->offset($offset);
		$qProductos->orderBy($_POST['sortname'].' '.$_POST['sortorder']);
		
		if(isset($_POST['query']) && !empty($_POST['query']))
			$qProductos->where("nombre LIKE ? ",array('%'.$_POST['query'].'%'));
		
		$dProductos=$qProductos->execute();
		
		
		### Generamos el XML de datos
		$xml='<rows><page>'.$_POST['page'].'</page><total>'.$total.'</total>';
		foreach($dProductos as $producto)
		{
			$xml.='<row id="'.$producto->id.'">';
				$xml.='<cell>'.$producto->nombre.'</cell>';
				$xml.='<cell>'.$producto->Categoria->nombre.'</cell>';
				$xml.='<cell>'.$producto->Subcategoria->nombre.'</cell>';
				$xml.='<cell><![CDATA[<input type="checkbox" checked="checked" class="chkRelacionar" name="relacionar_'.$producto->id.'"  id="relacionar_'.$producto->id.'" onclick="relacionar('.$producto->id.');" />]]></cell>';
			$xml.='</row>';
		}
		header ("Content-Type:text/xml");  
		echo $xml.="</rows>";		
		
	}
	
	
	function getXmlrEspecificaciones()
	{
		$qProductos = Doctrine_Query::create()
								->from('Icono');
		
		### Antes de aplicar clausulas a la consulta obtenemos el total de registros
		$total=$qProductos->count();
		
		### Aplicamos las clausulas a la consulta
		$offset=(($_POST['page']-1)*$_POST['rp']);
		$qProductos->limit($_POST['rp']);
		$qProductos->offset($offset);
		$qProductos->orderBy($_POST['sortname'].' '.$_POST['sortorder']);
		
		if(isset($_POST['query']) && !empty($_POST['query']))
			$qProductos->where("nombre LIKE ? ",array('%'.$_POST['query'].'%'));
		
		$dProductos=$qProductos->execute();
		
		
		### Generamos el XML de datos
		$xml='<rows><page>'.$_POST['page'].'</page><total>'.$total.'</total>';
		foreach($dProductos as $producto)
		{
			$checked="";
			
			$qProductoIcono=Doctrine_Query::create()
										->from('ProductoIcono')
										->where('producto_id=? AND icono_id=?',array($this->uri->segment(4),$producto->id));
			if($qProductoIcono->count()>0)
				$checked="checked";							
			
			
			$xml.='<row id="'.$producto->id.'">';
				$xml.='<cell>'.$producto->nombre.'</cell>';
				$xml.='<cell><![CDATA[<img src="/'.$producto->imagen.'" />]]></cell>';
				$xml.='<cell><![CDATA[<input type="checkbox" '.$checked.' class="chkRelacionar" name="relacionar_'.$producto->id.'"  id="relacionar_'.$producto->id.'" onclick="relacionar('.$producto->id.');" />]]></cell>';
			$xml.='</row>';
		}
		header ("Content-Type:text/xml");  
		echo $xml.="</rows>";		
		
	}	
			

	
	
	
	function getSubcategorias($categoria)
	{
		$qSubCategoria = Doctrine_Query::create()
								->from('Subcategoria')
								->where('categoria_id=?',$categoria)
								->orderBy('nombre');
		$subcategorias=$qSubCategoria->execute();	
		
		echo '<option value="">Elija una sub categoría</option>';	
		foreach($subcategorias as $subcategoria)
		{
			echo '<option value="'.$subcategoria->id.'">'.$subcategoria->nombre.'</option>';	
		}
	}
	
	
	
	
	function verRelacionados()
	{
		adminTop();
		$this->load->view("backoffice/productos/relacionados");
		adminBottom();
	}
	
    function especificaciones()
	{
		adminTop();
		$this->load->view("backoffice/productos/especificaciones");
		adminBottom();
	}	
	
	function generarRelacion()
	{
		$url=$this->uri->uri_to_assoc(4);
		
		$qRelacionar = Doctrine_Query::create()
								->from('RelacionProducto')
								->where('producto_id=? AND producto_relacionado_id =?',array($url['idProducto'],$url['relacion']));
		### Si ya existe esta relacion, significa que entonces se desea eliminar la relación
		if($qRelacionar->count()>0)
		{
			$qRelacionar = Doctrine_Query::create()
								->delete('RelacionProducto')
								->where('producto_id=? AND producto_relacionado_id =?',array($url['idProducto'],$url['relacion']));
			$qRelacionar->execute();					
		}
		else
		{
			$relacion= new RelacionProducto();
				$relacion->producto_id=	$url['idProducto'];
				$relacion->producto_relacionado_id=$url['relacion'];
			$relacion->save();	
		}
	}
	
	
	function generarRelacionEspecificacion()
	{
		$url=$this->uri->uri_to_assoc(4);
		
		$qProductoIcono=Doctrine_Query::create()
										->from('ProductoIcono')
										->where('producto_id=? AND icono_id=?',array($url['idProducto'],$url['relacion']));
		### Si ya existe esta relacion, significa que entonces se desea eliminar la relación
		if($qProductoIcono->count()>0)
		{
			$qRelacionar = Doctrine_Query::create()
								->delete('ProductoIcono')
								->where('producto_id=? AND icono_id =?',array($url['idProducto'],$url['relacion']));
			$qRelacionar->execute();					
		}
		else
		{
			$relacion= new ProductoIcono();
				$relacion->producto_id=	$url['idProducto'];
				$relacion->icono_id=$url['relacion'];
			$relacion->save();	
		}
	}	
	*/

}
?>
