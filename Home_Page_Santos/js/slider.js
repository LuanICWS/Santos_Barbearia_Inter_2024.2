// Variável que mantém o índice do slide atualmente visível. Inicializa no primeiro slide (índice 0).
let currentIndex = 0;

// Função para mudar o slide com base na direção passada (1 para próximo, -1 para anterior).
function changeSlide(direction) {
     // Seleciona todos os elementos com a classe 'slide'
    const slides = document.querySelectorAll('.slide');
    // Armazena o número total de slides existentes.
    const totalSlides = slides.length;

     // Atualiza o índice do slide atual, somando ou subtraindo com base na direção fornecida.
    currentIndex += direction;

     // Verifica se o índice ficou menor que 0 (ou seja, clicou "anterior" no primeiro slide).
    // Se isso acontecer, define o índice para o último slide (criando um loop para o final).
    if (currentIndex < 0) {
        currentIndex = totalSlides - 1;
        // Verifica se o índice ultrapassou o número total de slides (ou seja, clicou "próximo" no último slide).
        // Se isso acontecer, redefine o índice para 0, voltando ao primeiro slide.
    } else if (currentIndex >= totalSlides) {
        currentIndex = 0;
    }

    // Calcula o deslocamento que o contêiner de slides precisa fazer para mostrar o slide atual.
    // O valor é o índice do slide atual multiplicado por -100%, para mover para a esquerda.
    const offset = -currentIndex * 100;
    // Aplica o deslocamento ao contêiner '.slides' usando a propriedade transform.
    // Isso move o carrossel horizontalmente para o slide correspondente.
    document.querySelector('.slides').style.transform = `translateX(${offset}%)`;
}