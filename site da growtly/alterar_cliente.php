<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Criar Conta - Growtly</title>
  <link rel="stylesheet" href="./css/cadastro.css">
</head>

<body>

      <button class="back-button" onclick="window.history.back()">
  ←
 </button>
 
  <div class="form-container">
    <h2>Alterar Informações</h2>
    <form id="form1" name="form1" method="post" action="alterar.php">
      <label for="id">ID</label>
      <input type="text" name="id" id="id" required>

      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>

      <label for="cpf">CPF</label>
      <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" required>

      <label for="email">E-mail</label>
      <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>

      <label for="senha">Senha</label>
      <input type="password" name="senha" id="senha" placeholder="Crie uma senha" required>

      <button type="submit"name="enviar" id="enviar" >Alterar</button>
      <p id="mensagem" class="mensagem-sucesso"></p>
    </form>
  </div>

  <script>
    const form = document.getElementById('cadastro-form');
    const mensagem = document.getElementById('mensagem');

    form.addEventListener('submit', function(e) {
      e.preventDefault();

      // Simulação visual
      mensagem.textContent = "Conta criada com sucesso!";
      mensagem.style.display = "block";

      // Limpa os campos
      form.reset();
    });
  </script>
</body>
</html>
