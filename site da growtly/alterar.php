<?php

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf  = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_EMAIL);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);


//echo "Nome: $nome <br>";
//echo "usuario: $usuario <br>";
//echo "senha: $senha <br>";
//echo "nivel: $nivel <br>";


$result_usuario = "INSERT INTO clientes (nome, cpf, email, senha, nivel) VALUES ('$nome', '$cpf', '$email', '$senha', 'cliente')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	
	header("Location: login.php");
}else{
	
	header("Location: cadastro.php");
}
