<?php
	/*
		Autor:         Oscar Adrián López Macías.
		Fecha:         25 de Febrero de 2011.
		Propóstio:     Tener un convertidor de fechas que pueda ser enriquecido con más formatos.
		Documentación: $date:   La fecha a transformar...
					   $format: Y-m-d, d-m-Y, etc...
	*/
	function dateTransformer($date,$format){ 
		$meses = array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
		
		switch ($format) 
		{
			case 'm/d/Y':
				$xpd = explode("/",$date);
				echo $xpd[1]." de ".$meses[$xpd[0]]." ".$xpd[2];
			break;	
		} 
	}
	
		function display($item, $key) {
	print "$key => $item\n";
}

	
	function fecha($fecha, $h=false)
	{
		if($h)
		{
			$h=explode(" ",$fecha);
			$fecha=$h[0];
		}
		
		$f=explode("-",$fecha);
		
		return $f[2]."/".$f[1]."/".$f[0];
	}
	
	function fechaMySql($fecha)
	{
		$f=explode("/",$fecha);
		return  $f[2]."-".$f[1]."-".$f[0];
	
	}
	
	
	
	/*
		Autor:         Oscar Adrián López Macías.
		Fecha:         25 de Febrero de 2011.
		Propóstio:     Corta textos largos y los presenta en una versión recortada.
		Documentación: $cadena:   El texto a cortar...
					   $longitud: Cantidad de caracteres en que será cortado...
	*/
	function cutString($cadena,$longitud)
	{
		if(strlen($cadena)>$longitud)
		  $addpoits="...";
		else
		  $addpoits="";
		  
		$texto=substr($cadena,0,$longitud);
		
		return $texto.$addpoits;
	}
	
	/**
	 * @autor: Daniel Valdivia
	 * @Creado: 2010
	 */
	function fecha_humana($fecha,$tipo='fecha')
	{	
		if($tipo == 'fecha')
		{
			$date = new DateTime($fecha);
			$mes = $date->format("m");
			$mesLetra = '';

			switch($mes) 
			{
				case 1: $mesLetra = 'Enero'; break;
				case 2: $mesLetra = 'Febrero'; break;
				case 3: $mesLetra = 'Marzo'; break;
				case 4: $mesLetra = 'Abril'; break;
				case 5: $mesLetra = 'Mayo'; break;
				case 6: $mesLetra = 'Junio'; break;
				case 7: $mesLetra = 'Julio'; break;
				case 8: $mesLetra = 'Agosto'; break;
				case 9: $mesLetra = 'Septiembre'; break;
				case 10: $mesLetra = 'Octubre'; break;
				case 11: $mesLetra = 'Noviembre'; break;
				case 12: $mesLetra = 'Diciembre'; break;
				default: $mesLetra = 'desconocido'; break;
			}

			return $date->format('d') . ' de '.$mesLetra.' del '.$date->format('Y');
		}
		else if($tipo == 'hora')
		{
			if($fecha == '')
			return 'Nunca';

			$date = new DateTime($fecha);
			$since = $date->format('U');
			$since = time() - $since;

			$chunks = array
			(
				array(60 * 60 * 24 * 365 , 'año'),
				array(60 * 60 * 24 * 30 , 'mes'),
				array(60 * 60 * 24 * 7, 'semana'),
				array(60 * 60 * 24 , 'dia'),
				array(60 * 60 , 'hora'),
				array(60 , 'minuto'),
				array(1 , 'segundo')
			);

			for ($i = 0, $j = count($chunks); $i < $j; $i++) 
			{
				$seconds = $chunks[$i][0];
				$name = $chunks[$i][1];

				if (($count = floor($since / $seconds)) != 0)
					break;
			}

			if($name == 'mes' || $name == 'año')
				$print = $date->format('m/d/Y');
			else
				$print = ($count == 1) ? 'hace '.'1 '.$name : 'hace '."$count {$name}s";

			return $print;
		}
	}
?>