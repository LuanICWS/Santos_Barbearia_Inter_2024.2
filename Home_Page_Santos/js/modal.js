function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'block';
  
    // Função para fechar a modal ao clicar no botão de fechar
    const closeButton = modal.querySelector('.close');
    closeButton.onclick = function() {
      modal.style.display = 'none';
    }
  
    // Função para fechar a modal ao clicar fora do conteúdo
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    }
  }
  
  // Seleciona todos os links de serviços que abrem as modais
  const openModalLinks = document.querySelectorAll('.openModal');
  
  // Adiciona o evento de clique para cada link
  openModalLinks.forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault();
      const modalId = this.getAttribute('data-modal');
      openModal(modalId);
    });
  });