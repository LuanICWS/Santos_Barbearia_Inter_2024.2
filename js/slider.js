let currentIndex = 0;

// Função para mudar o slide com base na direção passada
function changeSlide(direction) {
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    currentIndex += direction;

    if (currentIndex < 0) {
        currentIndex = totalSlides - 1;
    } else if (currentIndex >= totalSlides) {
        currentIndex = 0;
    }

    const offset = -currentIndex * 100;
    document.querySelector('.slides').style.transform = `translateX(${offset}%)`;
}
// Função para inicializar o carrossel
function initCarousel(interval = 5000, direction = 1) {
    const slides = document.querySelectorAll('.slide');
    const slidesContainer = document.querySelector('.slides');
    let currentIndex = 0;
  
    function changeSlide(direction) {
      currentIndex += direction;
      if (currentIndex < 0) currentIndex = slides.length - 1;
      if (currentIndex >= slides.length) currentIndex = 0;
      slidesContainer.style.transform = `translateX(${-currentIndex * 100}%)`;
    }
  
    // Função para iniciar a transição automática
    function autoSlide() {
      setInterval(() => {
        changeSlide(direction);
      }, interval);
    }
  
    autoSlide(); // Inicia a transição automaticamente
  
    // Adicione aqui qualquer outro evento ou funcionalidade, como botões de navegação, pausa, etc.
  }
  
  // Chamando a função para inicializar o carrossel
  initCarousel();
