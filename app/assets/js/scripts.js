// altera position da navbar
let navbar = document.querySelector('.navbar');
let imgLogoHeader = document.querySelector('.navbar img');
window.addEventListener('scroll', function() {
    if (this.pageYOffset > 0) {
        navbar.classList.add('position-fixed');
        imgLogoHeader.src = "./assets/imgs/logo_effect.png";
    } else {
        navbar.classList.remove('position-fixed');
        imgLogoHeader.src = "./assets/imgs/logo_site.png";
    }
});
// Pega o ano
document.querySelector('.ano').innerHTML = new Date().getFullYear();


$('.owl-galeria').owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    margin: 10,
    responsive: {
        0: {
            items: 1
        }, 
        768: {
            items: 1
        },
        1300: {
            items: 3
        }
    },
    navText: [
        '<img src="./assets/imgs/prev.png" alt="prev arrow" />', 
        '<img src="./assets/imgs/next.png" alt="next arrow" />'
    ]
});