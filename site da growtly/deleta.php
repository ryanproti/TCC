<?php
session_start();
include "conexao.php";

// Verifica se o usuário é admin
if (!isset($_SESSION['usuario_nivel']) || $_SESSION['usuario_nivel'] !== "adm") {
    header("Location:index.php");
    exit;
}

// Pega o ID do cliente que vem pela URL
$id_cliente = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($id_cliente > 0){
    // Deleta os planos desse cliente primeiro
    mysqli_query($conn, "DELETE FROM cliente_planos WHERE id_cliente = $id_cliente");

    // Deleta o cliente
    mysqli_query($conn, "DELETE FROM clientes WHERE id = $id_cliente");
}

// Redireciona de volta para select2.php
header("Location: select2.php");
exit;
?>
