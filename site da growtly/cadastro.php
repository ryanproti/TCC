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
    <h2>Criar Conta</h2>
    <form id="form1" name="form1" method="post" action="inseri.php">
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>

      <label for="cpf">CPF</label>
      <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" maxlength="14" required>

      <label for="endereco">Endereço</label>
    <input type="text" name="endereco" id="endereco" placeholder="Digite seu endereço" required>

      <label for="email">E-mail</label>
      <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>

      <label for="senha">Senha</label>
      <input type="password" name="senha" id="senha" placeholder="Crie uma senha" required>

      <button type="submit"name="enviar" id="enviar" >Criar Conta</button>
      <p id="mensagem" class="mensagem-sucesso"></p>
    </form>

    <p class="login-link">Já tem conta? <a href="login.php">Entrar</a></p>
  </div>

  <script>
    const form = document.getElementById('form1');
    const mensagem = document.getElementById('mensagem');

   form.addEventListener('submit', function(e) {
  // Mostra a mensagem de sucesso
  mensagem.textContent = "Conta criada com sucesso!";
  mensagem.style.display = "block";

  });

  </script>

  <script>
  const cpfInput = document.getElementById('cpf');

  cpfInput.addEventListener('input', function () {
    let valor = cpfInput.value.replace(/\D/g, ''); 
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    cpfInput.value = valor;
  });
</script>

</body>
</html>
