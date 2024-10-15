<?php
include 'conexao.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar os dados do formulário e da sessão
    $usuario_id = $_SESSION['usuario_id']; // ID do usuário a partir da sessão

    // Você precisará buscar essas informações a partir da tabela cadastro:
    $sqlUserInfo = "SELECT usuario_nome_completo, usuario_email, usuario_telefone FROM cadastro WHERE usuario_id = '$usuario_id'";
    $result = $conn->query($sqlUserInfo);

    if ($result->num_rows > 0) {
        // Pegar as informações do usuário
        $row = $result->fetch_assoc();
        $nome = $row['usuario_nome_completo'];
        $email = $row['usuario_email'];
        $telefone = $row['usuario_telefone'];

        // Capturar os dados do POST
        $servicos = $_POST['servicos']; // Captura os serviços selecionados como array
        $data = $_POST['data'];
        $hora = $_POST['hora'];

        // Converter serviços para JSON
        $servicos_json = json_encode($servicos);

        // Inserir na tabela agendamentos
        $sqlInsert = "INSERT INTO agendamentos (usuario_nome_completo, usuario_email, usuario_telefone, data_do_servico, hora_do_servico, servicos)
                      VALUES ('$nome', '$email', '$telefone', '$data', '$hora', '$servicos_json')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo "Agendamento realizado com sucesso!";
        } else {
            echo "Erro ao inserir agendamento: " . $conn->error;
        }
    } else {
        echo "Erro: Usuário não encontrado.";
    }
}

$conn->close();
?>
