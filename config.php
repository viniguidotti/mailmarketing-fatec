<?php
 
// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', 'westti.com.br');
define('DB_USER', 'westti89_root');
define('DB_PASS', '12345');
define('DB_NAME', 'westti89_Mail');
 
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
 
// inclui o arquivo de funçõees
require_once 'functions.php';