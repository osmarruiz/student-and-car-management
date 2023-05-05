<!DOCTYPE html>

<head>
  <title>Listado de autos</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <!--se realiza la conexion con la base de datos y se crean objetos-->
  <?php
  include_once("Cauto.php");

  //conecta a la base de datos
  $DB = new mysqli("localhost", "root", "", "registro");
  if ($DB->connect_errno) {
    print "Error en la conexion";
    exit();
  }
  //consulta
  $result = $DB->query("select * from autos");
  //procesamiento de la consulta
  $list = array();
  for ($i = 0; $i < mysqli_num_rows($result); $i++) {
    $aut = $result->fetch_assoc();
    $list[$i] = new auto($aut['id'], $aut['placa'], $aut['modelo'], $aut['marca'], $aut['descripcion']);
  }
  //cierra la base de datos
  mysqli_close($DB);
  ?>
  <h1>Listado de Autos</h1>
  <br>
  <br>
  <div class="container">
    <!--barra de busqueda-->
    <form method="post" action="listarauto.php">
      <div class="input-group input-group-lg">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-lg">Busqueda</span>
        </div>

        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="termino_busqueda">
        <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#exampleModal" name="buscar" name="procesarauto">buscar</button>

      </div>
    </form>
    <?php
    include_once("Cauto.php");

    //conecta a la base de datos
    $DB = new mysqli("localhost", "root", "", "registro");
    if ($DB->connect_errno) {
      print "Error en la conexion";
      exit();
    }

    //verifica que se haya recibido el término de búsqueda
    if (isset($_POST['buscar'])) {
      $termino = $_POST['termino_busqueda'];
      //consulta
      $result = $DB->query("select * from autos where placa like '%$termino%' or modelo like '%$termino%' or marca like '%$termino%' or descripcion like '%$termino%'");
      //procesamiento de la consulta
      $list = array();
      for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $aut = $result->fetch_assoc();
        $list[$i] = new auto($aut['id'], $aut['placa'], $aut['modelo'], $aut['marca'], $aut['descripcion']);
      }
    }

    //cierra la base de datos
    mysqli_close($DB);
    ?>
    <!--tabla de los autos-->
    <table class="table table-dark mt-4">
      <thead>
        <tr>
          <th scope="row">id</th>
          <th scope="row">placa</th>
          <th scope="row">modelo</th>
          <th scope="row">marca</th>
          <th scope="row">descripcion</th>
          <th scope="row">opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($list as $auto) {
          echo "<tr><td>$auto->id</td><td>$auto->placa</td><td>$auto->modelo</td><td>$auto->marca</td><td>$auto->descripcion</td>   <td><a href='editarauto.php?id=" . $auto->id .  "' class='btn btn-primary mr-3'>Editar</a><a href='borrarauto.php?id=" . $auto->id . "' class='btn btn-danger'>Borrar</a></td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <br>
  <br>
  <a href="index.html" class="ml-3 btn btn-secondary">Regresar a la pagina principal</a>
  <br>
  <br>
</body>

</html>