<?php
    $conex = mysqli_connect("Localhost","root","","Usuarios");

    $editar_id = $_GET['update'];

    $consulta = "SELECT * FROM usuarios WHERE userID='$editar_id'";
    $ejecutar = mysqli_query($conex,$consulta);
    $fila = mysqli_fetch_array($ejecutar);

    $id = $fila['userID'];
    $foto = $fila['userImg'];
    $nombre = $fila['userName'];
    $mail = $fila['userMail'];  
?>

</br>
<form method="POST" action="" enctype="multipart/form-data"> 
    <input type="hidden" name="id" value="<?php echo $id?>">
    <input type="hidden" name="foto" value="<?php echo $foto?>">
    <input type="text" name="nombre" value="<?php echo $nombre?>" required></br>
    
    <input type="mail" name="mail" value="<?php echo $mail?>" required></br>

    <input type="file" name="foto" accept="image/*"/></br>

    <input type="submit" name="actualizar" value="Actualizar datos">
</form>

<?php
    if(isset($_POST['actualizar'])){
        $actualizar_nombre = $_POST['nombre'];
        $actualizar_mail = $_POST['mail'];

        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $actualizar_archivo = $_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], 'images/'.$actualizar_archivo);
		}else{
            $actualizar_archivo = $_POST['foto'];
        }

        $sql = "UPDATE usuarios SET userName='$actualizar_nombre', userMail='$actualizar_mail', foto='$actualizar_archivo' WHERE userID='$editar_id'";

        $result = mysqli_query($conex,$sql);

        // si te fijas los datos son guardados en la variables, tal vez el problema esta en el sql
        // echo $actualizar_nombre. $actualizar_mail;
    }
?>
<div class='line'></div>