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
    <title>LogIn</title>
</head>
<div class="containerAll">
    <body>
        <h1>Iniciar sesion</h1>
        <form action="" method="POST">
            <input type="text" name="userName" placeholder="Nombre" <?php if(isset($_COOKIE['userName'])){echo "value=".$_COOKIE['userName'];}?> required><br>
            <input type="password" name="userPass" placeholder="Contraseña"required><br>
            <input type="submit" name="send" value="Ingresar" class="send"><br>
            
        </form>

        <?php 
            $conex = mysqli_connect("Localhost","root","","Usuarios");
            session_start();
            
            if(isset ($_POST['send'])){
                $sql = "SELECT * FROM usuarios";
                $result = mysqli_query($conex, $sql);

                if ($result) {
                    $logged = 0;
                    while ($row = $result->fetch_array()) {
                        if($_POST['userName'] == $row['userName'] && password_verify($_POST['userPass'],$row['userPass'])){
                            $_SESSION['userName'] = $_POST['userName'];
                            $_SESSION['userImg'] = $row['userImg'];

                            setcookie('userName',$_POST['userName'],time()+(60*60*24)*30);
                            $logged=1;
                            header('Location: admin.php');
                        }
                    }
                    if($logged==0){
                        echo "<div class='error'>Usuario o contraseña incorretos.</div>";
                        session_destroy();
                    }
                }
            }
        ?>
        <a href="register.php"> No me he registrado</a>
    </body>
</div>
</html>

