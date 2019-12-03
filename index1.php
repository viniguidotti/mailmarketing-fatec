<?php
include 'functions.php';
require 'config.php';
session_start();

	if(!isLoggedIn()){
    		echo "<script>alert('Faça Login para acessar o sistema.');location.href=\"login.html\";</script>";
	}
	
?>

<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-					ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">

    <title>Pagina Inicial | Sistema do Administrador do Evento</title>

    <link rel="stylesheet" type="text/css" href="/index1.css">
</head>

<body>

    <div class="slog-box">
        <h1>Painel Geral</h1>
        <div class="mini-box">
            <label id="helloadm" sytle="width: 100%;text-align: right">Olá, Administrador</label>
            <a id="btnlogout" class="btn btn-primary" href="logout.php" role="button">Sair</a>
        </div>
    </div>



    <div class="login-box">
        <form action="consultar.php" method="post">
            <label id="labelconsulta" for="consulta" style="width: 100%;text-align: center">Consulte as pessoas
                cadastradas:</label><br>
            <input id="btnconsult" class="btn btn-primary" type="submit" value="Consultar">
        </form>

        <form action="criarevento.php" method="post">
            <label id="labelconsulta" for="criarevento" style="width: 100%;text-align: center">Divulgue seu
                Evento:</label><br>
            <input id="btncriarevento" class="btn btn-primary" type="submit" value="Criar Evento">
        </form>
    </div>
</body>

</html>