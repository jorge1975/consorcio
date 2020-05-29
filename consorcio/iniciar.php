<?php
session_start();
include ('serv.php');
if (isset($_SESSION['user'])){
echo '<script>window.location="panel.php"; </script>';
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>SIATMEDIA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
            <div class="container">
            	<div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        <img src="img/siatmedia_logo.png" 
								class="img-responsive" 
								alt="Siatmedia">
						<h2>Aplicacion Consorcio</h2>
						<h3>exclusivo para Siatmedia</h3>
						<p>Ingrese a la plataforma de negocios</p>
					</div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        <h3><center>INICIAR SESIÓN</center></h3>
				        <br>
				        <form method="post" action="validar.php">
                            <div class="form-group">
				            <input type="text" name="usuario" value="" placeholder="Usuario" class="form-control"/><br>
				            <input type="password" name="clave" value="" placeholder="Password" class="form-control"/><br>
				            <footer>
				                <center>
				                    <input type="submit" value="Ingresar" name="login" />
				                    <a href="#"><p>Regresar</p></a>
								</center>
				            </footer>
				            </div>
						</form>
					</div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>			
		
	</body>
</html>
