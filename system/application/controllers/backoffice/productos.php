<?php
class Productos extends Controller 
{
	
    ### Index...
	function index() 
	{
		adminTop();
		$this->load->view("backoffice/productos/productos");
		adminBottom();
	}
	
	
	function getXml()
	{
		$qProductos = Doctrine_Query::create()
								->from('Producto');
		
		### Antes de aplicar clausulas a la consulta obtenemos el total de registros
		$total=$qProductos->count();
		
		### Aplicamos las clausulas a la consulta
		$offset=(($_POST['page']-1)*$_POST['rp']);
		$qProductos->limit($_POST['rp']);
		$qProductos->offset($offset);
		$qProductos->orderBy($_POST['sortname'].' '.$_POST['sortorder']);
		
		if(isset($_POST['query']) && !empty($_POST['query']))
			$qProductos->where("nombre LIKE ? OR plu LIKE ?",array('%'.$_POST['query'].'%','%'.$_POST['query'].'%'));
		
		$dProductos=$qProductos->execute();
		
		
		### Generamos el XML de datos
		$xml='<rows><page>'.$_POST['page'].'</page><total>'.$total.'</total>';
		foreach($dProductos as $producto)
		{
			$xml.='<row id="'.$producto->id.'">';
				$xml.='<cell>'.$producto->plu.'</cell>';
				$xml.='<cell>'.$producto->nombre.'</cell>';
				$xml.='<cell>'.$producto->Categoria->nombre.'</cell>';
				$xml.='<cell>'.$producto->Subcategoria->nombre.'</cell>';
				$estatus=($producto->activo==1)?"activo.png":"inactivo.png";
				$xml.='<cell><![CDATA[<img src="/images/table/'.$estatus.'" width="22" />]]></cell>';
				$xml.='<cell><![CDATA[<a href="/backoffice/productos/relacionar/'.$producto->id.'">Relacionar</a>]]></cell>';
				$xml.='<cell><![CDATA[<a href="/backoffice/productos/verRelacionados/'.$producto->id.'">Ver</a>]]></cell>';
				$xml.='<cell><![CDATA[<a href="/backoffice/productos/especificaciones/'.$producto->id.'"><img src="/images/table/especificaciones.png" border="0" width="18" /></a>]]></cell>';
				$xml.='<cell><![CDATA[<a href="/backoffice/productos/modificar/'.$producto->id.'"><img src="/images/table/modify.png" border="0" width="16" /></a>]]></cell>';
				$estatus=($producto->activo==1)?"Eliminar":"Restaurar";
				$xml.='<cell><![CDATA[<a href="/backoffice/productos/eliminar/'.$producto->id.'/'.$producto->activo.'">'.$estatus.'</a>]]></cell>';				
			$xml.='</row>';
		}
		header ("Content-Type:text/xml");  
		echo $xml.="</rows>";		
		
	}
	
	
	
		
	
	function agregarProducto()
	{
		$data=array();
		
		$qCategoria = Doctrine_Query::create()
								->from('Categoria')
								->orderBy('nombre');
		$data['categorias']=$qCategoria->execute();		
		
		### Si estamos modificando el registro extraemos los datos de la subcategoria
		if($this->uri->segment(3)=="modificar")
		{
			$qProducto = Doctrine_Query::create()
									->from('producto')
									->where('id=?',$this->uri->segment(4));
			$data['producto']=$qProducto->execute()->getFirst();	
			
			$qSubCategoria = Doctrine_Query::create()
									->from('Subcategoria')
									->where('categoria_id=?',$data['producto']->categoria_id)
									->orderBy('nombre');
			$data['subcategorias']=$qSubCategoria->execute();				
					
		}			
						
		
		adminTop();
		$this->load->view("backoffice/productos/agregarProducto",$data);
		adminBottom();
	}
	
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
	
	
	function relacionar()
	{
		adminTop();
		$this->load->view("backoffice/productos/relacionar");
		adminBottom();
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
	

}
?>
