'use strict';

/* Toggle de navegação (Menu Responsivo) */

// Seleção dos elementos necessários para a navegação
const overlay = document.querySelector("[data-overlay]"); // Área de fundo quando o menu é aberto
const navOpenBtn = document.querySelector("[data-nav-open-btn]"); // Botão para abrir o menu
const navbar = document.querySelector("[data-navbar]"); // Menu de navegação
const navCloseBtn = document.querySelector("[data-nav-close-btn]"); // Botão para fechar o menu

// Agrupando os elementos que podem disparar o toggle (abertura/fechamento do menu)
const navElems = [overlay, navOpenBtn, navCloseBtn];

// Adicionando evento de clique em cada elemento para alternar a classe "active"
for (let i = 0; i < navElems.length; i++) {
  navElems[i].addEventListener("click", function () {
    navbar.classList.toggle("active");  // Alterna a visibilidade do menu
    overlay.classList.toggle("active"); // Alterna a visibilidade do overlay
  });
}

/* Ação ao rolar a página (Scroll) */

// Seleção dos elementos necessários para o cabeçalho e o botão de voltar ao topo
const header = document.querySelector("[data-header]"); // Cabeçalho da página
const goTopBtn = document.querySelector("[data-go-top]"); // Botão de voltar ao topo

// Adicionando evento de rolagem (scroll) da página
window.addEventListener("scroll", function () {
  if (window.scrollY >= 80) { // Se a rolagem for maior ou igual a 80px
    header.classList.add("active"); // Torna o cabeçalho fixo e aplica estilos
    goTopBtn.classList.add("active"); // Exibe o botão de voltar ao topo
  } else {
    header.classList.remove("active"); // Remove o estilo do cabeçalho fixo
    goTopBtn.classList.remove("active"); // Oculta o botão de voltar ao topo
  }
});