<?php

/**
 * Producto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Producto extends BaseProducto
{
	public function getProducto($id='')
	{
		if(empty($id))
			$q=Doctrine_Query::create()->from('Producto')->orderBY('id');
		else	
			$q=Doctrine_Query::create()->from('Producto')->where('id=?',$id)->orderBY('id');
			
		return $q->execute()->getFirst();	
	}
	
	public function getRestante($excluir)
	{
		$q=Doctrine_Query::create()->from('Producto')->where('id!=?',$excluir)->orderBY('id');
			
		return $q->execute();	
	}	
	
	public function getProductos()
	{
		$q=Doctrine_Query::create()->from('Producto')->orderBY('id');
			
		return $q->execute();	
	}		

}