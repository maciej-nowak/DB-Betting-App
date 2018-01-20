<?php
	ini_set('session.gc_maxlifetime',60); 
	session_start();
	
	if (isset($_SESSION['login']))
	{
		$_SESSION = array();
		
		if (isset($_COOKIE[session_name()]))
		{
			setcookie('login', '', time() - 3600);
		}
		
		session_destroy();
	}
	header('Location: index.php'); 
?>