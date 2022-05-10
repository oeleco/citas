<?php
if (empty($_POST) == false) {
    include_once('connection.php');

    $identificador = $_POST['identificador'];

    if (! $conection->query("DELETE FROM pacientes WHERE PacIdentificacion = $identificador")){
        echo "Falló la creación de la tabla: (" . $conection->errno . ") " . $conection->error;
    }
    echo 'El paciente se ha eliminado correctamente!';
    $conection->close();
}