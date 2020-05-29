<?php
    session_start();
    include ('serv.php');
    if(isset($_SESSION['usuario'])){
    header('Content-Type: text/html; charset=UTF-8');
?>
<?php
    require_once 'producto.entidad.php';
    require_once 'producto.model.php';
    // Logica
    $alm = new Producto();
    $model = new ProductoModel();
    if(isset($_REQUEST['action']))
    {
        switch($_REQUEST['action'])
        {
            case 'actualizar':
                $alm->__SET('cod', $_REQUEST['cod']);
                $alm->__SET('nom', $_REQUEST['nom']);
                $alm->__SET('mar', $_REQUEST['mar']);
                $alm->__SET('pre', $_REQUEST['pre']);                
                $model->Actualizar($alm);
                header('Location: producto.php');
                break;

            case 'registrar':
                $alm->__SET('cod', $_REQUEST['cod']);
                $alm->__SET('nom', $_REQUEST['nom']);
                $alm->__SET('mar', $_REQUEST['mar']);
                $alm->__SET('pre', $_REQUEST['pre']);                
                $model->Registrar($alm);
                header('Location: producto.php');
                break;
            case 'eliminar':
                $model->Eliminar($_REQUEST['cod']);
                header('Location: producto.php');
                break;
            case 'editar':
                $alm = $model->Obtener($_REQUEST['cod']);
                break;
        }
    }
?>
<html>
	<head>
		<title>BIENVENIDOS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
        <div class="container">
           <div class="row">
                <div class="col-md-2">
                    <center>
                        <img src="img/consorcio.png" class="img img-responsive"><br><br>
                        <a href="#" class="btn btn-info" role="button">Foros</a><br> <br> 
                        <a href="#" class="btn btn-info" role="button">Personal</a><br><br> 
                        <a href="#" class="btn btn-info" role="button">Normas técnicas</a><br> <br>
                        <a href="#" class="btn btn-info" role="button">Boletines</a><br> <br>
                        <a href="#" class="btn btn-info" role="button">Sistema ISO</a> <br><br>
                        <a href="#" class="btn btn-info" role="button">Sugerencias</a> <br><br>
                        <a href="logout.php" class="btn btn-info" role="button">Cerrar sesión</a> <br>

                    </center>
                      
                </div>
                <div class="col-md-9">
                    <h1>CONSORCIO</h1>
                   <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#">CONSORCIO</a>
                            </div>
                                <ul class="nav navbar-nav">
                                <li><a href="panel.php">Inicio</a></li>
                                <li class="active"><a href="registro.php">Registro</a></li>
                                <li><a href="lista.php">Lista</a></li>
                                <li><a href="consulta.php">Consulta</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="?action=<?php echo $alm->cod ?'actualizar' : 'registrar'; ?>" method="post" role="form" enctype="multipart/form-data">
                                <center><h2>Ingrese los datos requeridos</h2></center>
                                <fieldset class="form-group">
                                    <input type="hidden" name="cod" placeholder="Código " required size="10" class="form-control" value="<?php echo $alm->__GET('cod'); ?>"><br>
                                    <label for="nom" >Nombre de producto :</label>
                                    <input type="text" name="nom" placeholder="Nombre" required size="50" class="form-control" value="<?php echo $alm->__GET('nom'); ?>"><br>
                                    <label for="nom" >Marca de producto :</label>
                                    <input type="text" name="mar" placeholder="Marca" required size="50" class="form-control" value="<?php echo $alm->__GET('mar'); ?>"><br>
                                    <label for="nom" >Precio de producto :</label>
                                    <input type="text" name="pre" placeholder="00.00" required size="50" class="form-control" value="<?php echo $alm->__GET('pre'); ?>"><br>
                                    <br>
                                </fieldset>
                                 <center>
                                     <input type="submit" value="Añadir Producto"><br><br>
                                 </center>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">	
                            <header>
                                <h2>REGISTRO</h2>
                            </header>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>CÓDIGO</th>
                                        <th>NOMBRES</th>
                                        <th>MARCA</th>
                                        <th>PRECIO</th>	
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php foreach($model->Listar() as $r): ?>
                                <tr>
                                    <td><?php echo $r->__GET('cod'); ?></td>
                                    <td><?php echo $r->__GET('nom'); ?></td>
                                    <td><?php echo $r->__GET('mar'); ?></td>
                                    <td><?php echo $r->__GET('pre'); ?></td>
                                    <td>
                                        <a href="?action=editar&cod=<?php echo $r->cod; ?>">Editar</a>
                                    </td>
                                    <td>
                                        <a href="?action=eliminar&cod=<?php echo $r->cod; ?>">Eliminar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="col-md-1">
                    <header>
                        <h2><small>Bienvenido </small><b><?php echo $_SESSION['usuario']; ?></b></h2>
					</header>                   
                </div>
            </div>
			
        </div> 
	</body>
</html>
<?php
}
else{
echo '<script>window.location="iniciar.php"; </script>';
}
$profile=$_SESSION['usuario'];
?>
