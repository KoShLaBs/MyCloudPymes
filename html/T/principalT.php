<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos/G/encabezado.css"/>
    <link rel="stylesheet" href="../../estilos/G/principal.css" />
    <link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title>Bienvenido tecnico</title>
    

</head>
<body>
    <section>
    <?php include_once('../T/encabezado.php');?>
    <div class="contenido">
                <div class="titulos">
                            <h2>Bienvenido Tecnico</h2>
                            <p>Lleva el registro de las ordenes de servicio</p>
                        </div>
                        <div class="imagen">
                            <img src="../../assests/MCPLSF.png" class="icono">
                        </div>                       
                    
                </div>  
        
        
        <ul class="colores">
            <li><img src="../../assests/VSF.png" onclick="ChangeColorCircle('rgb(59, 231, 36)')"></li>
            <li><img src="../../assests/VASF.png" onclick="ChangeColorCircle('rgb(36, 231, 85)')"></li>
            <li><img src="../../assests/AASF.png" onclick="ChangeColorCircle('rgb(36,231,140)')"></li>
            <li><img src="../../assests/ACSF.png" onclick="ChangeColorCircle('rgb(36,176 ,231)')"></li>
            <li><img src="../../assests/AOSF.png" onclick="ChangeColorCircle('rgb(36,121 ,231 )')"></li>
            <li><img src="../../assests/MSF.png" onclick="ChangeColorCircle('rgb(88,36 ,231 )')"></li>
            
            <li><img src="../../assests/MPSF.png" onclick="ChangeColorCircle('rgb(120,140 , 252)')"></li>
            <li><img src="../../assests/MCSF.png" onclick="ChangeColorCircle('rgb(177,120 ,252 )')"></li>
            <li><img src="../../assests/SASF.png" onclick="ChangeColorCircle('rgb(252, 120, 140)')"></li>
            <li><img src="../../assests/FSF.png" onclick="ChangeColorCircle('rgb(186,36 ,231 )')"></li>
            <li><img src="../../assests/RSSF.png" onclick="ChangeColorCircle('rgb(231, 36, 134)')"></li>
            
            <li><img src="../../assests/RSF.png" onclick="ChangeColorCircle('rgb(231, 43, 36)')"></li>
            <li><img src="../../assests/NSF.png" onclick="ChangeColorCircle('rgb(231,130 ,36 )')"></li>
            <li><img src="../../assests/ASF.png" onclick="ChangeColorCircle('rgb(231,179 ,36 )')"></li>
            <li><img src="../../assests/LSF.png" onclick="ChangeColorCircle('rgb(232, 252,120 )')"></li>
            <li><img src="../../assests/PSF.png" onclick="ChangeColorCircle('rgb(252, 190, 120)')"></li>
            
        </ul>

    </section>

    <script type="text/javascript">
        function ChangeColorCircle(color){
            const circle = document.querySelector('.circle');
            circle.style.background = color;
            
        }
    </script>    
    <script scr="js/encabezado.js"></script>
</body> 
</html>