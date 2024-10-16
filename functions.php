<?php
function exibirBtnAgendamento() {
    if (isset($_SESSION['usuario_id'])) {
        echo '<a href="agendamento.html"><button class="reservar-btn">Agendar</button></a>';
    } else {
        echo '<a href="login.html"><button class="reservar-btn">Efetue login</button></a>';
    }
}
?>
