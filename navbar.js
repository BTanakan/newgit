let mainNav = document.getElementById('js-menu');
let navbarToggle = document.getElementById('js-nav-toggle');

navbarToggle.addEventListener("click", function() {
    mainNav.classList.toggle('active');
});