<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="../style.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
</head>
<body class="bg-secondary">
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.html">Ejercicio 1</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Listado
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="alumno/ListadoAlumno.php">Alumnos</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="materia/ListadoMateria.php">Materias</a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="ListadoCursada.php">Cursada</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Registrar
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="alumno/reg_alumno.html">Alumnos</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="materia/reg_materia.html">Materias</a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="reg_cursada.php">Cursada</a></li>
              </ul>
            </li>
            
        </div>
      </div>
    </nav>
    <?php
  include("../conexion.php");
  
  $alumno = $_POST["nombre"];
  $materia = $_POST["materia"];
  $nota1 = $_POST["n1"];
  $nota2 = $_POST["n2"];
  $asis = $_POST["asis"];
  $estado = $_POST["estado"];

  $alu = "SELECT `id_alumno`FROM `alumno` WHERE apeynom = '$alumno'";
  $ida = mysqli_query($con, $alu);
  $idalu = mysqli_fetch_array($ida);
  $mat = "SELECT `id_materia`FROM `materia` WHERE nombre = '$materia'";
  $idm = mysqli_query($con, $mat);
  $idmat = mysqli_fetch_array($idm);

  $sql = "INSERT INTO cursada(id_alumno, id_materia, nota1, nota2, asistencia)
          VALUES ($idalu[0], $idmat[0], $nota1, $nota2, $asis)";
  $res = mysqli_query($con, $sql);
  if ($res == TRUE){
    echo"<h1 class='titulo'>Se ha registrado con exito la cursada!</h1>";
  }
  else{
    echo"<br>Ha ocurrido un error!";
  }
?>
</body>


</html>



