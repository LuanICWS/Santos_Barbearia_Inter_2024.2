// Função para gerar horários com base no dia da semana
function gerarHorarios(data) {
    const horaSelect = document.getElementById('hora');
    horaSelect.innerHTML = '<option value="">Selecione um horário</option>'; 

    const diaSemana = new Date(data).getDay();

    let horaInicio, horaFim;

    // Definir horários com base no dia da semana
    if (diaSemana >= 0 && diaSemana < 5) { 
        horaInicio = 9;
        horaFim = 18;
    } else if (diaSemana === 5) { 
        horaInicio = 9;
        horaFim = 14;
    } else {
        return;
    }

    // Gerar as opções de horário com intervalo de 1 hora
    for (let hora = horaInicio; hora <= horaFim; hora++) {
        const horaFormatada = hora.toString().padStart(2, '0') + ":00";
        const option = document.createElement('option');
        option.value = horaFormatada;
        option.textContent = horaFormatada;
        horaSelect.appendChild(option);
    }
}

// Listener para habilitar o botão e gerar os horários
document.getElementById('data').addEventListener('change', function() {
    const data = this.value;
    gerarHorarios(data); // Gerar horários com base na data
});

// Função para verificar se um serviço foi selecionado e se a data e hora estão preenchidos
function verificarFormulario() {
    const checkboxes = document.querySelectorAll('input[name="servicos[]"]:checked'); // Serviços gerais
    const data = document.getElementById('data').value;
    const hora = document.getElementById('hora').value;

    // Verifica se ao menos um serviço foi selecionado ou Nanoblading
    const servicoSelecionado = (checkboxes.length > 0);
    const dataHoraPreenchidos = (data !== "") && (hora !== "");

    const agendarBtn = document.getElementById('agendarBtn');

    // Habilita o botão somente se um serviço, data e hora forem preenchidos
    agendarBtn.disabled = !(servicoSelecionado && dataHoraPreenchidos);
}

// Listener para monitorar qualquer mudança nos checkboxes, data ou hora
document.getElementById('agendamentoForm').addEventListener('change', verificarFormulario);

// Listener para monitorar especificamente mudanças na data e hora
document.getElementById('data').addEventListener('change', verificarFormulario);
document.getElementById('hora').addEventListener('change', verificarFormulario);

// Listener para enviar o formulário
document.getElementById('agendamentoForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const checkboxes = document.querySelectorAll('input[name="servicos[]"]:checked');
    const data = document.getElementById('data').value;
    const hora = document.getElementById('hora').value;

    const servicosSelecionados = Array.from(checkboxes).map(checkbox => checkbox.value).join(', ');

    const resultado = document.getElementById('resultado');

    if (data && hora) {
        let mensagem = `Serviço agendado para ${data} às ${hora}.`;
        if (servicosSelecionados) mensagem += ` Serviços: ${servicosSelecionados}.`;

        resultado.textContent = mensagem;
        resultado.style.display = 'block';
    } else {
        resultado.textContent = 'Por favor, selecione pelo menos um serviço e preencha a data e o horário.';
        resultado.style.display = 'block';
    }
});

// Confirmação de agendamento
document.getElementById("agendamentoForm").addEventListener("submit", function (e) {
    e.preventDefault();
    
    const data = document.getElementById("data").value;
    const hora = document.getElementById("hora").value;

    const confirmar = confirm(`Deseja realmente agendar para ${data} às ${hora} horas?`);

    if (confirmar) {
        alert("Agendamento confirmado com sucesso!");
        // Aqui, você pode enviar o formulário ou realizar outras ações necessárias
        this.submit(); // Envia o formulário se o agendamento for confirmado
    } else {
        alert("Agendamento cancelado.");
    }
});