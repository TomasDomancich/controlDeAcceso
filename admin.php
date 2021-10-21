<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>
    <h1>ESTO ES ADMIN</h1>
    <?php 
        session_start();
        if(isset($_SESSION['userName'])){
            echo "Bienvenido ". $_SESSION['userName'];
            echo "<a href='close.php'>Cerrar secion</a>";
        }else{
            session_destroy();
            header('Location: login.php');
        }
    ?>
</body>
</html>