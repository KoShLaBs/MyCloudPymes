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
    <title>Informes</title>
</head>
<body >
    <section class="sep">
    <?php include_once('../G/encabezado.php'); ?>
    <div class="separacion" id="separacion1">
        <div class="contenedor" id="contenedor1">
            
            <div class="contenedor-blanco">
                <h3>Informe orden de compra</h3>
                <button type="button" id="mostrar1" class="mostrar" onclick="mostrarr()">Mostrar</button>
                <button type="button" id="cerrar1" class="cerrar" onclick="cerrarr()">Cerrar</button>
            </div>
        </div>
            <div class="formulario1" id="formulario1">
                <form class="formulario-L" >
                    Nit Proveedor<br>
                    <input type="text" placeholder="Ingresa el nit del proveedor" name="txtNitPG"><br>
                    Fecha inicial busqueda<br>
                    <input type="date" name="FechaInicialDCG"><br>
                    Valor total busqueda<br>
                    <input type="text" placeholder="Ingrese el valor total" name="txtValorTotalDCG"><br>
                
            </div>
            <div class="formulario-L" style="display: none;" id="formularioo1">
                
                    Id orden compra<br>
                    <input type="text" placeholder="Ingre el id de la orden de compra" name="txtIdDCG"><br>
                    Fecha final busqueda<br>
                    <input type="date" name="FechaFinalDCG"><br>
                
            </div>
            <div class="botones" id="botones1">
                
                    <input type="button" value="Crear" name="botonCrearDCG">
                    </form>
            <form method="post">
                <input type="submit" value="Actualizar" name="accion">
            </form>
            </div>
        </div>       
        

   
        <div class="separacion" id="separacion2">
            <div class="contenedor" id="contenedor2">
            
                <div class="contenedor-blanco">
                    <h3>Informe orden de venta</h3>
                    <button type="button" id="mostrar2" class="mostrar" onclick="mostrar()">Mostrar</button>
                <button type="button" id="cerrar2" class="cerrar" onclick="cerrar()">Cerrar</button>
                </div>
            </div>
            <div class="formulario2" id="formulario2">
                <form class="formulario-L">
                    Id detalle venta<br>
                    <input type="text" placeholder="Ingrese el id del detalle de venta" name="txtIdDVG"><br>
                    Fecha final busqueda<br>
                    <input type="date" name="FechaFinalDVG"><br>
                    Productos vendidos<br>
                    <input type="text" placeholder="Ingrese productos vendidos" name="txtProductosDVG"><br>
                </form>
            </div>
            <div class="formulario2" id="formularioo2">
                <form class="formulario-L">
                    Fecha inicial busqueda<br>
                    <input type="date" name="FechaInicialDVG"><br>
                    Valor total busqueda<br>
                    <input type="text" placeholder="Ingrese valor total" name="txtValorTotalDVG"><br>
                </form>
            </div>
            <div class="botones" id="botones2">
                <form>
                    <input type="button" value="Crear" name="botonCrearDVG">
                    <input type="button" value="Buscar" name="botonBuscarDVG">
                    <input type="button" value="Actualizar" name="botonActualizarDVG">
                    <input type="button" value="Eliminar" name="botonEliminarDVG">
                </form>
            </div>
        </div>

        <div class="separacion" id="separacion3">
            <div class="contenedor" id="contenedor3">
            
                <div class="contenedor-blanco">
                    <h3>Informe orden de producto</h3>
                    <button type="button" id="mostrar3" class="mostrar" onclick="mmostrar()">Mostrar</button>
                <button type="button" id="cerrar3" class="cerrar" onclick="ccerrar()">Cerrar</button>
                </div>
            </div>
            <div class="formulario3" id="formulario3">
                <form class="formulario-L">
                    Stock<br>
                    <input type="text" placeholder="Ingrese el stock" name="txtStockING"><br>
                    Fecha inicial de la busqueda<br>
                    <input type="date" name="FechaInicialIPG"><br>
                    Valor total de la busqueda<br>
                    <input type="text" placeholder="Ingrese el valor total" name="txtValorTotalIPG"><br>
                </form>
            </div>
            <div class="formulario3" id="formularioo3">
                <form class="formulario-L">
                    Id producto<br>
                    <input type="text" placeholder="Ingrese el id del producto" name="txtIdPRG"><br>
                    Fecha final busqueda<br>
                    <input type="date" name="FechaFinalIPG"><br>
                    Cantidad vendida<br>
                    <input type="text" placeholder="Ingrese cantidad vendida" name="txtCantidadIPG"><br>
                </form>
            </div>
            <div class="botones" id="botones3">
                <form>
                    <input type="button" value="Crear" name="botonCrearIPG">
                    <input type="button" value="Buscar" name="botonBuscarIPG">
                    <input type="button" value="Actualizar" name="botonActualizarIPG">
                    <input type="button" value="Eliminar" name="botonEliminarIPG">
                </form>
            </div>
        </div>
    
    </section>

    <script type="text/javascript">
        
        function mostrarr(){
    document.getElementById('formulario1').style.display = 'block';
    document.getElementById('formularioo1').style.display = 'block';
    document.getElementById('botones1').style.display = 'block';
    document.getElementById('mostrar1').style.display = 'none';
    document.getElementById('cerrar1').style.display = 'block';
    document.getElementById('separacion2').style.display = 'none';
    
    document.getElementById('separacion3').style.display = 'none';
    
    document.getElementById('separacion1').style.display = 'flex';
    
    document.getElementById('contenedor1').style.marginBottom='28px';

    document.getElementById('formularioo1').style.marginLeft = '40px';
 
    
    document.getElementById('contenedor1').style.marginTop = '40px';
 
    
    
}

        function cerrarr(){
    document.getElementById('formulario1').style.display = 'none';
    document.getElementById('formularioo1').style.display = 'none';
    document.getElementById('botones1').style.display = 'none';
    document.getElementById('mostrar1').style.display = 'block';
    document.getElementById('cerrar1').style.display = 'none';
    document.getElementById('formulario2').style.display = 'none';
    document.getElementById('botones2').style.display = 'none';
    document.getElementById('formulario3').style.display = 'none';
    document.getElementById('botones3').style.display = 'none';
    document.getElementById('contenedor2').style.display = 'block';
    document.getElementById('contenedor3').style.display = 'block';
    document.getElementById('mostrar3').style.display = 'block';
    document.getElementById('mostrar2').style.display = 'block';
    document.getElementById('separacion2').style.display = 'block';
    
    document.getElementById('separacion3').style.display = 'block';

    document.getElementById('contenedor1').style.margin='0px';
    
}

        
        function mostrar(){
    document.getElementById('formulario2').style.display = 'block';
    document.getElementById('formularioo2').style.display = 'block';
    document.getElementById('botones2').style.display = 'block';
    document.getElementById('mostrar2').style.display = 'none';
    document.getElementById('cerrar2').style.display = 'block';
    document.getElementById('separacion2').style.display = 'flex';
    
    document.getElementById('separacion3').style.display = 'none';
    
    document.getElementById('separacion1').style.display = 'none';

    
    document.getElementById('contenedor2').style.marginBottom='28px';

    document.getElementById('formularioo2').style.marginLeft = '40px';
 
    
    document.getElementById('contenedor2').style.marginTop = '40px';
 
    
}

        function cerrar(){
    document.getElementById('formulario1').style.display = 'none';
    document.getElementById('formularioo2').style.display = 'none';
    document.getElementById('botones1').style.display = 'none';
    document.getElementById('mostrar2').style.display = 'block';
    document.getElementById('cerrar2').style.display = 'none';
    document.getElementById('formulario2').style.display = 'none';
    document.getElementById('botones2').style.display = 'none';
    document.getElementById('formulario3').style.display = 'none';
    document.getElementById('botones3').style.display = 'none';
    document.getElementById('contenedor1').style.display = 'block';
    document.getElementById('contenedor3').style.display = 'block';
    document.getElementById('mostrar3').style.display = 'block';
    document.getElementById('mostrar1').style.display = 'block';
    document.getElementById('separacion1').style.display = 'block';
    
    document.getElementById('separacion3').style.display = 'block';

    document.getElementById('contenedor2').style.margin='0px';
    
}
 
        function mmostrar(){
    document.getElementById('formulario3').style.display = 'block';
    document.getElementById('formularioo3').style.display = 'block';
    document.getElementById('botones3').style.display = 'block';
    document.getElementById('mostrar3').style.display = 'none';
    document.getElementById('cerrar3').style.display = 'block';
    document.getElementById('separacion3').style.display = 'flex';
    
    document.getElementById('separacion2').style.display = 'none';
    
    document.getElementById('separacion1').style.display = 'none';
    document.getElementById('contenedor3').style.marginBottom='28px';

    document.getElementById('formularioo3').style.marginLeft = '40px';


    document.getElementById('contenedor3').style.marginTop = '40px';

}

        function ccerrar(){
    document.getElementById('formulario1').style.display = 'none';
    document.getElementById('formularioo3').style.display = 'none';
    document.getElementById('botones1').style.display = 'none';
    document.getElementById('mostrar1').style.display = 'block';
    document.getElementById('cerrar3').style.display = 'none';
    document.getElementById('formulario2').style.display = 'none';
    document.getElementById('botones2').style.display = 'none';
    document.getElementById('formulario3').style.display = 'none';
    document.getElementById('botones3').style.display = 'none';
    document.getElementById('contenedor1').style.display = 'block';
    document.getElementById('contenedor3').style.display = 'block';
    document.getElementById('mostrar3').style.display = 'block';
    document.getElementById('mostrar2').style.display = 'block';
    document.getElementById('separacion1').style.display = 'block';
    document.getElementById('contenedor3').style.margin='0px';
    document.getElementById('separacion2').style.display = 'block';
    
}

 </script>

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
        
    </script>   


</body>
</html>