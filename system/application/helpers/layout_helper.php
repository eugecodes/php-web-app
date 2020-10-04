<?php

	function top($data=array())
	{
		$CI =& get_instance();
		$data=array();
		
		$data['bodyClass']="";
		if($CI->uri->segment(1)=='' || $CI->uri->segment(1)=='home')
			$data['bodyClass']='class="home"';
		if($CI->uri->segment(1)=='pouch')
			$data['bodyClass']='class="pouch"';	
		


		
		
		$CI->load->view('layout/top',$data);
	}
	
	function bottom($data=array())
	{
		$CI =& get_instance();
		$CI->load->view('layout/bottom',$data);
	}
	
	
	
	function adminTop($data=array())
	{
		$CI =& get_instance();
		$CI->load->view('backoffice/layout/top',$data);
	}
	
	function adminBottom($data=array())
	{	
		$CI =& get_instance();
		$CI->load->view('backoffice/layout/footer',$data);
	}	
?>