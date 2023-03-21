<?php 

include ('backend/php/db.php');

?>

<script>

window.addEventListener('hashchange', function() {
  var popupContainer = document.querySelector('.popup-container');
  var isTarget = location.hash.startsWith('#productos_categoria_');

  document.body.style.overflow = isTarget ? 'hidden' : 'auto';
});

</script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="frontend/styles/style.css">
  <title>CofeeBreak</title>
</head>
<body class="aca">

  <div class="head" id="header">

    <div class="box">

      <div class="btnes">

        <a href="index.php" class="btn">Home</a>

        <a href="#menu" class="btn">Menú</a>

        <a href="#nosotros" class="btn">Nosotros</a>

      </div>

      <h1>CofeeBreak</h1>

    </div>

  </div>

  <div class="body">

    <div class="menu" id="menu">

      <h2>MENÚ</h2>

      <div class="menu-container">

        <div class="scroll-menu">

          <?php $categorias = "SELECT * FROM categorias"; $items = mysqli_query($conexion, $categorias);while ($rowc = mysqli_fetch_assoc ($items)) { ?>

          <div class="menu-item" id="categoria_<?php echo $rowc ["id"]; ?>" style="background-image:url(../backend/php/img_comprimida/categorias/<?php echo $rowc ["id"]; ?>bg.jpg);">

            <a href="#productos_categoria_<?php echo $rowc ["id"]; ?>" class="titulo"><h2 class="h2"><?php echo $rowc ["nombre"]; ?></h2></a>

          </div>

          <div class="popup-container" id="productos_categoria_<?php echo $rowc ["id"]; ?>">

            <div class="popup">

             <div class="cerrar"><a href="#menu">X</a></div>

             <div class="scroll-product">

             <?php $productos = "SELECT * FROM productos WHERE id_categoria = {$rowc['id']}"; $productos_items = mysqli_query($conexion, $productos); while ($rowp = mysqli_fetch_assoc($productos_items)) { ?>

              <div class="product-item" id="producto_<?php echo $rowp ["id"]; ?>">

                  <div class="product-image">

                    <div class="image-product" style="background-image:url(../backend/php/img_comprimida/productos/<?php echo $rowp ["id"]; ?>bg.jpg);"></div>

                  </div>

                  <div class="product-details">

                    <h2><?php echo $rowp ["nombre"]; ?></h2>

                    <div class="product-description">

                      <p><?php echo $rowp ["descripcion"]; ?></p>

                    </div>

                    <div class="product-price">

                      <span>$<?php echo $rowp ["precio"]; ?></span>

                    </div>

                  </div>

              </div>

              <?php } ?>

             </div> 

            </div>
        
          </div>

          <?php } ?>

        </div>

      </div>

    </div>

    <div class="nosotros" id="nosotros">

      <div class="informacion">

       <h3 class="h3">Sobre Nosotros</h3>
      
        <div class="scroll-info">

          <p>La cafetería es conocida por su delicioso café y su amplia variedad de bebidas calientes y frías, así como por sus bocadillos y pasteles recién horneados. El ambiente es relajado y acogedor, con una decoración moderna y sencilla que invita a quedarse un rato.

          A lo largo de los años, Coffee Break ha ido evolucionando para adaptarse a las necesidades de sus clientes. Ahora también ofrecen opciones vegetarianas y veganas, y han ampliado su horario para poder atender a los noctámbulos.

          Pero lo que hace que Coffee Break sea realmente especial es su equipo. Los empleados son amables y serviciales, y siempre están dispuestos a ayudar a los clientes a encontrar la bebida o el bocadillo perfecto para su gusto. Son parte de la comunidad y se enorgullecen de formar parte de la historia de la ciudad.

          Si buscas un lugar tranquilo para relajarte y disfrutar de una buena taza de café, no busques más que Coffee Break. Es un lugar que te hará sentir como en casa.</p>

        </div>

      </div>

      <div class="staff">

      <h3 class="h3">Conoce a nuestro personal</h3>

        <div class="carousel">

          <div class="slide">
            <div class="staff-member">

              <div class="staff-img" style="background-image: url();"></div>

              <div class="info">
                <h3>Nombre del Trabajador</h3>
                <h4>Apodo del Trabajador</h4>
                <p>Pequeña descripción del trabajador.</p>
              </div>
              
            </div>
          </div>

        </div>

      </div>

    </div>

  </div>

  <div class="foot"> &copy; 2023 Coffee Break. Todos los derechos reservados. </div>
  
  <script src="backend/scripts/script.js"></script>
</body>
</html>
