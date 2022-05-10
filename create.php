<?php

if (empty($_POST) == false) {

    include_once('connection.php');

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
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  </head>
  <body>
    <?php include_once('menu.php') ?>

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