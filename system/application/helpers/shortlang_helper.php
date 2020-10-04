<?php
	/*
	Autor: Daniel Valdivia
	Version: 1.1
	Fecha: 2010-02-28
		
	*/	
	function __($val)
	{
		$CI =& get_instance();
		return $CI->lang->line($val);
	}
?>