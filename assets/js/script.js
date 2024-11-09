'use strict';

/* Toggle de navegação (Menu Responsivo) */

// Seleção dos elementos necessários para a navegação
const overlay = document.querySelector("[data-overlay]"); // Área de fundo quando o menu é aberto
const navOpenBtn = document.querySelector("[data-nav-open-btn]"); // Botão para abrir o menu
const navbar = document.querySelector("[data-navbar]"); // Menu de navegação
const navCloseBtn = document.querySelector("[data-nav-close-btn]"); // Botão para fechar o menu

// Verifica se os elementos existem antes de adicionar o evento de clique
if (overlay && navOpenBtn && navbar && navCloseBtn) {
  const navElems = [overlay, navOpenBtn, navCloseBtn];

  // Adicionando evento de clique para alternar a classe "active"
  navElems.forEach((elem) => {
    elem.addEventListener("click", () => {
      navbar.classList.toggle("active");  // Alterna a visibilidade do menu
      overlay.classList.toggle("active"); // Alterna a visibilidade do overlay
    });
  });
}

/* Ação ao rolar a página (Scroll) */

// Seleção dos elementos necessários para o cabeçalho e o botão de voltar ao topo
const header = document.querySelector("[data-header]"); // Cabeçalho da página
const goTopBtn = document.querySelector("[data-go-top]"); // Botão de voltar ao topo

// Verifica se os elementos existem antes de adicionar o evento de scroll
if (header && goTopBtn) {
  // Adicionando evento de rolagem (scroll) da página
  window.addEventListener("scroll", () => {
    if (window.scrollY >= 80) { // Se a rolagem for maior ou igual a 80px
      header.classList.add("active"); // Torna o cabeçalho fixo e aplica estilos
      goTopBtn.classList.add("active"); // Exibe o botão de voltar ao topo
    } else {
      header.classList.remove("active"); // Remove o estilo do cabeçalho fixo
      goTopBtn.classList.remove("active"); // Oculta o botão de voltar ao topo
    }
  });
}

/* Lógica de Filtro de Produtos */

// Seleção dos botões de filtro
const filterBtns = document.querySelectorAll('.filter-btn');

// Função para filtrar produtos
function filterProducts() {
  const category = this.textContent.toLowerCase(); // Obtém o nome da categoria do botão clicado
  
  // Aqui você pode adicionar lógica para filtrar produtos com base na categoria selecionada
  // Exemplo: mostrar/ocultar produtos com a classe correspondente ao nome da categoria
  document.querySelectorAll('.product-item').forEach(item => {
    if (category === 'all' || item.classList.contains(category)) {
      item.style.display = 'block'; // Exibe o item
    } else {
      item.style.display = 'none'; // Oculta o item
    }
  });
  
  // Remove a classe 'active' de todos os botões e adiciona no botão clicado
  filterBtns.forEach(btn => btn.classList.remove('active'));
  this.classList.add('active');
}

// Adiciona evento de clique para todos os botões de filtro
filterBtns.forEach(btn => {
  btn.addEventListener('click', filterProducts);
});