<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

if (isset($_POST['enviar-form'])){
    $mail = new PHPMailer(true);

    // informações do formulário
    $nomeUsuario      = $_POST['p-nome'];
    $sobrenomeUsuario = $_POST['sobrenome'];
    $emailUsuario     = $_POST['email'];
    $telefoneUsuario  = $_POST['telefone'];
    $mensagemUsuario  = $_POST['mensagem'];

    //corpo da mensagem
    $bodyMensagem = "
                <h1>Essa mensagem foi enviada pelo site!</h1>
                <br>
                Seguem informações do contato de interesse: <br>
                Nome: $nomeUsuario $sobrenomeUsuario<br>
                E-mail: $emailUsuario<br>
                Telefone: $telefoneUsuario<br>
                Mensagem: <br>
                $mensagemUsuario
    ";

    try {
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '######';
        $mail->Password   = '######';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('######', 'Nao Responda - portal web');
        $mail->addAddress('#########', 'Marcio Churrasco');
        // $mail->addAddress('######', 'Teste');

        //Content
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Mensagem do site - Marcio Churrasco';
        $mail->Body    = $bodyMensagem;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '<script>
                alert("Mensagem Enviada com sucesso!");
                window.location.href = "/marcio-churrasco/app";
            </script>
        ';
    } catch (Exception $e) {
        echo "Erro ao enviar e-mail! Erro: {$mail->ErrorInfo}";
    }
} else {
    echo "<script> alert('Erro ao enviar e-mail! Disparo não foi feito via formulário') </script>";
}