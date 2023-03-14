<?php        
  error_reporting(0); 
  include ("backend/php/db.php");
  $categorias = "SELECT * FROM categorias";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffee Break</title>
    <link rel="stylesheet" href="frontend/styles/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">

  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="#menu">Menú</a></li>
          <li><a href="#nosotros"> Nosotros</a></li>
          <li><a href="#contacto">Contacto</a></li>
        </ul>
      </nav>
      <h1>Coffee Break</h1>
      <p>La mejor cafetería de la ciudad.</p>
    </header>

    <main>

      <h2 id="menu">Menú</h2>

      <div class="menu-container">
      
          <?php 
            $items = mysqli_query($conexion, $categorias);
            while ($rowc = mysqli_fetch_assoc ($items)) {
            // Obtener la imagen en formato base64
            $imagen_base64c = base64_encode($rowc['image_categoria']);
            // Generar el código de fondo CSS con la imagen base64
            $bg_bdc = "background-image: url('data:image/jpeg;base64, " . $imagen_base64c . "');";
          ?>

       <div class="menu-item" id="<?php echo $rowc ["id"]; ?>" style="<?php echo $bg_bdc; ?>">
        <a id="afull" href="#popup-<?php echo $rowc ["id"]; ?>"><?php echo $rowc ["nombre"]; ?></a>
       </div>

        <div class="popup-container" id="popup-<?php echo $rowc["id"]; ?>">
          <div class="popup">

            <a class="cerrar" href="#menu">❌</a>

            <?php
              $productos = "SELECT * FROM productos WHERE id_categoria = {$rowc['id']}";
              $productos_items = mysqli_query($conexion, $productos);
              while ($rowp = mysqli_fetch_assoc($productos_items)) {
              // Obtener la imagen en formato base64
              $imagen_base64p = base64_encode($rowp['imagen']);
              // Generar el código de fondo CSS con la imagen base64
              $bg_bdp = "background-image: url('data:image/jpeg;base64, " . $imagen_base64p . "');";
            ?>

              <h1><?php echo $rowp["nombre"]; ?></h1>
              <p><?php echo $rowp["descripcion"]; ?></p>
              <img src="data:image/jpeg;base64, <?php echo $imagen_base64p; ?>" alt="<?php echo $rowp["nombre"]; ?>">

            <?php } ?>

          </div>

        </div>

       <?php } ?>

      </div>
            
            <section class="about-us" id="nosotros">
              <h2 id="h2">Sobre Nosotros</h2>
              <p>Coffee Break es una acogedora cafetería ubicada en el corazón del centro de la ciudad. Fundada en 1995, Coffee Break comenzó como un pequeño negocio familiar que ofrecía café recién hecho y pasteles horneados en casa. Con el tiempo, la cafetería se ha expandido y ahora es un destino popular para aquellos que buscan un lugar tranquilo para disfrutar de una buena taza de café.

                  La decoración de la cafetería es un reflejo de su ambiente acogedor y relajado. Los muebles son cómodos y están dispuestos de manera que los clientes puedan tener conversaciones tranquilas o trabajar en sus proyectos en un ambiente tranquilo. Las paredes están decoradas con arte local y fotografías históricas de la ciudad.
                  
                  El menú de Coffee Break cuenta con una amplia variedad de cafés, desde los clásicos lattes y cappuccinos hasta bebidas más innovadoras como el café con especias. También ofrecen una selección de tés, bebidas frías y una variedad de pasteles, galletas y bocadillos para satisfacer cualquier antojo.
                  
                  Además de ser un lugar para disfrutar de una buena taza de café, Coffee Break también se ha convertido en un lugar popular para reuniones de negocios informales, citas y encuentros entre amigos. La cafetería también organiza eventos regulares, como noches de música en vivo y catas de café para que los clientes puedan aprender más sobre el mundo del café.
                  
                  En resumen, Coffee Break es una cafetería con una rica historia y un ambiente relajado que ofrece una excelente selección de bebidas y alimentos para satisfacer cualquier antojo. Es un lugar perfecto para disfrutar de un descanso del ajetreo de la ciudad y relajarse con amigos o colegas.</p>
            </section>
            <section class="contact" id="contacto">
              <h2 id="h2">Dejanos tu opinión</h2>
              <form>
                <input type="text" name="fullname" placeholder="Nombre Completo" />
                <textarea placeholder="Mensaje" name="msj"></textarea>
                <button>Enviar</button>
              </form>
            </section>
    </main>

    <footer>
      <p>© 2023 Coffee Break</p>
    </footer>

 

    <script src="backend/scripts/script.js"></script>
    
  </body>
</html>
