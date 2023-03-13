// Gerer La side bar

let hamburger = document.querySelector('.hamburger-menu');
let cross = document.querySelector('.cross');
let toggleMenu = document.querySelector('nav');

hamburger.addEventListener('click', () => {
    toggleMenu.className = 'nav-shown';
    hamburger.style.opacity = '0';
});

cross.addEventListener('click', () => {
    toggleMenu.className = 'nav-hidden';
    hamburger.style.opacity = '1';
});