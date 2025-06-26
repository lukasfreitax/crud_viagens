<?php
$host = "localhost";
$user = "root";
$senha = "";
$banco = "agencia_viagens";

$conn = new mysqli($host, $user, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

