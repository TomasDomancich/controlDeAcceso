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
    <title>Bienvenido</title>
</head>
<div class="containerAll">
    <body>
        <h1>Foto de perfil</h1>
        <img src="images/userPicture.png" class="userPicture">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="userImg" accept="image/*" required>
            <input type="submit" name="insert" value="Enviar">
        </form>
        <?php
            $conex = mysqli_connect("Localhost","root","","Usuarios");
            session_start();
            $userName = $_SESSION['userName'];

            if(isset($_POST['insert'])){
                if(is_uploaded_file($_FILES['userImg']['tmp_name'])){
                    $archivo = $_FILES['userImg']['name'];
                    move_uploaded_file($_FILES['userImg']['tmp_name'], 'images/'.$archivo);
                }
                $sql = "UPDATE usuarios SET userImg = '$archivo' WHERE userName = '$userName';";
                $result = mysqli_query($conex, $sql);
                header('Location: index.php');
            }else{
                
                $sql = "UPDATE usuarios SET userImg = 'userPicture.png' WHERE userName = '$userName';";
                $result = mysqli_query($conex, $sql);
            }

        ?>
        </br><a href="index.php"> Omitir</a>
    </body>
</div>
</html>
