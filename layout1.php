<?php
include 'functions.php';
require 'config.php';
session_start();
   if(!isLoggedIn()){
      echo "<script>alert('Faça Login para acessar o sistema.');location.href=\"login.html\";</script>";
      
    }
    
$listToSend = $_POST['email'];

if (empty($listToSend))
{
    echo "<script>alert('Selecione no mínimo um e-mail.');location.href=\"criarevento.php\";</script>";
    exit;
}

$lista=json_encode($listToSend);

echo "<script>console.log(".$lista.")</script>";

?>

<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-					ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">

    <title>Layout de E-mail | Sistema de Envio Automático</title>

    <link rel="stylesheet" type="text/css" href="/layout1.css">
</head>

<body>

    <div class="slog-box">
        <h1>Divulgação do Evento</h1>
    </div>

    <div class="login-box">
        <form action="enviaremail.php" method="post">

            <input type="text" value="<?= htmlentities(serialize($listToSend)); ?>" name="emails" hidden>

            <b>Título do Evento:</b><br>

            <input type=text name="assunto" class="title" placeholder="Escreva seu título:" /><br>

            <b>Descrição do Evento:</b><br>

            <textarea name="mensagem" class="message" placeholder="Escreva seu e-mail:"></textarea><br>

            <div class="div-btn">
                <input type="submit" class="btn btn-primary" value="Enviar Email">
                <input type="reset" class="btn btn-primary" value="Limpar Formulário">
                <input type="button" class="btn btn-primary" value="Voltar" onClick="history.go(-1)">
            </div>
        </form>
    </div>
</body>

</html>