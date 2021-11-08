<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styleAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <title>admin</title>
</head>
<div class="containerAll">
    <body>
        <div class="headerUser">
            
            <?php 
                $conex = mysqli_connect("Localhost","root","","Usuarios");
                session_start();
                    
                if(isset($_SESSION['userName'])){
                    $userName=$_SESSION["userName"];

                    $sql = "SELECT * FROM usuarios WHERE userName='$userName'";
                    $result = mysqli_query($conex, $sql);
                    $row = mysqli_fetch_array($result);
                    $_SESSION['delete'] = $row['userID'];

                    echo '<img src="images/'.$row['userImg'].'" class="userImage"></div>';

                    echo "<h1>Bienvenido/a ". $_SESSION['userName']."</h1></br>";
            ?>                    
                                    
            <div class='options'>
                <a href='close.php' class='closeSession'>Cerrar sesión</a>
                <a href='delete.php' class='deleteUser'>Dar de baja</a>
            </div>
            <div class='line'></div>
            <?php

                if (isset($_GET['update'])) {
                    include("update.php");
                } 

                if (isset($_GET['delete'])) {
                    $borrar_id = $_GET ['delete'];

                    $borrar = "DELETE FROM usuarios WHERE userID='$borrar_id'";
                    $ejecutar = mysqli_query ($conex, $borrar);
                } 

            ?>
            <div class="crud">
                <div class="headerCrud">
                    <p class="crudImage">Imagen</p>
                    <p class="crudName">Nombre</p>
                    <p class="crudMail">E-mail</p>
                    <div class="crudUpdate"></div>
                    <div class="crudDelete"></div>
                </div>
                <?php      
                        $sql = "SELECT * FROM usuarios";
                        $result = mysqli_query($conex, $sql);
                        if ($result) {
                            while ($row = $result->fetch_array()) {
                                $userID = $row['userID'];
                                $userImg = $row['userImg'];
                                $userName = $row['userName'];
                                $userMail = $row['userMail'];
                    
                    echo "<div class='lineCrud'>";
                    echo '<img src="images/'.$userImg.'" class="lineImage">';
                    
                ?>                
                    <p class="lineName"><?php echo $userName; ?></p>
                    <p class="lineMail"><?php echo $userMail; ?></p>
                    <a href="admin.php?update=<?php echo $userID; ?>" class="lineUpdate">Editar</a>

                    <?php if($userName != $_SESSION['userName']){

                        echo "<a href='admin.php?delete=".$userID."' class='lineDelete'>Eliminar</a>";
                    }else{
                        echo "<div class='crudDelete'></div>";
                    }
                    ?>
                    
                </div>
            


            <?php
                        }
                    }
                echo "</div>";
                }else{
                     session_destroy();
                    header('Location: index.php');
                }
            ?>
    </body>
</div>
</html>