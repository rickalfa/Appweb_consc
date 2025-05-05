document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('.nav-link');
    const currentURL = window.location.href;

    navLinks.forEach(link => {
        if (link.href === currentURL) {
            link.classList.add('active');
        }
    });

    const mainContentTitle = document.getElementById('main-content-title');
    const mainContentText = document.getElementById('main-content-text');

    if (currentURL.includes('dashboard.html')) {
        mainContentTitle.textContent = 'Dashboard';
        mainContentText.textContent = 'Bienvenido al Dashboard. Aquí puedes ver un resumen de la información principal.';
    } else if (currentURL.includes('profile.html')) {
        mainContentTitle.textContent = 'Perfil';
        mainContentText.textContent = 'Esta es tu página de perfil. Aquí puedes editar tu información personal.';
    } else if (currentURL.includes('myitems.html')) {
        mainContentTitle.textContent = 'Mis Items';
        mainContentText.textContent = 'Aquí puedes ver y gestionar tus items.';
    } else {
        mainContentTitle.textContent = 'Contenido Principal';
        mainContentText.textContent = 'Esta es la página principal. Navega usando el menú lateral.';
    }
});