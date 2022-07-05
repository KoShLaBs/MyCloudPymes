<?php

session_start();

include "../../php/Datos/conect.php";

$cnx = Conect::conectar();

$query ="SELECT * FROM usuario ";
$query = $cnx->prepare($query);
$query->execute();
$listar = $query->fetchAll(PDO::FETCH_ASSOC);

$txtUsuario=(isset($_POST['txtUsuarioVG']))?$_POST['txtUsuarioVG']:"";
$txtNombre=(isset($_POST['txtNombreVG']))?$_POST['txtNombreVG']:"";
$txtCedula=(isset($_POST['txtCedulaVG']))?$_POST['txtCedulaVG']:"";
$txtCorreo=(isset($_POST['txtCorreoVG']))?$_POST['txtCorreoVG']:"";
$txtContrasena=(isset($_POST['txtContraseñaVG']))?$_POST['txtContraseñaVG']:"";
$txtDireccion=(isset($_POST['txtDireccionVG']))?$_POST['txtDireccionVG']:"";
$txtTelefono=(isset($_POST['txtTelefonoVG']))?$_POST['txtTelefonoVG']:"";
$txtFecha=(isset($_POST['txtFechaNacVG']))?$_POST['txtFechaNacVG']:"";

$txtId=(isset($_POST['txtId']))?$_POST['txtId']:"";
$txtC=(isset($_POST['txtC']));

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){

    case "Update":
            
            $query = $cnx->prepare("SELECT * FROM usuario WHERE id_usuario=:id_usuario");
            $query->bindValue(':id_usuario', $txtId);
            $query->execute();
            $listar = $query->fetch(PDO::FETCH_LAZY);

            $txtUsuario = $listar['usuario'];
            $txtNombre = $listar['nombre_usuario'];
            $txtCedula = $listar['cedula_usuario'];
            $txtCorreo = $listar['correo_usuario'];
            $txtContrasena = $listar['password_usuario'];
            $txtDireccion = $listar['direccion_usuario'];
            $txtTelefono = $listar['telefono_usuario'];
            $txtFecha = $listar['fecha_nac_usuario'];

        break;
  

    case "Delete":
            $query ="DELETE FROM usuario WHERE id_usuario=:id_usuario";
            $query = $cnx->prepare($query);
            $query->bindValue(':id_usuario', $txtId);
            $query->execute();
        break;
            
    case "Buscar":
        echo "Presionando para actualizar";
        break;


}


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" href="../../estilos/G/encabezado.css"/>
    <link rel="stylesheet" href="../../estilos/G/formulario.css"/>    
    <link rel="stylesheet" href="../../estilos/G/panel.css"/>
    <link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title>Vendedor</title>
</head>
<body >
    <section>
    <?php include_once('../G/encabezado.php'); 
    ?>

    <div class="contenedor-blanco">
        <h3>Vendedor</h3>
    </div>
        <div class="formulario-1">
            <form class="formulario-G" action="../../php/registro.php" method="POST" id="vgform">
            <input type="hidden" name="txtId" value="<?php echo $txtId; ?>"/>
                Usuario<br>
                <input type="text" placeholder="Ingresar el usuario" value="<?php echo $txtUsuario;?>" name="txtUsuarioVG" id="txtUsuarioVG"><br>
                Cedula<br>
                <input type="text" placeholder="Ingresar la cedula" value="<?php echo $txtCedula;?>" name="txtCedulaVG" id="txtCedulaVG"><br>
                Dirección<br>
                <input type="text" placeholder="Ingresar la dirección" value="<?php echo $txtDireccion;?>" name="txtDireccionVG" id="txtDireccionVG"><br>
                Correo Electronico<br>
                <input type="mail" placeholder="Ingresar el correo electronico" value="<?php echo $txtCorreo;?>" name="txtCorreoVG" id="txtCorreoVG"><br>
            
        </div>
        <div class="formulario-G">
            
                Contraseña<br>
                <input type="password" placeholder="Ingresar la constraseña" value="<?php echo $txtContrasena;?>" name="txtContraseñaVG"><br>
                Nombre Completo<br>
                <input type="text" placeholder="Ingresar el nombre completo" value="<?php echo $txtNombre;?>" name="txtNombreVG"><br>
                Telefono<br>
                <input type="tel" placeholder="Ingresar el telefono" value="<?php echo $txtTelefono;?>" name="txtTelefonoVG" ><br>
                Fecha de nacimiento<br>
                <input type="date"  name="txtFechaNacVG" value="<?php echo $txtFecha;?>" ><br>
            
        </div>
        <div class="botones" >
            
                <input type="submit" value="Crear" name="botonCrearVG" onclick="confirmar()">
                
            </form>
        
        </div>

        <input type="checkbox" class="checkbox" id="check" >
    <label class="menu" for="check" id="si" onclick="no()">◀</label>
    <div class="right-panel" id="no" onclick="si()">
        <h1>Buscar</h1>
        <form>
            <input type="text" name="buscar" placeholder="Id, Usuario o Nombre"><br></form>
            <form><button type="submit" name="accion" ><img src="../../assests/search.png"></button>
        </form>

        <table class="tabla" >
            <thead class="lineas">
                <th>Id</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
                
 <?php foreach($listar as $datos){ 
    if($datos['cargo_usuario'] == 2){ ?>
            <tr>
                <td><?php echo $datos['id_usuario']; ?></td>
                <td><?php echo $datos['nombre_usuario']; ?></td>
                <td><?php echo $datos['usuario']; ?></td>
                <form method="post">
                <input type="hidden"  name="txtId" id="txtId" value="<?php echo $datos['id_usuario'];?>"><br>
                <td>
                    <a name="accion" class="casilla" value="Update" href="UV.php?Id=<?= $datos['id_usuario']; ?>">
                    
                    
                    <img src="../../assests/editar.png"></a>
                </td>
                <td>
                    <button type=submit name="accion" class="casilla" value="Delete">
                    <img src="../../assests/delete.png"></button>
                </td>
                </form>
            </tr>
<?php }}?>       

            </tbody>
            </table>

    
    </div>    
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script type="text/javascript">
        
        function si(){
    document.getElementById('no').style.display = 'flex';
    document.getElementById('si').style.display = 'block';
        }
        
        function no(){
    document.getElementById('no').style.display = 'flex';
    document.getElementById('si').style.display = 'block';
        }
    
        function confirmar() {
            var mensaje = alert("Se ha actualizado el usuario");
        }    

    </script>   
    
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../js/overhang.min.js"></script>
    <script type="text/javascript" src="../../js/app.js"> </script>
    

</body>
</html>

