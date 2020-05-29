<?php
    session_start();
    include ('serv.php');
    if(isset($_SESSION['usuario'])){
    header('Content-Type: text/html; charset=UTF-8');
?>
<?php

    require_once 'personal.entidad.php';
    require_once 'personal.model.php';

    // Logica
    $alm = new Personal();
    $model = new PersonalModel();
    if(isset($_REQUEST['action']))
    {
        switch($_REQUEST['action'])
        {
            case 'actualizar':
            $alm->__SET('cod', $_REQUEST['cod']);
            $alm->__SET('nom', $_REQUEST['nom']);
            $alm->__SET('ape', $_REQUEST['ape']);
            $alm->__SET('dir', $_REQUEST['dir']);
            $alm->__SET('fnac', $_REQUEST['fnac']);
            $alm->__SET('sex', $_REQUEST['sex']);
            $model->Actualizar($alm);
            header('Location: personal.php');
            break;
            case 'registrar':
            $alm->__SET('cod', $_REQUEST['cod']);
            $alm->__SET('nom', $_REQUEST['nom']);
            $alm->__SET('ape', $_REQUEST['ape']);
            $alm->__SET('dir', $_REQUEST['dir']);
            $alm->__SET('fnac', $_REQUEST['fnac']);
            $alm->__SET('sex', $_REQUEST['sex']);
            $model->Registrar($alm);
            header('Location: personal.php');
            break;
            case 'eliminar':
            $model->Eliminar($_REQUEST['cod']);
            header('Location: personal.php');
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
                                <li><a href="registro.php">Registro</a></li>
                                <li class="active"><a href="lista.php">Lista</a></li>
                                <li><a href="consulta.php">Consulta</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>C&Oacute;DIGO</th>
                                        <th>NOMBRES</th>
                                        <th>APELLIDOS</th>
                                        <th>DIRECCION</th>
                                        <th>FECHA NAC</th>
                                        <th>SEXO</th>		
                                    </tr>
                                </thead>
                                <?php foreach($model->Listar() as $r): ?>
                                    <tr>
                                        <td><?php echo $r->__GET('cod'); ?></td>
                                        <td><?php echo $r->__GET('nom'); ?></td>
                                        <td><?php echo $r->__GET('ape'); ?></td>
                                        <td><?php echo $r->__GET('dir'); ?></td>
                                        <td><?php echo $r->__GET('fnac'); ?></td>
                                        <td><?php echo $r->__GET('sex'); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
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
