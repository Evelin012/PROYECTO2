<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['user']=$usuario;


$conexion=mysqli_connect("localhost","root","","tesis");

$consulta="SELECT*FROM user where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:home.php");

}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">ERROR EN CONTRASEÑA O USUARIO, VUELVA A INGRESAR LOS DATOS</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
