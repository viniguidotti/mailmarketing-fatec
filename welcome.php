<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Bem vindo</title>
   </head>
   
   <body>
      <h1>Bem Vindo<?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>