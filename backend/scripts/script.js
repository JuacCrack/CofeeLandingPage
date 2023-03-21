function changeBackground() {
  const images = [
    "frontend/img/bg1.jpg",
    "frontend/img/bg2.jpg",
    "frontend/img/bg3.jpg"
    // Agrega aquí tantas imágenes como desees
  ];

  let currentIndex = 0;
  const head = document.querySelector(".head");

  setInterval(() => {
    currentIndex = (currentIndex + 1) % images.length;
    head.style.backgroundImage = `url(${images[currentIndex]})`;
  }, 5000);
}

window.addEventListener("load", changeBackground);
