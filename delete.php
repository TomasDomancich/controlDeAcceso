<?php
    $conex = mysqli_connect("Localhost","root","","Usuarios");
    session_start();
    if (isset($_SESSION['delete'])) {
        $borrar_id = $_SESSION ['delete'];

        $borrar = "DELETE FROM usuarios WHERE userID='$borrar_id'";
        $ejecutar = mysqli_query ($conex, $borrar);
        
    } 
    header('Location: index.php');
?>