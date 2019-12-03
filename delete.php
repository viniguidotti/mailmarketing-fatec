<?php
 
require 'config.php';

$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

if (empty($email) || empty($senha))
{
    echo "<script>alert('Preencha todos os campos.');location.href=\"descadastrar.html\";</script>";
    exit;
}

$PDO = db_connect();

$sql = "UPDATE pessoas_cadastradas SET status_id = 2 WHERE email= :email AND senha = :senha";
$query = "SELECT * FROM pessoas_cadastradas WHERE email = :email and senha = :senha";

$senha = sha1($senha);
$stmt = $PDO->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);  

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total = count($users);

if ($total <= 0)
{ 
    echo "<script>alert('Email ou Senha Incorretos, favor corrigir.');location.href=\"descadastrar.html\";</script>";
    exit;
}
else{
    $stmt1 = $PDO->prepare($sql);
    $stmt1->bindParam(':email', $email);
    $stmt1->bindParam(':senha', $senha);
    $stmt1->execute();
    echo "<script>alert('Você acaba de se descadastrar.');location.href=\"http://westti.com.br/\";</script>";
}
 
// pega o primeiro usuário

//$user = $users[0];

//if($stmt->execute())
//{
 //echo "<script>alert('Você acaba de se descadastrar!');location.href=\"http://westti.com.br/\";</script>";
 //header('Location: index1.php');
//}
//else{
 
//echo "Erro ao remover";
//print_r($stmt->errorInfo());

//}