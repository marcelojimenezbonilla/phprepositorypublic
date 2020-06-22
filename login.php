<?php
   //function log_alumno();
  
  //exit( "paso1");
  
  // Obtengo los datos cargados en el formulario de login.
  $nombre = $_POST['nombre'];
  $codigo = $_POST['codigo'];
  // Datos para conectar a la base de datos.
  /*$nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "prueba"; */
 
  // Crear conexión con la base de datos.
  $conexion = mysqli_connect('localhost','root','', '');
  mysqli_select_db($conexion,"bdcolegio");
  // Validar la conexión de base de datos.
  if ($conexion ->connect_error) {
    die("Connection failed: " . $conexion ->connect_error);
  }
  
  // Consulta segura para evitar inyecciones SQL.
  //$sql = sprintf("SELECT * FROM tblestudiantes WHERE codigo='%s' AND nombre = '%s'", //mysql_real_escape_string($codigo), mysql_real_escape_string($nombre));

  $sql = "SELECT * FROM tblestudiantes WHERE Codigo='". $codigo ."' AND Nombre = '".$nombre ."'"; 
  //exit("sql:" . var_dump($sql)); 
  $resultado = $conexion->query($sql);
  
  //exit("resultado:" . var_dump($resultado));

  // Verificando si el usuario existe en la base de datos.

  if($resultado)
  {
	  $row = mysqli_num_rows($resultado); 
      //exit("row:" . var_dump($row)); 
      if ($row) 
              { 
				// Guardo en la sesión el email del usuario.
				$_SESSION['nombrealumno'] = $nombre;

				// Redirecciono al usuario a la página principal del sitio.
				//header("HTTP/1.1 302 Moved Temporarily"); 
				//header("Location: principal.php"); 

					echo 'Alumno encontrado, <a href="index.html">Home</a>.<br/>';
              } 
	  else
	  {
			echo 'El código o el nombre del alumno son incorrectos, <a href="index.html">vuelva a intenarlo</a>.<br/>';
  
	  }
	  

  }
else
{
	echo 'El código o el nombre del alumno son incorrectos, <a href="index.html">vuelva a intenarlo</a>.<br/>';
  }
  