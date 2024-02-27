<?php 
  session_start();

  if (isset($_SESSION['username'])) {
    include 'app/db.conn.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Profile User</h1>
</body>
</html>

<?php
  }else{
  	header("Location: signin.php");
   	exit;
  }
 ?>