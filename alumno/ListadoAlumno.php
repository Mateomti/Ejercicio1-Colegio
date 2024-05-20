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
                <li><a class="dropdown-item" href="ListadoAlumno.php">Alumnos</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="../materia/ListadoMateria.php">Materias</a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="../cursada/ListadoCursada.php">Cursada</a></li>
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
                <li><a class="dropdown-item" href="reg_alumno.html">Alumnos</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="../materia/reg_materia.html">Materias</a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="../cursada/reg_cursada.php">Cursada</a></li>
              </ul>
            </li>
            
        </div>
      </div>
    </nav>

    <h1 class="titulo"><center>Listado Alumnos</center></h1>
    <?php
    include("../conexion.php");
    $sql = "SELECT A.apeynom, A.dni, A.fnac, A.ciudad, A.mail, A.genero, A.telefono, A.id_alumno FROM alumno A";
    $res = mysqli_query($con,$sql);
    if ($res == FALSE){
        echo"No hay alumnos registrados.";
    }
    else{ ?>
        <table class="table table-striped table-bordered w-50" align="center"  >
        <tr bgcolor=lightblue>
            <th class="table-info"> <center>Nombre y Apellido</center> </th>
            <th class="table-info"> <center>DNI</center> </th>
            <th class="table-info"> <center>Ciudad</center> </th>
            <th class="table-info"> <center>Fecha de Nacimiento</center> </th>
            <th class="table-info"> <center>Mail</center></th>
            <th class="table-info"> <center>Genero</center></th>
            <th class="table-info"><center>Telefono</center></th>
            <th class="table-info"> <center>Modificar</center> </th>
            <th class="table-info"> <center>Eliminar</center> </th>
            
        </tr>
        <?php
        while ($vec = mysqli_fetch_array($res)){
            echo"<tr bgcolor='white'>";
                echo"<td><center>$vec[0]</center></td>";
                echo"<td><center>$vec[1]</center></td>";
                echo"<td><center>$vec[3]</center></td>";
                echo"<td><center>$vec[2]</center></td>";
                echo"<td><center>$vec[4]</center></td>";
                echo"<td><center>$vec[5]</center></td>";
                echo"<td><center>$vec[6]</center></td>";

                echo"<td><center><a href='mod_alumno.php?id_a=$vec[7]'> Modificar</a></center></td>";
                echo"<td><center><a href='eliminar_alu.php?id_a=$vec[7]' onclick='return confirmar()' class='link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'> Eliminar</a></center></center></td>";
            echo"</tr>";
        }echo"</table>";}
        ?>
        <script>
          function confirmar(){
            return confirm('¿Esta seguro que desea eliminar a este alumno?')
          }
        </script>
</body>
</html>