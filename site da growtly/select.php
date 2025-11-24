
<?php
include "conexao.php";

?>

<?php

session_start();

	if($_SESSION['nivel'] == "adm" || $_SESSION['nivel'] == "cliente" )  {
		echo "<center>BEM VINDO VOCÊ ESTÁ LOGADO NA ÁREA DO ADMINISTRADOR</center>";	
		
		
		
		}else{
	
			
			header("Location:index.php");
		exit;
			
	}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1> VOCÊ ACABA DE ENTRAR NA PÁGINA BONUS APROVEITE NOSSAS PROMOÇÕES</h1>
</body>
</html>