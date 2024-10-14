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
    
    // Valores vazios
    $servicos = json_encode([]);
    $data_do_servico = null;
    $hora_do_servico = null;

    $sql = "INSERT INTO cadastro (usuario_nome_completo, usuario_email, usuario_senha, usuario_telefone, usuario_cpf, usuario_data_de_nascimento, usuario_sexo, usuario_termos_obrigatorios, usuario_incricao_newsletter, servicos, data_do_servico, hora_do_servico) 
            VALUES ('$nome', '$email', '$senha', '$telefone', '$cpf', '$nascimento', '$sexo', '$termos', '$newsletter', '$servicos', NULL, NULL)"; // Inserir NULL diretamente no SQL

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
        header('Location: login.html'); // Redirecionar para a página de login após o cadastro
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
