<?php
	$conexion=mysqli_connect("localhost","root","");//conectamos al servidor web donde esta mysql
	mysqli_select_db($conexion,"bdcolegio");//seleccionamos la base de datos
	$cod=$_POST['txtcodigo'];//saca del formulario del dato ingresado por el usuario
	$nom=$_POST['txtnombre'];
	$ape=$_POST['txtapellido'];
	$cur=$_POST['datalist'];
	$fecha=$_POST['txtfecha'];
	//$cod=5687;
	//$nom=Marcelo;
	//$ape=Jiménez;
	$sql="INSERT INTO tblestudiantes(Codigo,Nombre,Apellido,Birthdate,Curso)VALUES('".$cod ."','".$nom."','".$ape."','".$fecha."','".$cur."')";//arma la sql
	$result=mysqli_query($conexion,$sql);//ejecuta la consulta
    if($result)
	{
		echo '<script language="javascript">alert("Alumno registrado correctamente");window.location.href="index.html"</script>';
	}
	else{
		echo '<script language="javascript">alert("Error al registrar");window.location.href="index.html"</script>';
	}
		
	mysqli_close($conexion);//cerramos la conexion				
?>