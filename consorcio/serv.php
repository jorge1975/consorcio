<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=consorcio','root','');       
    }
    catch(Exception $e) {
        die($e->getMessage());
    }
    /*$conect=mysqli_connect("localhost","siatmp3q_admin","C@mote01","siatmp3q_siatmedia");
    if (mysqli_connect_errno())
    {
        echo "Fallo la conexion a MySQL: " . mysqli_connect_error();
    }*/
?>
