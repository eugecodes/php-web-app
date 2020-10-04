<?php

/**
 * Distribuidor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Distribuidor extends BaseDistribuidor
{
	function getEstados()
	{
		$query = Doctrine_Query::create()
		->select('distinct(estado) as estado')
		->from('Distribuidor')
		->orderBy('estado ASC');
		
		return $query->execute();
	}
	
	
	function getTiendas()
	{
		$query = Doctrine_Query::create()
		->select('DISTINCT(nombre) as nombre')
		->from('Distribuidor')
		->orderBy('nombre ASC');
		
		return $query->execute();
	}	
	
	function getCiudades($estado=false)
	{
		$query = Doctrine_Query::create()
		->select('distinct(ciudad) as ciudad')
		->from('Distribuidor');
		
		if($estado)
		{
			$query->where('estado= ? ',$estado);
		}
		
		$query->orderBy('ciudad ASC');
		return $query->execute();
	}
	
	function getDistribuidores($estado=false, $ciudad=false, $nombre=false, $cp=false)
	{
		$query = Doctrine_Query::create()
		->from('Distribuidor')
		->orderBy('ciudad ASC');

		
		if($nombre && $nombre != '' && $nombre!= 'all')
			$query->addWhere('nombre = "'.$nombre.'"');
			
		if($estado && $estado != '' && $estado!= 'all')
			$query->addWhere('estado = ?', $estado);
			
		if($ciudad && $ciudad != '' && $ciudad!= 'all')
			$query->addWhere('ciudad = ?',$ciudad);
			
		if($cp && $cp != '' && $cp!= 'all')
			$query->addWhere('cp = ?',$cp);
		
		//echo $query->getSqlQuery();	
			
		return $query->execute();	
	}
	
	function getDistribuidor($id)
	{
		$query = Doctrine_Query::create()
		->from('Distribuidor')
		->where('id=?',$id)
		->orderBy('ciudad ASC');
		

			
		return $query->execute()->getFirst();	
	}

}