import './bootstrap';
import "flowbite";
import 'swiper/swiper-bundle.css';
import Swiper from 'swiper/bundle';
import ScrollReveal from 'scrollreveal';
import Alpine from 'alpinejs';
import 'flowbite-datepicker';


window.Alpine = Alpine;

Alpine.start();



document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".mySwiper", {
        loop: true,
        centeredSlides: true, // Centra el slide activo
        slidesPerView: 1, // Asegura que solo un slide esté visible
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    // Animaciones con ScrollReveal
    ScrollReveal().reveal('.reveal', {
        duration: 1000,  // Duración de la animación
        delay: 200,      // Retraso antes de la animación
        reset: false,    // Se ejecuta solo una vez cuando entra en el viewport
        distance: '50px', // Movimiento antes de aparecer
        origin: 'bottom' // Dirección desde la que aparece el contenido
    });
});


