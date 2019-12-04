<?php
include 'functions.php';
require 'config.php';
session_start();

if (!isLoggedIn()) {
    echo "<script>alert('Faça Login para acessar o sistema.');location.href=\"login.html\";</script>";
}

?>

<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-					ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pagina de Consulta | Sistema de Consulta Cadastrados</title>

    <link rel="stylesheet" type="text/css" href="/criarevento.css">
</head>

<body>

    <div class="slog-box">
        <h1>Administração dos E-mails Ativos</h1>
    </div>


    <?php
    $PDO = db_connect();
    $sql = "SELECT * FROM pessoas_cadastradas WHERE status_id = 1";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    ?>

    <br>
    <form method="post" action="layout1.php">
        <div class="login-box">
            <div id="table">
                <table>
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>Código</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($result as $value) {
                            //	echo '<input type=checkbox>'.' Email: '.$value['email'].'<br>';
                            //}
                            ?>
                            <tr>
                                <td><?= "<input type=checkbox name='email[]' value=" . $value['email'] . ">" ?></td>
                                <td><?= $value['id_pessoa_cadastrada'] ?></td>
                                <td><?= $value['email'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="center">
                <button id="btnevent" type="submit" class="btn btn-primary">Criar Evento</button>
                <button id="btnselect" type="button" class="btn btn-primary" onclick="selecionar()">Selecionar
                    todos</button>
                <a id="btnback" type="button" href="index1.php" class="btn btn-primary">Voltar</a>
            </div>
    </form>
    </div>
    <script>
        function selecionar() {
            document.getElementsByName('email[]').forEach((e) => e.checked = true);
        }
    </script>
</body>

</html>