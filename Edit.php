<?php
if (empty($_GET)){
    echo 'Debe seleccionar un paciente para editar';
    die();
}

include_once('connection.php');

if (empty($_POST) == false) {

    $identificador = $_POST['identificador'];
    $documento     = $_POST['documento'];
    $nombres       = $_POST['nombres'];
    $apellidos     = $_POST['apellidos'];
    $fecha         = $_POST['fecha'];
    $sexo          = $_POST['sexo'];

    $update = "UPDATE pacientes SET PacIdentificacion = '$documento', PacNombres = '$nombres', PacApellidos = '$apellidos', PacFechaNacimiento = '$fecha', PacSexo = '$sexo' WHERE PacIdentificacion = '$identificador';";

    if (! $conection->query($update)) {
        echo "Falló la actualización de la tabla: (" . $conection->errno . ") " . $conection->error;
    }
    echo 'El paciente se ha actualizado correctamente!';
    $conection->close();
    die();
} else {
    $documento = $_GET['doc'];
    $pacientes = $conection->query("SELECT * FROM pacientes WHERE PacIdentificacion = '$documento'");
    if ($paciente = $pacientes->fetch_assoc()) {
    } else {
        echo 'No encontramos el paciente que busca';
        die();
    }
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
    <?php include_once('menu.php') ?>

    <section class="section">
        <h1 class="title">Editar paciente</h1>
        <h2 class="subtitle">
            Actualice la información del paciente mediante el siguiente formulario.
        </h2>

        <div class="columns">
            <div class="column">
                 <form action="" method="post">
                     <input type="hidden" name="identificador" value="<?php echo $paciente['PacIdentificacion'] ?>">
                    <div class="field">
                        <label class="label">Identificación</label>
                        <div class="control">
                            <input class="input" name="documento" type="text" placeholder="Documento" value="<?php echo $paciente['PacIdentificacion'] ?>">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nombres</label>
                        <div class="control">
                            <input class="input" type="text" name="nombres" value="<?php echo $paciente['PacNombres'] ?>">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Apellidos</label>
                        <div class="control">
                            <input class="input" type="text" name="apellidos" value="<?php echo $paciente['PacApellidos'] ?>">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Fecha de nacimiento</label>
                        <div class="control">
                            <input class="input" type="date" name="fecha" value="<?php echo $paciente['PacFechaNacimiento'] ?>">
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <label class="radio">
                            <input type="radio" name="sexo" valor="f"
                            checked="<?php echo $paciente['PacSexo'] == 'F' ?>">
                            F
                            </label>
                            <label class="radio">
                            <input type="radio" name="sexo" value="m" checked="<?php echo $paciente['PacSexo'] == 'M' ?>">
                            M
                            </label>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-link">Enviar</button>
                        </div>
                        <div class="control">
                            <a href="/citas/"type="reset" class="button is-link is-light">Cancelar</a>
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