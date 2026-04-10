<?php
$hostName = "localhost";
$dataBase = "ra2025106253";
$user = "root";
$password = "";

$mysqli = new mysqli($hostName, $user, $password, $dataBase);

if ($mysqli->connect_errno) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
}
?>