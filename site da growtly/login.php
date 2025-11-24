<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Growtly</title>
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  
  <button class="back-button" onclick="window.history.back()">
  ←
 </button>

  <div class="login-container">
    <h2>Bem-vindo!</h2>
    <form action="valida.php"name="form1" id="form1" method="post">
      <label for="email">E-mail</label>
      <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>

      <label for="senha">Senha</label>
      <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>

      <button type="submit" name="enviar" id="envia">Entrar</button>

      <p class="signup">
        Não tem uma conta? <a href="cadastro.php">Criar conta</a>
      </p>
    </form>
  </div>
</body>
</html>
