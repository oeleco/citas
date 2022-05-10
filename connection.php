<?php
$conection = new mysqli("localhost", "desarrollador", "adsi2017", "citas");

if( $conection->connect_errno) {
    echo "Falla al conectarse a Mysql ( ". $conn->connect_errno . ") " .
    $conection->connect_error ;
    exit() ;
};