<?php
require 'functions.php';
session_start();
$isLoggedIn = isset($_SESSION['usuario_id']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santos Barbearia</title>
    
    <!-- Links para os arquivos CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Ícones FontAwesome -->
    <script src="https://kit.fontawesome.com/887c519871.js" crossorigin="anonymous"></script>
    
    <!-- Scripts -->
    <script src="js/slider.js" defer></script>
    <script src="js/modal.js" defer></script>
</head>

<body>

    <!----------------- Barra de Navegação ----------------->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

             <!-- Logo da NavBar -->
            <img src="assets/Logo_NavBar.png" alt="Logo da Barbearia" class="logo-navbar">
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul id="Home_BNT" class="navbar-nav navbar-nav-left">
                    <!-- Botões de navegação alinhados à esquerda -->
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="#top">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white active" aria-disabled="true" href="#sobre-o-barbeiro">Sobre o profissional</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#servicos">Serviços</a>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-nav-right">
                    <?php if ($isLoggedIn): ?>
                        <li class="nav-item">
                            <button><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></button> <!-- Ação de logout -->
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <button><a href="login.html">Login</a></button>
                        </li>
                        <li class="nav-item">
                            <button><a href="cadastro.html">Cadastrar</a></button>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!----------------- Slider de Imagens ----------------->
    <div class="slider"  id="top">
        <div class="logo">
            <img src="assets/Logo_1.png" alt="Logo">
        </div>
    <div class="slides">
            <!-- Imagens do slider -->
            <div class="slide"><img src="assets/2.png" alt="Slide 2"></div>
            <div class="slide"><img src="assets/3.png" alt="Slide 3"></div>
            <div class="slide"><img src="assets/4.png" alt="Slide 4"></div>
            <div class="slide"><img src="assets/5.png" alt="Slide 5"></div>
            <div class="slide"><img src="assets/6.png" alt="Slide 6"></div>
        </div>
       
    </div>

    <br><br>

    <!----------------- Sobre o Barbeiro ----------------->
    <section id="sobre-o-barbeiro" class="sobre">
        <div class="container">
            <div class="sobre-conteudo">
                <img src="assets/Santos_Barbeiro.png" alt="Foto do Barbeiro">
                <div id="sobre_barbeiro" class="sobre_texto">
                    <h1>SOBRE O PROFISSIONAL</h1>
                    <p>Com mais de 35 anos de tradição no mercado, a Santos Barbearia oferece um conceito de barbearia clássica, combinando técnicas tradicionais com um atendimento altamente personalizado. Nosso profissional é especializado em diversas técnicas de corte e barbear, garantindo uma experiência única e refinada para cada cliente. Aqui, o compromisso com a excelência vai além do corte, proporcionando um ambiente acolhedor e um serviço dedicado a elevar o bem-estar e a satisfação de quem nos escolhe.</p>
                </div> <!-- Fechando a div sobre_texto -->
            </div> <!-- Fechando a div sobre-conteudo -->
        </div> <!-- Fechando a div container -->
    </section>

    <!----------------- Agendamento de Serviços ----------------->
    <section id="servicos" class="serv">
        <h1>NOSSOS SERVIÇOS</h1>
        <div class="grid-container">
            <a href="#" class="grid-item openModal" data-modal="modalCorte">
                <img src="assets/Servicos/1_Corte.png" alt="Corte">
                <span>Corte</span>
            </a>
            <a href="#" class="grid-item openModal" data-modal="modalBarba">
                <img src="assets/Servicos/2_Barba.png" alt="Barba">
                <span>Barba</span>
            </a>
            </a>
            <a href="#" class="grid-item openModal" data-modal="modalCorteFeminino">
                <img src="assets/Servicos/3_Corte_FM.png" alt="Corte Feminino">
                <span>Corte Feminino</span>
            </a>
            <a href="#" class="grid-item openModal" data-modal="modalTintura">
                <img src="assets/Servicos/7_Tintura.png" alt="Tintura">
                <span>Tintura</span>
            </a>
            <a href="#" class="grid-item openModal" data-modal="modalLavagem">
                <img src="assets/Servicos/6_Lavagem.png" alt="Lavagem">
                <span>Lavagem</span>
            </a>
            <a href="#" class="grid-item openModal" data-modal="modalLuzes">
                <img src="assets/Servicos/9_Luzes.png" alt="Luzes">
                <span>Luzes</span>
            </a>
            <a href="#" class="grid-item openModal"  data-modal="modalDepilação">
                <img src="assets/Servicos/5_Depilacao.png" alt="Depilação">
                <span>Depilação</span>
            </a>
            <a href="#" class="grid-item openModal" data-modal="modalBarboterapia">
                <img src="assets/Servicos/8_Barbo_Terapia.png" alt="Barboterapia">
                <span>Barboterapia</span>
            </a>
            <a href="#" class="grid-item openModal" data-modal="modalNanoBlading">
              <img src="../Santos_Barbearia_Inter_2024.2/assets/Servicos/nanoblading.png" alt="Nanoblading">
              <span>Nanoblading</span>
          </a>
        </div> <!-- Fechando a div grid-container -->
    </section>

    <div id="modalCorte" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Tabela De Preços</h2>
          <table>
            <tr><th>Serviços</th><th>Preço</th></tr>
            <tr><td>Americano</td><td>R$ 85,00</td></tr>
            <tr><td>Degradê</td><td>R$ 85,00</td></tr>
            <tr><td>Militar</td><td>R$ 85,00</td></tr>
            <tr><td>Moicano</td><td>R$ 85,00</td></tr>
            <tr><td>Undercut</td><td>R$ 85,00</td></tr>
          </table>
         <?php exibirBtnAgendamento(); ?>
        </div>
      </div>

      <div id="modalBarba" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Tabela De Preços</h2>
          <table>
            <tr><th>Serviços</th><th>Preço</th></tr>
            <tr><td>Estilo Quadrado</td><td>R$ 50,00</td></tr>
            <tr><td>Estilo Redondo</td><td>R$ 50,00</td></tr>
            <tr><td>Cavanhaque</td><td>R$ 50,00</td></tr>
            <tr><td>Barba Real</td><td>R$ 50,00</td></tr>
            <tr><td>Circular</td><td>R$ 50,00</td></tr>
          </table>
          <?php exibirBtnAgendamento(); ?>
        </div>
      </div>
      
      <div id="modalCorteFeminino" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Tabela De Preços</h2>
          <table>
            <tr><th>Serviços</th><th>Preço</th></tr>
            <tr><td>Channel</td><td>R$ 150,00</td></tr>
            <tr><td>Camadas</td><td>R$ 150,00</td></tr>
            <tr><td>Joãozinho</td><td>R$ 150,00</td></tr>
            <tr><td>Repicado</td><td>R$ 150,00</td></tr>
          </table>
          <?php exibirBtnAgendamento(); ?>
        </div>
      </div>

      <div id="modalTintura" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Tabela De Preços</h2>
          <table>
            <tr><th>Serviços</th><th>Preço</th></tr>
            <tr><td>Preto</td><td>R$ 140,00</td></tr>
            <tr><td>Castanho</td><td>R$ 140,00</td></tr>
            <tr><td>Loiro</td><td>R$ 140,00</td></tr>
            <tr><td>Ruivo</td><td>R$ 140,00</td></tr>
            <tr><td>Chocolate</td><td>R$ 14 0,00</td></tr>
          </table>
          <?php exibirBtnAgendamento(); ?>          
        </div>
      </div>

      <div id="modalLavagem" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Tabela De Preços</h2>
          <table>
            <tr><th>Serviços</th><th>Preço</th></tr>
            <tr><td>Comum</td><td>R$ 50,00</td></tr>
            <tr><td>Especial</td><td>R$ 80,00</td></tr>
          </table>
          <?php exibirBtnAgendamento(); ?>
        </div>
      </div>

      <div id="modalLuzes" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Tabela De Preços</h2>
          <table>
            <tr><th>Serviços</th><th>Preço</th></tr>
            <tr><td>Inversas</td><td>R$ 270,00</td></tr>
            <tr><td>Tradicionais</td><td>R$ 270,00</td></tr>
          </table>
          <?php exibirBtnAgendamento(); ?>
        </div>
      </div>

      <div id="modalDepilação" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Tabela De Preços</h2>
          <table>
            <tr><th>Serviços</th><th>Preço</th></tr>
            <tr><td>Nariz</td><td>R$ 20,00</td></tr>
            <tr><td>Orelha</td><td>R$ 20,00</td></tr>
          </table>
          <?php exibirBtnAgendamento(); ?>
        </div>
      </div>

      <div id="modalBarboterapia" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Tabela De Preços</h2>
          <table>
            <tr><th>Serviços</th><th>Preço</th></tr>
            <tr><td>Barboterapia</td><td>R$ 90,00</td></tr>
          </table>
          <?php exibirBtnAgendamento(); ?>
        </div>
      </div>

      <div id="modalNanoBlading" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Tabela De Preços</h2>
          <table>
            <tr><th>Serviços</th><th>Preço</th></tr>
            <tr><td>Nanoblading</td><td>R$ 1500,00</td></tr>
          </table>
          <?php exibirBtnAgendamento(); ?>
        </div>
      </div>
</body>

<footer id="footer">


    <div class="footer-container">

        <div class="footer-logo">
        <img src="assets/Rodape/Logo_Rodape.png" alt="logo rodapé">
        </div>

        <div class= "footer-localização" id= "footer-localização">
          <h3>Nossa Localização</h3>
          <iframe
              src= "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.827491061729!2d-34.90724382626844!3d-8.119040281249477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab1f427968d6cb%3A0x34787df94f76a149!2sShopping%20Recife!5e0!3m2!1spt-BR!2sbr!4v1728933842101!5m2!1spt-BR!2sbr" width="300" height="250" style="border:0.5;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
              width="25"
              height="25"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
          </iframe>
         </div>
         
         <div class="footer-container">
        <div class="footer-hours">
        <h4>Horários de Atendimento</h4>
        <h5>Seg-Sex: 9h às 18h <br>
            Sáb: 9h às 14h</h5>
        </div>

        <div class="footer-icons" id="redes"> 
         <h5>REDES SOCIAIS</h5> 

        <a href="https://www.instagram.com/santosbarbeiro.br/" target="_blank">
            <img src="assets/Rodape/instagram.png" alt="Instagram" />
        </a>
        <a href="https://wa.me/558199535210" target="_blank">
            <img src="assets/Rodape/whatsapp.png" alt="WhatsApp" />
        </a>
          </div>

    </div>
</footer>

</html>
