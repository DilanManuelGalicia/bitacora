<?php
error_reporting(E_ALL ^ E_DEPRECATED);
//header ("content-Type: text/html; cherset=UTF-8");

$noUnidad = isset($_POST ['noUnidad']) ? $_POST ['noUnidad']: '';
$placas = isset($_POST ['placas']) ? $_POST ['placas']: '';
$modelo = isset($_POST ['modelo']) ? $_POST ['modelo']: '';
$marca = isset($_POST ['marca']) ? $_POST ['marca']: '';
$noUnidad2 = '';

$con= new SQLite3('tuvsaUnidades.db');

$cs = $con -> query ("SELECT * FROM registro WHERE noUnidad = 654");

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>PAGINA ALUMNO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/quagga.min.js"></script>
    </head>
    <body>
        <style>
            img{
                text-align: center;       
            }

            #interactive {
                width: 320px;
                height: 240px;
                overflow: hidden;
 
            }
            
        </style>
        <div class="row">
            <div class="col-md-8 mx-auto" style="text-align: center;">
                <div class="my-5 mx-auto">
                    <img src="img/LOGO_TUVSA_DRAGON.svg" alt="logo" class="img-fluid">
                        <h1 class="my-4">Scanee su codigo de barras</h1>
                </div>

                <div class="col-md-12">
                    <div class="card mx-auto bg-light" 
                    style=" text-align: center; ">
                        <div class="card-body">
                        <form action="respuesta.php" method="post">
                        <div id="interactive" ></div>
                            
                            <script>
                                // Configuración de QuaggaJS
                                Quagga.init({
                                  inputStream: {
                                    name: "Live",
                                    type: "LiveStream",
                                    target: document.querySelector("#interactive")
                                  },
                                  decoder: {
                                    readers: ["code_39_reader"] // Tipo de código de barras que se va a escanear
                                  }
                                }, function(err) {
                                  if (err) {
                                    console.error(err);
                                    return;
                                  }
                                  console.log("QuaggaJS initialization succeeded");
                                  Quagga.start(); // Iniciar el escaneo
                                });
                                
                                // Evento de detección de código de barras
                                Quagga.onDetected(function(result) {
                                  console.log("Código de barras detectado:", result.codeResult.code);
                                  document.getElementById("barcodeInput").value = result.codeResult.code;
                                  // Realizar acciones con el código de barras escaneado
                                });
                            </script>
                             
                        </div>
                        <br>
                            
                                <div class="form-outline mb-4">
                                    <label class="form-label">Numero de Unidad</label>
                                    <input type="text" style="padding-left: 1rem; padding-right: 1rem;" class="form-control" name="noUnidad" id="barcodeInput"
                                    disabled/>
                                </div>
                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <button type="submit" class="btn btn-success btn-lg form-control"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Enviar</button>
                                </div>
                        </div>
                    </div>
<br>
                    <div class="card mx-auto bg-light" style=" text-align: left;">
                        <div class="card-body">
                                <table class="table" >
                                    <thead class="table-success table-striped" >
                                        <tr>
                                            <th>No.</th>
                                            <th>Eco</th>
                                            <th>Placas</th>
                                            <th>Marca</th>
                                            <th>Hora</th>
                                            <!-- <th>Hora</th> -->
                                                    
                                        </tr>
                                    </thead>
                                        <tbody>
                                           <?php
                                                while ($result=$cs -> fetchArray()){


                                            ?>
                                            <tr>
                                                <th><?php  echo $result['noUnidad']?></th>
                                                
                                                            <th><?php  echo $result['noUnidad']?></th>
                                                            <th><?php  echo $result['placas']?></th>
                                                            <th><?php  echo $result['marca']?></th>
                                                            <th></th>
                                                            <!-- <th></th> -->    
                                                            <!-- <th><a href="#" class="btn btn-danger">Eliminar</a></th> -->                                        
                                                        </tr>
                                                    <?php 
                                                        }
                                                    ?>
                                        </tbody>
                                </table>
                            </form>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </body>
</html>