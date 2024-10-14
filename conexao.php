<?php
$servername = "k9xdebw4k3zynl4u.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "jdocjo0qr6n7fswm";
$password = "ot4rv2hrpywqbwvp";
$dbname = "y4l7y7v3pdk47h8m";
// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
