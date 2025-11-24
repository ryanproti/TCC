<?php
// Mostrar erros (apenas para teste — remova em produção)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexão com o banco
include('conexao.php'); // Certifique-se que conexao.php está certo

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mensagem = mysqli_real_escape_string($conn, $_POST['mensagem']);

    // Insere no banco
    $sql = "INSERT INTO fale_conosco (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

    if (mysqli_query($conn, $sql)) {

        // Configura o PHPMailer
        $mail = new PHPMailer(true);

        try {
            // config server locaweb
            $mail->isSMTP();
            $mail->Host       = 'email-ssl.com.br';            // host SMTP da Locaweb
            $mail->SMTPAuth   = true;
            $mail->Username   = 'faleconosco@growtly.com.br';  // seu e-mail completo
            $mail->Password   = 'Growtly12345!';               // sua senha
            $mail->SMTPSecure = 'ssl';                         // tipo de criptografia
            $mail->Port       = 465;                           // porta SSL

            // Remetente e destinatário
            $mail->setFrom('faleconosco@growtly.com.br', 'Fale Conosco');
            $mail->addAddress('faleconosco@growtly.com.br');   // destinatário (pode ser o mesmo)

            // Conteúdo do e-mail
            $mail->isHTML(false);
            $mail->Subject = "Nova mensagem - Fale Conosco";
            $mail->Body    = "Nome: $nome\nE-mail: $email\n\nMensagem:\n$mensagem";

            // Envia o e-mail
            $mail->send();

            echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href = document.referrer;</script>";

        } catch (Exception $e) {
            echo "<script>alert('Erro ao enviar e-mail: {$mail->ErrorInfo}'); window.location.href = document.referrer;</script>";
        }

    } else {
        echo "<script>alert('Erro ao salvar no banco: " . mysqli_error($conn) . "'); window.location.href = document.referrer;</script>";
    }

} else {
    echo "<script>alert('Acesso inválido.'); window.location.href = document.referrer;</script>";
}
?>
