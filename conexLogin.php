<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM cadastro WHERE usuario_email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['usuario_senha'])) {
            session_start();
            $_SESSION['usuario_id'] = $row['usuario_id']; // Armazena o ID do usuário para a sessão
            header('Location: agendamento.html'); // Redireciona para a página de agendamento
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Nenhum usuário encontrado com este email!";
    }
}

$conn->close();
?>
