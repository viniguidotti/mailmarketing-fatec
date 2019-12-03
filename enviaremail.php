Editando: 
/home2/westti89/public_html/enviaremail.php
 Codificação:      
<?php
require 'config.php';

$assunto = isset($_POST['assunto']) ? $_POST['assunto'] : '';
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';

$lista = unserialize($_POST['emails']);
echo "<script>console.log('lista emails: ',".json_encode($lista).")</script>";

if (empty($assunto) || empty($mensagem))
{
    echo "<script>alert('Preencha todos os campos.');location.href=\"layout1.php\";</script>";
    exit;
}

require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "mail.westti.com.br";
$mail->Port = 465; // or 587 465
$mail->IsHTML(true);
$mail->Username = "westti89";
$mail->Password = "ha3cla25ita312";
$mail->SetFrom("contato@westti.com.br");
$mail->Subject = $assunto;
$mail->Body = $mensagem;

foreach($lista as $value) {
    $mail->AddAddress($value);
}

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Mensagem enviada com sucesso";
    echo "<script>alert('Evento Divulgado com sucesso.');location.href=\"index1.php\";</script>";
}
?>
