<?php
include_once("conexao.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['enviar'])) {
    header("Location: cadastro.php");
    exit;
}

$nome  = trim($_POST['nome'] ?? '');
$cpf   = preg_replace('/\D/', '', $_POST['cpf'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');
$endereco = trim($_POST['endereco'] ?? '');

if (!$nome || !$cpf || !$email || !$senha) {
    exit("Faltando dados.");
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$ins = $conn->prepare("INSERT INTO clientes (nome, cpf, endereco, email, senha, nivel) VALUES (?, ?, ?, ?, ?, 'cliente')");
$ins->bind_param("sssss", $nome, $cpf, $endereco, $email, $senha_hash);
$ok = $ins->execute();

if ($ok) {
    header("Location: login.php");
    exit();
} else {
    header("Location: cadastro.php?erro=Erro ao cadastrar");
    exit();
}
?>
