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
    		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-					ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    		
		<title>Pagina de Consulta | Sistema de Consulta Cadastrados</title>

    		<link rel="stylesheet" type="text/css" href="/consultar.css">
	</head>
    <body>

		<div class="slog-box">
        <h1>Consulta dos E-mails Ativos</h1>
        <div class="mini-box">
            <a id="btnvoltar" class="btn btn-primary" href="index1.php" role="button">Voltar</a>
        </div>
    </div>

            	<?php
                $PDO = db_connect();
		$sql = "SELECT * FROM pessoas_cadastradas WHERE status_id = 1";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();
        	?>
        	
            <div class="login-box">
                <?php
foreach ($result as $value){ 
    echo 'Email: '.$value['email'].'<br>';
    }
    ?>
    </div>
    </body>
</html>