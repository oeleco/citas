<?php
$conection = new mysqli("localhost", "desarrollador", "adsi2017", "citas");
if( $conection->connect_errno) {
    echo "Falla al conectarse a Mysql ( ". $conn->connect_errno . ") " .
    $conection->connect_error ;
    exit() ;
};
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar citas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  </head>
  <body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a href="/citas/" class="navbar-item">
                    Listar
                </a>

                <a href="/citas/crear.php"class="navbar-item">
                    Crear
                </a>
            </div>
        </div>
    </nav>

    <section class="section">
        <h1 class="title">Listar pacientes</h1>
        <h2 class="subtitle">
            Estos son los pacientes registrados en el sistema.
        </h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha</th>
                    <th>Sexo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($pacientes = $conection->query("SELECT * FROM pacientes") ){
                    while($paciente = $pacientes->fetch_assoc()){
                ?>
                    <tr>
                        <td><?php echo $paciente['PacIdentificacion']; ?></td>
                        <td><?php echo $paciente['PacNombres']; ?></td>
                       <td><?php echo $paciente['PacApellidos']; ?></td>
                       <td><?php echo $paciente['PacFechaNacimiento']; ?></td>
                        <td><?php echo $paciente['PacSexo']; ?></td>
                    </tr>
                <?php
                    };
                };
                ?>
            </tbody>
        </table>

    </section>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>
            <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
            <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
            is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
            </p>
        </div>
    </footer>
    <?php
    $pacientes->free();
    $conection->close();
    ?>
  </body>
</body>
</html>