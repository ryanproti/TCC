<?php
session_start();
require_once 'conexao.php';

// Exibir erros para debug (remover em produção)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verifica se o usuário está logado
if(!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit();
}

$plano_id = isset($_GET['plano']) ? intval($_GET['plano']) : 0;
$usuario_id = $_SESSION['usuario_id'];

// Definição dos planos
$planos = [
    1 => ["nome" => "Plano Básico", "preco" => 500, "cor" => "#3498db"],
    2 => ["nome" => "Plano Gold", "preco" => 1000, "cor" => "#f1c40f"],
    3 => ["nome" => "Plano Diamond", "preco" => 1500, "cor" => "#9b59b6"]
];

if(!isset($planos[$plano_id])){
    die("Plano inválido.");
}

$plano_nome = $planos[$plano_id]['nome'];
$plano_preco = $planos[$plano_id]['preco'];
$plano_cor = $planos[$plano_id]['cor'];

// Processamento do formulário
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data_compra = date('Y-m-d H:i:s');

    // Verifica se o usuário já comprou este plano
    $check = mysqli_query($conn, "SELECT * FROM cliente_planos WHERE id_cliente=$usuario_id AND id_plano=$plano_id");
    if(!$check){
        die("Erro no SELECT: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($check) == 0){
        $sql = "INSERT INTO cliente_planos (id_cliente, id_plano, data_compra) VALUES ($usuario_id, $plano_id, '$data_compra')";
        if(!mysqli_query($conn, $sql)){
            die("Erro ao registrar compra: " . mysqli_error($conn));
        }
    }

    // Redireciona para página de confirmação
    header("Location: confirmacao.php?plano=$plano_id&success=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Pagamento - <?php echo htmlspecialchars($plano_nome); ?></title>
<link href="bootstrap-5.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background: #e4e7eb;
        color: #222;
        font-family: 'Segoe UI', Arial, sans-serif;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }
    .container {
        background: #f7f9fa;
        padding: 40px;
        border-radius: 20px;
        max-width: 480px;
        width: 100%;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        transition: transform 0.3s;
    }
    .container:hover { transform: translateY(-5px); }
    h1 { text-align: center; margin-bottom: 30px; color: <?php echo $plano_cor; ?>; }
    .plan-info {
        background: <?php echo $plano_cor; ?>33;
        padding: 15px;
        border-radius: 15px;
        margin-bottom: 25px;
        text-align: center;
        transition: background 0.3s;
    }
    .plan-info:hover { background: <?php echo $plano_cor; ?>55; }
    .plan-info h3 { margin: 0; }
    .plan-info p { margin: 5px 0 0; font-weight: bold; }
    .form-control {
        border-radius: 10px;
        background: #fff;
        border: 1px solid #ccc;
        color: #222;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    .form-control:focus {
        border-color: <?php echo $plano_cor; ?>;
        box-shadow: 0 0 10px <?php echo $plano_cor; ?>33;
        background: #fff;
        color: #222;
    }
    .btn-primary {
        background: <?php echo $plano_cor; ?>;
        border: none;
        border-radius: 12px;
        width: 100%;
        font-weight: bold;
        padding: 12px;
        transition: background 0.3s, transform 0.2s;
    }
    .btn-primary:hover {
        background: <?php echo $plano_cor; ?>cc;
        transform: scale(1.03);
    }
    label { font-weight: bold; color: #444; }
</style>
</head>
<body>
<div class="container">
<div style="text-align: right; margin-bottom: 15px;">
    <a href="index.php" class="btn btn-outline-secondary" style="border-radius: 10px; padding: 6px 12px;">Cancelar / Voltar</a>
</div>

<h1>Pagamento</h1>
<div class="plan-info">
    <h3><?php echo htmlspecialchars($plano_nome); ?></h3>
    <p>R$ <?php echo number_format($plano_preco, 2, ',', '.'); ?></p>
</div>

<form method="POST" id="pagamentoForm">
    <div class="mb-3">
        <label for="nome_cartao">Nome no Cartão</label>
        <input type="text" id="nome_cartao" name="nome_cartao" class="form-control" placeholder="Como está no cartão" maxlength="50" required>
    </div>
    <div class="mb-3">
        <label for="numero_cartao">Número do Cartão</label>
        <input type="text" id="numero_cartao" name="numero_cartao" class="form-control" placeholder="0000 0000 0000 0000" maxlength="19" required>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="validade">Validade</label>
            <input type="text" id="validade" name="validade" class="form-control" placeholder="MM/AA" maxlength="5" required>
        </div>
        <div class="col">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" class="form-control" placeholder="123" maxlength="3" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Finalizar Pagamento</button>
</form>
</div>

<script>
const numeroCartao = document.getElementById('numero_cartao');
const validade = document.getElementById('validade');
const cvv = document.getElementById('cvv');

// Máscara número do cartão
numeroCartao.addEventListener('input', function(){
    let v = this.value.replace(/\D/g, '');
    v = v.substr(0,16);
    v = v.replace(/(.{4})/g, '$1 ');
    this.value = v.trim();
});

// Máscara validade
validade.addEventListener('input', function(){
    let v = this.value.replace(/\D/g, '');
    if(v.length > 2) v = v.substr(0,2) + '/' + v.substr(2,2);
    this.value = v;
});

// CVV apenas números
cvv.addEventListener('input', function(){
    this.value = this.value.replace(/\D/g,'').substr(0,3);
});
</script>
</body>
</html>
