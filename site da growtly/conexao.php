<?php
$servidor = "growtly.mysql.dbaas.com.br";
$usuario = "growtly";
$senha = "Growtly12345!";
$dbname = "growtly";


//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);


if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

?>