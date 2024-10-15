<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['password'], PASSWORD_DEFAULT); // Criptografar a senha
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];
    $sexo = $_POST['sexo'];
    $termos = isset($_POST['usuario_termos_obrigatorios']) ? 1 : 0;
    $newsletter = isset($_POST['usuario_incricao_newsletter']) ? 1 : 0;

    // Remover a máscara do telefone
    $telefone = preg_replace('/\D/', '', $telefone); // Remove tudo que não for número
    $telefone = '55' . $telefone; // Adiciona o DDI 55 para o Brasil

    // Remover o primeiro '9' após o código de área, se existir
    if (preg_match('/^55(\d{2})9(\d{8})$/', $telefone, $matches)) {
        // Concatena o código de área sem o '9'
        $telefone = '55' . $matches[1] . $matches[2];
    }

    // Prepara a query para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO cadastro (usuario_nome_completo, usuario_email, usuario_senha, usuario_telefone, usuario_cpf, usuario_data_de_nascimento, usuario_sexo, usuario_termos_obrigatorios, usuario_incricao_newsletter) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssis", $nome, $email, $senha, $telefone, $cpf, $nascimento, $sexo, $termos, $newsletter);

    // Executa a query
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
        header('Location: login.html');
        exit();
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
