<?php

	session_start();// para destruir a sessão tem que abrir 
	session_destroy();
	header("Location:index.php");// este código fecha as páginas.



?>