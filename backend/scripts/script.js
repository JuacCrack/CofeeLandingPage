//CARROUSEL IMG HEADER
const images = [
    'frontend/img/bg1.png',
    'frontend/img/bg2.png',
    'frontend/img/bg3.png',
  ];
  let currentImage = 0;
  document.querySelector('header').style.backgroundImage = `url(${images[currentImage]})`;
  setInterval(() => {
    currentImage = (currentImage + 1) % images.length;
    document.querySelector('header').style.backgroundImage = `url(${images[currentImage]})`;
  }, 10000);
  
//POP UP



