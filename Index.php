<?php
 include_once('connection.php');
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

  <?php include_once('menu.php') ?>

    <section class="section">
        <h1 class="title">Gestionar pacientes</h1>
        <h2 class="subtitle">
            Pacientes registrados en el sistema.
        </h2>

        <a href="/citas/create.php" class="button is-info">Agregar nuevo</a>
        <br><br>

        <table class="table is-fullwidth">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha</th>
                    <th>Sexo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
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
                        <td>
                             <a href="/citas/edit.php?doc=<?php echo $paciente['PacIdentificacion'] ?>"> Editar</a>
                        </td>
                        <td>
                            <form
                                action="/citas/delete.php" method="post">
                                <input type="hidden" name="identificador" value="<?php echo $paciente['PacIdentificacion']; ?>">
                                <button type="submit" class="button is-danger">Eliminar</button>
                            </form>
                        </td>
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