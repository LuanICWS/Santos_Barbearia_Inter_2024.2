<?php
session_start(); // Certifique-se de iniciar a sessão

// Conexão com o banco de dados
$servername = "localhost"; // ou o nome do seu servidor
$username = "root"; // substitua pelo seu usuário do banco de dados
$password = "root"; // substitua pela sua senha do banco de dados
$dbname = "barbearia_santos"; // nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o usuário está logado
if (isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id']; // ID do usuário logado
    $usuario_nome = $_SESSION['usuario_nome']; // Nome do usuário logado
    $usuario_email = $_SESSION['usuario_email']; // Email do usuário logado
    $usuario_telefone = $_SESSION['usuario_telefone']; // Telefone do usuário logado

    // Obtém os dados do agendamento a partir do formulário (substitua os nomes conforme necessário)
    $data_do_servico = $_POST['data_do_servico'];
    $hora_do_servico = $_POST['hora_do_servico'];
    
    // Verifica se o campo 'servicos' está definido e é um array
    if (isset($_POST['servicos']) && is_array($_POST['servicos'])) {
        // Converte o array de serviços em uma string separada por vírgulas
        $servicos = implode(", ", $_POST['servicos']);
    } else {
        $servicos = ""; // ou uma string vazia, dependendo do que você preferir
    }

    // Prepara a inserção no banco de dados
    $stmt = $conn->prepare("INSERT INTO agendamentos (usuario_nome_completo, usuario_email, usuario_telefone, data_do_servico, hora_do_servico, servicos) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $usuario_nome, $usuario_email, $usuario_telefone, $data_do_servico, $hora_do_servico, $servicos);

    // Executa a inserção
    if ($stmt->execute()) {
        // Redireciona com alert em JavaScript
        echo "<script>
                alert('Agendamento realizado com sucesso!');
                window.location.href = 'index.html'; // Redireciona para index.html
              </script>";
    } else {
        echo "Erro ao realizar o agendamento: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
} else {
    echo "Usuário não está logado ou informações do usuário não estão disponíveis.";
}

$conn->close();
?>
