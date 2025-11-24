<?php
session_start();
require_once 'conexao.php';

if(!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit();
}

$plano_id = isset($_GET['plano']) ? intval($_GET['plano']) : 0;
$usuario_id = $_SESSION['usuario_id'];

$planos = [
    1 => "Plano Básico",
    2 => "Plano Gold",
    3 => "Plano Diamond"
];

$plano_nome = isset($planos[$plano_id]) ? $planos[$plano_id] : "Plano Desconhecido";

if($plano_id > 0){
    // Evitar duplicidade
    $check = mysqli_query($conn, "SELECT * FROM cliente_planos WHERE id_cliente=$usuario_id AND id_plano=$plano_id");
    if(mysqli_num_rows($check) == 0){
        $data_compra = date('Y-m-d H:i:s');
        $sql = "INSERT INTO cliente_planos (id_cliente, id_plano, data_compra) VALUES ($usuario_id, $plano_id, '$data_compra')";
        if(!mysqli_query($conn, $sql)){
            die("Erro ao registrar compra: " . mysqli_error($conn));
        }
    }
}

// Redireciona para exibir confirmação
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Compra Confirmada</title>
    <link href="bootstrap-5.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #000; color: #fff; display: flex; justify-content: center; align-items: center; height: 100vh; font-family: Arial, sans-serif; }
        .container { text-align: center; background: #111; padding: 40px; border-radius: 15px; box-shadow: 0 8px 20px rgba(0,0,0,0.5); }
        .btn { margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Compra Confirmada!</h1>
    <p>Você adquiriu o <strong><?php echo htmlspecialchars($plano_nome); ?></strong>.</p>
    <a href="index.php" class="btn btn-primary">Voltar para o site</a>
</div>
</body>
</html>
