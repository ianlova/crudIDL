    <?php
    include ("redimensionarImg.php");
    include ("conexion.php");
    include ("Crud.php")
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="estilos.css">    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Narnoor&display=swap" rel="stylesheet">
    <title>Crud de usuarios</title>
</head>
<body>
    <div class="contenedor">
        <div class="titulo">
            <h1>crear usuario</h1>
        </div>
        <div class="crear">
        <form action="" method="post" enctype="multipart/form-data" class="crear">                    
        <div class="inputs">
            <div class="separador"></div>
                <input type="text" name="nombre" id="user" placeholder="Escriba su usuario" required>                
                <input type="text" name="contra" id="pass"  maxlength="15" placeholder="Escriba su contraseña" required>      
            <div class="separador"></div>
        </div>        
        <div class="cargarImagen">
            <input type="file" name="foto" id="imagen" accept=".png, .jpg" >
            <img src="imagenes/imgDefault.png">
            <label for="imagen">Ingrese la imagen</label>        
        </div>        
        <div class="botonDiv">
            <div class="separador"></div>
            <div class="boton">
                <input type="submit" name="registrar" value="Crear"required >
            </div>
        </div>
</form>
</div>
<?php
    if (isset($_GET['id_editar'])) {
        $id = $_GET['id_editar'];
        $sql_c = "SELECT * FROM usuarios WHERE id = '$id'";
        $buscar = mysqli_query($conexion,$sql_c);  
        $registro = mysqli_fetch_assoc($buscar);
        $usuario = $registro['usuario'];
        $contra = $registro['contrasenia'];
        $foto = $registro['Foto'];
        ?>
        <div class="titulo">
            <h1>Editar usuario</h1>
        </div>
        <div class="editar">
    <form  action="" method="post" enctype="multipart/form-data" class="editar">
            
            <div class="inputs">
                <div class="separador"></div>
                    <input type="text" name="nUser" id="nUser" placeholder="ingrese el nombre de usuario nuevo" value="<?php echo $usuario; ?>" required>
                    <input type="text" name="nPass" id="nPass"  maxlength="15" placeholder="ingrese la nueva contraseña nueva" value="<?php echo $contra; ?>" required>            
                <div class="separador"></div>
            </div>            
            <div class="cargarImagen">
                <input type="file" name="foto" id="imagen" accept=".png, .jpg" >
                <img src="imagenes/<?php echo $foto; ?>" alt="">
                <label for="imagen">Ingrese la nueva imagen</label>                
            </div>            
            <input type="hidden" name="foto" id="imagen" value="<?php echo $foto; ?>">
            <input type="hidden" name="id_editar" value="<?php echo $id; ?>">
            <div class="botonDiv">
                <div class="separador"></div>
                <div class="boton">
                    <input type="submit" name="Actualizar" value="Editar">                        
                </div>
            </div>
            
    </form>
</div>
<?php
}
?>

<div class="titulo">
    <h1>listado de usuarios</h1>
</div>

<div class="listas">
    <?php
    $sql2="SELECT * From usuarios";
    $consulta = mysqli_query($conexion, $sql2);
    if (mysqli_num_rows($consulta)==0) {
        echo 'tabla vacia';

    }else{
        while ($registro=mysqli_fetch_assoc($consulta)) {
            echo'
            <div class="cards">
            <div class="separador"></div>
            <div class="usuarios">
            
                <div class="foto">
                    <img src="imagenes/'.$registro['Foto'].'" alt="">
                </div>
                <div class="info">
                    <div class="datos">                         
                            <p>id: '.$registro['id'].'</p>                                                
                        <div class="p">
                            <p>nombre: <span>'.$registro['usuario'].'</span></p>
                            <div class="separador"></div>
                            <p>contraseña: <span>'.$registro['contrasenia'].'</span></p>
                        </div>                        
                    </div>
                    <div class="iconos">
                        <a href="index.php?id_editar='.$registro['id'].'">
                            <i class="fa-solid fa-pencil" style="color: #f1f1f1;"></i>
                        </a>
                        <a href="index.php?id_eliminar='.$registro['id'].'">
                            <i class="fa-solid fa-trash" style="color: #f1f1f1;"></i>                    
                        </a>
                    </div>
                </div>
            </div>
            </div>
        ';
        }
    }




    ?>
    </div>
    </div>
</body>
</html>