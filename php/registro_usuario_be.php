<?php

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];


    //$contrasena = hash('sha512',$contrasena);   //Es para encriptar la contraseña y que en la base de datos ni el propio admin pueda ver la contrasena y solo vera un conjunto de letras y numeros en lugar de la contraseña real para evitar robos etc
    //en case de quererla ver solo borarr esta linea de codigo la de arriva 
 
 
 $query = "INSERT INTO usuarios(nombre_completo,correo,usuario,contrasena) 
             VALUES('$nombre_completo','$correo','$usuario','$contrasena')";


//verificar que el correo no se repita en la base

$verificar_correo = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo ='$correo' ");


if(mysqli_num_rows($verificar_correo) > 0){
    echo'<script> alert ("Este correo ya esta registrado intenta con otro diferente")
        window.location = "../index.php";
        </script>';
    exit();  //cuando el codigo llege a este punto el reto de e l codigo no se va a ejecutar 
}




$ejecutar = mysqli_query($conexion,$query);

    if($ejecutar){
        echo'<script> alert ("Usuario registrado con exito")
        window.location = "../index.php";
        </script>';//sepuede cambiar la ruta de direccion en lugr de el index ejemplo tu pagina web 

    }
    else{
        echo'<script> alert ("Intentalo de nuevo usuario no registrado")
        window.location = "../index.php";
        </script>';
    }

    mysqli_close($conexion);//sierra la conexion de la base de datos

?>