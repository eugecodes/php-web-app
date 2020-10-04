<?php
class logout extends Controller 
{
	
    ### Index...
	function index() 
	{
		session_unset();
		session_destroy();
		header("Location: /backoffice");
	}
	
}
?>
