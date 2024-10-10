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

// Verifica se um serviço foi selecionado e se a data e hora estão preenchidos
document.getElementById('agendamentoForm').addEventListener('input', function() {
    const checkboxesCorte = document.querySelectorAll('input[name="corte"]:checked');
    const checkboxesBarba = document.querySelectorAll('input[name="barba"]:checked');
    const checkboxesNanoblading = document.querySelectorAll('input[name="nanoblading"]:checked');
    const checkboxesCorteFeminino = document.querySelectorAll('input[name="corteFeminino"]:checked');
    const checkboxesTintura = document.querySelectorAll('input[name="tintura"]:checked');
    const checkboxesLavagem = document.querySelectorAll('input[name="lavagem"]:checked');
    const checkboxesLuzes = document.querySelectorAll('input[name="luzes"]:checked');
    const checkboxesDepilacao = document.querySelectorAll('input[name="depilacao"]:checked');
    const checkboxesBarboterapia = document.querySelectorAll('input[name="barboterapia"]:checked');
    const data = document.getElementById('data').value;
    const hora = document.getElementById('hora').value;

    const servicoSelecionado = checkboxesCorte.length > 0 || checkboxesBarba.length > 0 || checkboxesNanoblading.length > 0 || checkboxesCorteFeminino.length > 0 ||
                               checkboxesTintura.length > 0 || checkboxesLavagem.length > 0 || checkboxesLuzes.length > 0 ||
                               checkboxesDepilacao.length > 0 || checkboxesBarboterapia.length > 0;
    const dataHoraPreenchidos = (data !== "") && (hora !== "");

    const agendarBtn = document.getElementById('agendarBtn');
    agendarBtn.disabled = !(servicoSelecionado && dataHoraPreenchidos);
});

// Listener para enviar o formulário
document.getElementById('agendamentoForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const checkboxesCorte = document.querySelectorAll('input[name="corte"]:checked');
    const checkboxesBarba = document.querySelectorAll('input[name="barba"]:checked');
    const checkboxesNanoblading = document.querySelectorAll('input[name="nanoblading"]:checked');
    const checkboxesCorteFeminino = document.querySelectorAll('input[name="corteFeminino"]:checked');
    const checkboxesTintura = document.querySelectorAll('input[name="tintura"]:checked');
    const checkboxesLavagem = document.querySelectorAll('input[name="lavagem"]:checked');
    const checkboxesLuzes = document.querySelectorAll('input[name="luzes"]:checked');
    const checkboxesDepilacao = document.querySelectorAll('input[name="depilacao"]:checked');
    const checkboxesBarboterapia = document.querySelectorAll('input[name="barboterapia"]:checked');
    const data = document.getElementById('data').value;
    const hora = document.getElementById('hora').value;

    const servicosCorte = Array.from(checkboxesCorte).map(checkbox => checkbox.value).join(', ');
    const servicosBarba = Array.from(checkboxesBarba).map(checkbox => checkbox.value).join(', ');
    const servicosNanoblading = Array.from(checkboxesNanoblading).map(checkbox => checkbox.value).join(', ');
    const servicosCorteFeminino = Array.from(checkboxesCorteFeminino).map(checkbox => checkbox.value).join(', ');
    const servicosTintura = Array.from(checkboxesTintura).map(checkbox => checkbox.value).join(', ');
    const servicosLavagem = Array.from(checkboxesLavagem).map(checkbox => checkbox.value).join(', ');
    const servicosLuzes = Array.from(checkboxesLuzes).map(checkbox => checkbox.value).join(', ');
    const servicosDepilacao = Array.from(checkboxesDepilacao).map(checkbox => checkbox.value).join(', ');
    const servicosBarboterapia = Array.from(checkboxesBarboterapia).map(checkbox => checkbox.value).join(', ');

    const resultado = document.getElementById('resultado');

    if (data && hora) {
        let mensagem = `Serviço agendado para ${data} às ${hora}.`;
        if (servicosCorte) mensagem += ` Corte: ${servicosCorte}.`;
        if (servicosBarba) mensagem += ` Barba: ${servicosBarba}.`;
        if (servicosNanoblading) mensagem += ` Nanoblading: ${servicosNanoblading}.`;
        if (servicosCorteFeminino) mensagem += ` Corte Feminino: ${servicosCorteFeminino}.`;
        if (servicosTintura) mensagem += ` Tintura: ${servicosTintura}.`;
        if (servicosLavagem) mensagem += ` Lavagem: ${servicosLavagem}.`;
        if (servicosLuzes) mensagem += ` Luzes: ${servicosLuzes}.`;
        if (servicosDepilacao) mensagem += ` Depilação: ${servicosDepilacao}.`;
        if (servicosBarboterapia) mensagem += ` Barboterapia: ${servicosBarboterapia}.`;

        resultado.textContent = mensagem;
        resultado.style.display = 'block';
    } else {
        resultado.textContent = 'Por favor, selecione pelo menos um serviço e preencha a data e o horário.';
        resultado.style.display = 'block';
    }
});

document.getElementById("agendamentoForm").addEventListener("submit", function (e) {
    e.preventDefault();
    
    const data = document.getElementById("data").value;
    const hora = document.getElementById("hora").value;

    const confirmar = confirm(`Deseja realmente agendar para ${data} às ${hora} horas?`);

    if (confirmar) {
        alert("Agendamento confirmado com sucesso!");
    } else {
        alert("Agendamento cancelado.");
    }
});
