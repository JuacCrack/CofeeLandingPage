function changeBackground() {
  const images = [
    "frontend/img/bg1.jpg",
    "frontend/img/bg2.jpg",
    "frontend/img/bg3.jpg"
  ];

  let currentIndex = 0;
  const head = document.querySelector(".head");
  
  const isHeadVisible = () => {
    const bounding = head.getBoundingClientRect();
    return (
      bounding.top >= 0 &&
      bounding.left >= 0 &&
      bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  };

  const intervalId = setInterval(() => {
    if (isHeadVisible()) {
      currentIndex = (currentIndex + 1) % images.length;
      head.style.backgroundImage = `url(${images[currentIndex]})`;
    }
  }, 8000);

  return intervalId;
}

// Ejecutar la función changeBackground() solo cuando el elemento .head está visible en la ventana
const head = document.querySelector('.head');
const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      changeBackground();
    } else {
      clearInterval(changeBackground());
    }
  });
}, { threshold: 0 });

observer.observe(head);


window.addEventListener("load", changeBackground);

$('.carousel').slick({
  autoplay: true,
  autoplaySpeed: 8000,
  arrows: false,
  dots: true
});

window.addEventListener('hashchange', function() {
  var popupContainer = document.querySelector('.popup-container');
  var isTarget = location.hash.startsWith('#productos_categoria_');

  document.body.style.overflow = isTarget ? 'hidden' : 'auto';
});

$(document).ready(function() {
  // Selector de las etiquetas a utilizar
  $('a[href="#menu"], a[href="#nosotros"]').click(function(event) {
    var target = $(this.getAttribute('href'));
    if( target.length ) {
      event.preventDefault();
      $('html, body').stop().animate({
        scrollTop: target.offset().top
      }, 1000);
    }
  });
});



