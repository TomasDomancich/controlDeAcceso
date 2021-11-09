<?php
    $conex = mysqli_connect("bs3j3ecshzthbbilraje-mysql.services.clever-cloud.com","upfsi19zbhkunqj2","OjuPi2PaaKwsKRpfRbkF","bs3j3ecshzthbbilraje");
    session_start();
    if (isset($_SESSION['delete'])) {
        $borrar_id = $_SESSION ['delete'];

        $borrar = "DELETE FROM usuarios WHERE userID='$borrar_id'";
        $ejecutar = mysqli_query ($conex, $borrar);
        
    } 
    header('Location: index.php');
?>