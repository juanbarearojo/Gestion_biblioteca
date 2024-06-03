<?php
session_start();
$username = $_SESSION['username']
$password = $_SESSION['password']

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Il tuo profilo</title>
    </head>
    <body>
        <H1>Il tuo profilo</H1>
        <h2>Il tuo Username: <?php echo $username;?></h2>
        <h2>Il tuo Password: <?php echo $password;?></h2>
    </body>

</html>