<?php
 
require_once 'config.php';

$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
$status = '1';

if (empty($email) || empty($senha))
{
    echo "<script>alert('Preencha todos os campos.');location.href=\"login.html\";</script>";
    exit;
}
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO pessoas_cadastradas(email, senha) VALUES(:email, :senha)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', sha1($senha));
 
 
if ($stmt->execute())
{
    echo "<script>alert('Cadastro realizado com sucesso.');location.href=\"http://westti.com.br\";</script>";
}
else
{
    echo "<script>alert('Erro ao cadastrar, verifique seu e-mail.');location.href=\"cadastro.html\";</script>";
}