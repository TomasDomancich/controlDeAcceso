<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<div class="containerAll">
    <body>
        <h1>Registrarse</h1>
        <form action="" method="POST">
            <input type="text" name="userName" placeholder="Nombre" required><br>
            <input type="password" name="userPass" placeholder="Contraseña" required><br>
            <input type="password" name="passConfirm" placeholder="Confirmar contraseña" required><br>
            <input type="mail" name="userMail" placeholder="Correo electronico" required><br>
            <input type="submit" name="register" value="registrar" class="send"><br>
            
        </form>
    
        <?php 
            $conex = mysqli_connect("bs3j3ecshzthbbilraje-mysql.services.clever-cloud.com","upfsi19zbhkunqj2","OjuPi2PaaKwsKRpfRbkF","bs3j3ecshzthbbilraje");
            session_start();
            

            
            if(isset ($_POST['register'])){
            
                $sql = "SELECT * FROM usuarios";
                $result = mysqli_query($conex, $sql);
                if ($result) {
                    $logged=0;
                    while ($row = $result->fetch_array()) {
                        if($_POST['userName'] == $row['userName']){
                        $logged=1;
                        }
                    }
                    if($logged==1){
                        echo "<div class='error'>Nombre de usuario ya existe.</div>";
                    }elseif ($_POST['passConfirm'] != $_POST['userPass']) {
                        echo "<div class='error'>Las contraseñas no son iguales.</div>";
                    }else {
                        $userName = $_POST['userName'];
                        $_SESSION['userName'] = $_POST['userName'];
                        $userMail = $_POST['userMail'];
                        $passEncript = password_hash($_POST['userPass'], PASSWORD_DEFAULT);
                        $consulta = "INSERT INTO usuarios (userName, userPass, userMail) VALUES ('$userName', '$passEncript', '$userMail');";
                        $resultado = mysqli_query($conex, $consulta);
                        header('Location: insertImg.php');
                    }                   
                }    
            }
        ?>
        <a href="index.php"> Ya tengo cuenta</a>
    </body>
</div>
</html>