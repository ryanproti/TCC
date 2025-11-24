<?php
include "conexao.php";
session_start();

if (!isset($_SESSION['usuario_nivel']) || $_SESSION['usuario_nivel'] !== "adm") {
    header("Location:index.php");
    exit;
}

// Array de nomes de planos
$planos = [
    1 => "Plano Básico",
    2 => "Plano Gold",
    3 => "Plano Diamond"
];

// Função para buscar planos do cliente
function getPlanos($conn, $id_cliente){
    global $planos;
    $sql = "SELECT id_plano, data_compra FROM cliente_planos WHERE id_cliente = $id_cliente ORDER BY data_compra DESC";
    $resultado = mysqli_query($conn, $sql);
    $lista = [];
    while($row = mysqli_fetch_assoc($resultado)){
        $row['nome_plano'] = isset($planos[$row['id_plano']]) ? $planos[$row['id_plano']] : "Plano Desconhecido";
        $lista[] = $row;
    }
    return $lista;
}

// Buscar clientes sem duplicar
$sql_clientes = "SELECT DISTINCT id, nome, email FROM clientes ORDER BY nome ASC";
$resultado_clientes = mysqli_query($conn, $sql_clientes);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Clientes</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
body {
    background: #f5f5f5;
    font-family: Arial, sans-serif;
}
.table thead {
    background-color: #343a40;
    color: #fff;
}
.table tbody tr td {
    vertical-align: middle;
}
.btn-ver-planos {
    background-color: #007bff;
    color: #fff;
}
.btn-ver-planos:hover {
    background-color: #0056b3;
    color: #fff;
}
.modal-header {
    background-color: #343a40;
    color: #fff;
}
</style>
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Clientes</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ver Planos</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
        <?php while($linha = mysqli_fetch_assoc($resultado_clientes)): ?>
            <tr>
                <td><?php echo htmlspecialchars($linha['nome']); ?></td>
                <td><?php echo htmlspecialchars($linha['email']); ?></td>
                <td>
                    <button class="btn btn-ver-planos" data-toggle="modal" data-target="#modal<?php echo $linha['id']; ?>">Ver Planos</button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal<?php echo $linha['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $linha['id']; ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel<?php echo $linha['id']; ?>">Planos de <?php echo htmlspecialchars($linha['nome']); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <ul class="list-group">
                                <?php
                                $planos_cliente = getPlanos($conn, $linha['id']);
                                if(count($planos_cliente) > 0){
                                    foreach($planos_cliente as $plano){
                                        echo "<li class='list-group-item'><strong>".$plano['nome_plano']."</strong> - ".date('d/m/Y H:i', strtotime($plano['data_compra']))."</li>";
                                    }
                                } else {
                                    echo "<li class='list-group-item'>Nenhum plano registrado</li>";
                                }
                                ?>
                            </ul>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
                <td align="center" valign="middle" bgcolor="#FFFFFF">
    <a href="deleta.php?id=<?php echo $linha['id']; ?>" 
       onclick="return confirm('Tem certeza que deseja deletar <?php echo addslashes($linha['nome']); ?>?');">
       Deletar
    </a>
</td>

            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
