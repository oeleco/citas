<?php

if (empty($_POST) == false) {
    $conection = new mysqli("localhost", "desarrollador", "adsi2017", "citas");

    if( $conection->connect_errno) {
        echo "Falla al conectarse a Mysql ( ". $conn->connect_errno . ") " .
        $conection->connect_error ;
        exit() ;
    };

    $documento = $_POST['documento'];
    $nombres   = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $fecha     = $_POST['fecha'];
    $sexo      = $_POST['sexo'];

    $consultaInsertar = "INSERT INTO pacientes (PacIdentificacion,PacNombres,PacApellidos,PacFechaNacimiento,PacSexo) VALUES ('$documento','$nombres','$apellidos','$fecha','$sexo');";

    if (! $conection->query($consultaInsertar)) {
        echo "Falló la creación de la tabla: (" . $conection->errno . ") " . $conection->error;
    }
    echo 'El paciente se ha ingresado correctamente!';

    $conection->close();
}
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
        <h1 class="title">Gestionar pacientes</h1>
        <h2 class="subtitle">
            Diligencie el formulario acontinuacion para registrar un nuevo paciente.
        </h2>

        <div class="columns">
            <div class="column">
                 <form action="" method="post">
                    <div class="field">
                        <label class="label">Identificación</label>
                        <div class="control">
                            <input class="input" name="documento" type="text" placeholder="Documento">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nombres</label>
                        <div class="control">
                            <input class="input" type="text" name="nombres">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Apellidos</label>
                        <div class="control">
                            <input class="input" type="text" name="apellidos">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Fecha de nacimiento</label>
                        <div class="control">
                            <input class="input" type="date" name="fecha">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <label class="radio">
                            <input type="radio" name="sexo" valor="f">
                            F
                            </label>
                            <label class="radio">
                            <input type="radio" name="sexo" value="m">
                            M
                            </label>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-link">Enviar</button>
                        </div>
                        <div class="control">
                            <button type="reset" class="button is-link is-light">Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.column -->
            <div class="column"></div>
            <!-- /.column -->
        </div>
        <!-- /.columns -->
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
  </body>
</body>
</html>