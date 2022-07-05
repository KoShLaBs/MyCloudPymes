<!DOCTYPE html>
<html lang="es">
    
<head>
    <?php session_start();?>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cloud Pymes</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../estilos/G/login.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../estilos/G/video.css" />
    <link rel="stylesheet" type="text/css" href="../estilos/G/overhang.min.css" />
</head>
<body>
  
    <main>
        <div class="todo">
            
            <div class="cajita">
                <div class="titulos">
                    <h3>MY CLOUD PYMES</h3>
                    <p>IMPULSAMOS TU NEGOCIO</p><br><br>
                </div>
                <div class="form">
                    <form id="loginForm" class="formulario-login" action="../php/validar.php" method="POST">
                        <input type="text" placeholder="Ingrese su usuario" name="txtusuario" autofocus required><br>      
                        <input type="password" placeholder="Ingrese su contraseña" name="txtpassword_usuario" autofocus required><br>      
                        <input type="submit" name="accion" value="Unirse" class="button"><br><br>
                    </form>
                </div>
            </div>
            <div class="video">
                <div class="color"></div> 
                <video   autoplay loop muted plays-inline class="videoo"> 
                <source src="../assests/f4.mp4" type="video/mp4">
            </video></div>
        </div>
                                                
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/overhang.min.js"></script>
    <script type="text/javascript" src="../js/app.js"> </script>
    

</body>
</html>