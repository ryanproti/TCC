<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.php");
    exit();
}

// Pega dados do POST
$email = trim($_POST["email"] ?? "");
$senha = trim($_POST["senha"] ?? "");

if (empty($email) || empty($senha)) {
    header("Location: login.php?erro=Preencha todos os campos");
    exit();
}

// Consulta o usuário
$stmt = $conn->prepare("SELECT id, nome, email, senha, nivel FROM clientes WHERE email = ? LIMIT 1");
if (!$stmt) {
    die("Erro ao preparar consulta: " . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    header("Location: login.php?erro=E-mail não encontrado");
    exit();
}

// Recupera dados do usuário
$stmt->bind_result($id, $nome, $emailDB, $senhaDB, $nivel);
$stmt->fetch();

if (!password_verify($senha, $senhaDB)) {
    header("Location: login.php?erro=Senha incorreta");
    exit();
}

// Normaliza nível
$nivel = strtolower(trim($nivel));

// Cria sessão
$_SESSION['usuario_id'] = $id;
$_SESSION['usuario_nome'] = $nome;
$_SESSION['usuario_email'] = $emailDB;
$_SESSION['usuario_nivel'] = $nivel;

// **Sem verificação ou inserção de plano automático**
// Redireciona direto para a página correta
if ($nivel === "adm") {
    header("Location: select2.php");
} else {
    header("Location: select.php");
}
exit();
?>
