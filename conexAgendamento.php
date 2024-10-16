<?php
include 'conexao.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar o ID do usuário a partir da sessão
    $usuario_id = $_SESSION['usuario_id'];

    // Buscar as informações do usuário a partir da tabela cadastro
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

        // Verificar se já existe um agendamento para esse usuário na mesma data e hora
        $sqlCheckAgendamento = "SELECT * FROM agendamentos 
                                WHERE usuario_id = '$usuario_id' 
                                AND data_do_servico = '$data' 
                                AND hora_do_servico = '$hora'";

        $checkResult = $conn->query($sqlCheckAgendamento);

        if ($checkResult->num_rows == 0) {
            // Inserir o agendamento na tabela, agora relacionando o usuario_id corretamente
            $sqlInsert = "INSERT INTO agendamentos (usuario_id, usuario_nome_completo, usuario_email, usuario_telefone, data_do_servico, hora_do_servico, servicos)
                          VALUES ('$usuario_id', '$nome', '$email', '$telefone', '$data', '$hora', '$servicos_json')";

            if ($conn->query($sqlInsert) === TRUE) {
                echo "Estamos te redirecionando para a home";
                header("refresh:1;url=index.html");
                exit();
            } else {
                echo "Erro ao inserir agendamento: " . $conn->error;
            }
        } else {
            echo "Já existe um agendamento para esse cliente nessa data e horário.";
        }
    } else {
        echo "Erro: Usuário não encontrado.";
    }
}

$conn->close();
?>
