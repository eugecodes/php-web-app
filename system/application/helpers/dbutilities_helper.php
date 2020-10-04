<?php

    function listarEstados($id=0)
    {
        $CI=& get_instance();

        $qEstados=Doctrine_Query::create()
        ->from('Estado')
        ->orderBy('estado ASC');

        if($id!=0)
            $qEstados->where('id = ?',$id);
        

        $estados= $qEstados->execute();

        return $estados;
    }

    function listarCiudades($id,$ciudad=0)
    {
         $qCiudades=Doctrine_Query::create()
        ->from('Ciudad')
        ->where('estado_id=?',$id)
        ->orderBy('ciudad ASC');
		if($ciudad>0)
			$qCiudades->andWhere('id=?',$ciudad);
         
         $ciudades=$qCiudades->execute();

         return $ciudades;

    }

    function listarSucursales($id=0)
    {
        $CI=& get_instance();

        $qSucursales=Doctrine_Query::create()
        ->from('Sucursal')
        ->orderBy('numero ASC');

        if($id!=0)
            $qSucursales->where('id = ?',$id);

        $sucursales= $qSucursales->execute();

        return $sucursales;
    }

    function listarEtapas($id=0)
    {
        $CI=& get_instance();

        $query=Doctrine_Query::create()
        ->from('Etapa')
        ->orderBy('etapa ASC');

        if($id!=0)
            $query->where('id = ?',$id);

        $registros= $query->execute();

        return $registros;
    }

    function listarOrigen($id=0)
    {
        $CI=& get_instance();

        $query=Doctrine_Query::create()
        ->from('Origen')
        ->orderBy('origen ASC');

        if($id!=0)
            $query->where('id = ?',$id);

        $registros= $query->execute();

        return $registros;
    }

    function listarGenero($id=0)
    {
        $CI=& get_instance();

        $query=Doctrine_Query::create()
        ->from('Genero')
        ->orderBy('genero ASC');

        if($id!=0)
            $query->where('id = ?',$id);

        $registros= $query->execute();

        return $registros;
    }

    function listarSubGenero($id=0,$genero=0)
    {
        $CI=& get_instance();

        $query=Doctrine_Query::create()
        ->from('Subgenero')
        ->orderBy('subgenero ASC');

        if($id!=0)
            $query->where('id = ?',$id);
        if($genero!=0)
            $query->where('genero_id = ?',$genero);

        $registros= $query->execute();

        return $registros;
    }

    function listarRol($id=0)
    {
        $CI=& get_instance();

        $query=Doctrine_Query::create()
        ->from('Rol')
        ->orderBy('rol ASC');

        if($id!=0)
            $query->where('id = ?',$id);


        $registros= $query->execute();

        return $registros;
    }

    function listarSeguimiento($id=0)
    {
        $CI=& get_instance();

        $query=Doctrine_Query::create()
        ->from('Seguimiento')
        ->orderBy('seguimiento ASC');

        if($id!=0)
            $query->where('id = ?',$id);


        $registros= $query->execute();

        return $registros;
    }


    function listarPerfil($id=0)
    {
        $CI=& get_instance();

        $query=Doctrine_Query::create()
        ->from('Perfil')
        ->orderBy('perfil ASC');

        if($id!=0)
            $query->where('id = ?',$id);


        $registros= $query->execute();

        return $registros;
    }
	
    function listarEstatus($id=0)
    {
        $CI=& get_instance();

        $query=Doctrine_Query::create()
        ->from('Estatus')
        ->orderBy('estatus ASC');

        if($id!=0)
            $query->where('id = ?',$id);


        $registros= $query->execute();

        return $registros;
    }	
	
	function calculaColor($obraId)
	{
		$qObra=Doctrine_Query::create()
        ->from('Obra')
		->where('id=?',$obraId);
		$obra=$qObra->execute()->getFirst();
		
		$fecha=explode(" ",$obra->created_at);
		
		$hora=explode(":",$fecha[1]);
		$f=explode("-",$fecha[0]);
		$fechaCracion=mktime($hora[0],$hora[1],$hora[2],$f[1],$f[2],$f[0]);
		$hoy=mktime();
		
		$diferencia=$hoy-$fechaCracion;
		
		$tiempo=$diferencia/(60*60);
		
		
		$qAsignacion=Doctrine_Query::create()
        ->from('ObraUsuario')
		->where('obra_id=? AND ObraUsuario.Usuario.perfil=?',array($obraId,4));
		$asignacion=$qAsignacion->execute()->getFirst();
		
		if($qAsignacion->count()==0 && $tiempo>24 && $tiempo<120)
		{
			return "amarillo";	
		}
		if($qAsignacion->count()==0 && $tiempo>120)
		{
			return "rojo";
		}
		

		
		return "verde";
		
	}

	
	
?>