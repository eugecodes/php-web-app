<?php

/**
 * ProductoReceta
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ProductoReceta extends BaseProductoReceta
{
	public static function estarelacionado($producto,$receta)
	{
		$q=Doctrine_Query::create()->from('Receta')->where('id_producto LIKE ? AND id=?',array("%".$producto."%",$receta));
		if($q->count()>0)
			return true;
		else
			return false;	
	}

}