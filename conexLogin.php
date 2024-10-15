<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM cadastro WHERE usuario_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifica a senha
        if (password_verify($senha, $row['usuario_senha'])) {
            session_start(); // Inicia a sessão

            // Armazena os dados do usuário na sessão
            $_SESSION['usuario_id'] = $row['usuario_id'];
            $_SESSION['usuario_nome'] = $row['usuario_nome_completo'];
            $_SESSION['usuario_email'] = $row['usuario_email'];
            $_SESSION['usuario_telefone'] = $row['usuario_telefone'];

            // Redireciona para a página de agendamento
            header('Location: agendamento.html');
            exit();
        } else {
            echo "Dados inseridos incorretamente!";
        }
    } else {
        echo "Nenhum usuário encontrado com este email!";
    }

    // Fecha a declaração
    $stmt->close();
}

$conn->close();
?>
