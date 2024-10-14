<?php
$servername = "localhost"; // Alterar se o servidor for diferente
$username = "root"; // Nome de usuário do MySQL
$password = "root"; // Senha do MySQL
$dbname = "barbearia_santos"; // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
