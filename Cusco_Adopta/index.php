<?php 
session_start();
include '../Modelo/database.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cusco Adopta - Encuentra tu compañero perfecto</title>

  <!-- Fuentes e iconos -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <!-- Enlace al CSS externo -->
  <link rel="stylesheet" href="Vista/estilos/estilos.css" />
</head>
<body>

<header class="cabecera">
  <h1>
    <img src="img/logo_cusco_adopta.png" alt="Logo Cusco Adopta" />
    Cusco Adopta
  </h1>
  <nav class="navegacion">
    <ul>
      <li><a href="#perros">Perros</a></li>
      <li><a href="#gatos">Gatos</a></li>
      <li><a href="#otros">Otros Animales</a></li>
      <li><a href="#" id="abrirContacto">Contáctanos</a></li>
      <?php
        $total_solicitudes = 0;
        if (isset($_SESSION['solicitudes_adopcion'])) {
            $total_solicitudes = count($_SESSION['solicitudes_adopcion']);
        }
      ?>
      <li>
        <a href="solicitudes_adopcion.php">
          <i class="bi bi-heart-fill"></i> Mis Solicitudes (<span id="contador-solicitudes"><?php echo $total_solicitudes; ?></span>)
        </a>
      </li>
    </ul>
  </nav>
</header>

<div class="contenedor-principal">
  <div class="envoltorio-contenido">
    <div class="container-fluid">
      <div class="row">

        <!-- Aside izquierdo - SWIPER CONSEJOS -->
        <aside class="col-lg-2 d-none d-lg-block aside-fijo">
          <h5 class="text-center mb-4">💡 Consejos de Cuidado</h5>
          <div class="swiper swiper-left">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="tarjeta-consejo">
                  <h6>Alimentación Balanceada</h6>
                  <p>Proporciona alimento de calidad según la edad y tamaño de tu mascota</p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="tarjeta-consejo">
                  <h6>Visitas al Veterinario</h6>
                  <p>Revisiones periódicas mantienen a tu mascota saludable</p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="tarjeta-consejo">
                  <h6>Ejercicio Diario</h6>
                  <p>Paseos y juego son esenciales para su bienestar</p>
                </div>
              </div>
            </div>
            <div class="boton-swiper-prev boton-swiper-prev-izq" aria-label="Anterior"></div>
            <div class="boton-swiper-next boton-swiper-next-izq" aria-label="Siguiente"></div>
          </div>
        </aside>

        <!-- Contenido principal -->
        <main class="col-lg-8">

          <!-- Banner de bienvenida -->
          <section class="banner-bienvenida">
            <div class="contenido-banner">
              <h2>🐾 ¡Bienvenido a Cusco Adopta!</h2>
              <p>Conectamos animales rescatados con familias amorosas en Cusco</p>
              <div class="estadisticas-banner">
                <div class="estadistica">
                  <span class="numero">150+</span>
                  <span class="etiqueta">Adopciones exitosas</span>
                </div>
                <div class="estadistica">
                  <span class="numero">50+</span>
                  <span class="etiqueta">Animales disponibles</span>
                </div>
                <div class="estadistica">
                  <span class="numero">3</span>
                  <span class="etiqueta">Años rescatando</span>
                </div>
              </div>
            </div>
          </section>

          <!-- Sección Perros -->
          <section id="perros" class="contenedor">
            <h2 class="seccion">🐕 Perros en Busca de Hogar</h2>
            <p class="texto">Nuestros amigos caninos esperan una familia que les brinde amor y cuidado. Todos están vacunados, desparasitados y esterilizados.</p>
            <div class="grilla">
              <?php
              try {
                  $perros = $db->query("SELECT * FROM animales WHERE tipo = 'perro' AND disponible = 1")->fetchAll();
                  foreach($perros as $animal): 
              ?>
                  <div class="tarjeta tarjeta-animal">
                    <div class="contenedor-img-animal">
                      <img src="img/animales/<?php echo $animal['imagen']; ?>" alt="<?php echo $animal['nombre']; ?>" />
                      <span class="insignia-tipo perro">Perro</span>
                    </div>
                    <h3><?php echo $animal['nombre']; ?></h3>
                    <div class="informacion-animal">
                      <p><i class="bi bi-calendar"></i> <strong>Edad:</strong> <?php echo $animal['edad']; ?> años</p>
                      <p><i class="bi bi-gender-ambiguous"></i> <strong>Sexo:</strong> <?php echo ucfirst($animal['sexo']); ?></p>
                      <p><i class="bi bi-rulers"></i> <strong>Tamaño:</strong> <?php echo ucfirst($animal['tamanio']); ?></p>
                      <p><i class="bi bi-heart-pulse"></i> <strong>Raza:</strong> <?php echo $animal['raza']; ?></p>
                    </div>
                    <p class="descripcion"><small><?php echo $animal['descripcion']; ?></small></p>
                    <div class="estado-salud">
                      <?php if($animal['vacunado']): ?><span class="insignia-salud vacunado"><i class="bi bi-shield-check"></i> Vacunado</span><?php endif; ?>
                      <?php if($animal['esterilizado']): ?><span class="insignia-salud esterilizado"><i class="bi bi-scissors"></i> Esterilizado</span><?php endif; ?>
                      <?php if($animal['desparasitado']): ?><span class="insignia-salud desparasitado"><i class="bi bi-bug"></i> Desparasitado</span><?php endif; ?>
                    </div>
                    <form method="POST" action="solicitudes_adopcion.php" style="margin-top: 10px;">
                      <input type="hidden" name="animal_id" value="<?php echo $animal['id']; ?>" />
                      <button type="submit" name="agregar_solicitud" class="boton-adoptar">
                        <i class="bi bi-heart-fill"></i> Solicitar Adopción
                      </button>
                    </form>
                  </div>
              <?php 
                  endforeach; 
              } catch(Exception $e) {
                  echo "<div style='grid-column: 1 / -1; text-align: center; padding: 20px; background: #ffeaa7; border-radius: 10px;'>
                          <p>⚠️ Temporalmente no podemos mostrar los perros disponibles.</p>
                        </div>";
              }
              ?>
            </div>
          </section>

          <!-- Sección Gatos -->
          <section id="gatos" class="contenedor">
            <h2 class="seccion">🐈 Gatos Esperando Familia</h2>
            <p class="texto">Nuestros amigos felinos buscan un hogar tranquilo y amoroso. Son independientes pero llenos de cariño.</p>
            <div class="grilla">
              <?php
              try {
                  $gatos = $db->query("SELECT * FROM animales WHERE tipo = 'gato' AND disponible = 1")->fetchAll();
                  foreach($gatos as $animal): 
              ?>
                  <div class="tarjeta tarjeta-animal">
                    <div class="contenedor-img-animal">
                      <img src="img/animales/<?php echo $animal['imagen']; ?>" alt="<?php echo $animal['nombre']; ?>" />
                      <span class="insignia-tipo gato">Gato</span>
                    </div>
                    <h3><?php echo $animal['nombre']; ?></h3>
                    <div class="informacion-animal">
                      <p><i class="bi bi-calendar"></i> <strong>Edad:</strong> <?php echo $animal['edad']; ?> años</p>
                      <p><i class="bi bi-gender-ambiguous"></i> <strong>Sexo:</strong> <?php echo ucfirst($animal['sexo']); ?></p>
                      <p><i class="bi bi-rulers"></i> <strong>Tamaño:</strong> <?php echo ucfirst($animal['tamanio']); ?></p>
                      <p><i class="bi bi-heart-pulse"></i> <strong>Raza:</strong> <?php echo $animal['raza']; ?></p>
                    </div>
                    <p class="descripcion"><small><?php echo $animal['descripcion']; ?></small></p>
                    <div class="estado-salud">
                      <?php if($animal['vacunado']): ?><span class="insignia-salud vacunado"><i class="bi bi-shield-check"></i> Vacunado</span><?php endif; ?>
                      <?php if($animal['esterilizado']): ?><span class="insignia-salud esterilizado"><i class="bi bi-scissors"></i> Esterilizado</span><?php endif; ?>
                      <?php if($animal['desparasitado']): ?><span class="insignia-salud desparasitado"><i class="bi bi-bug"></i> Desparasitado</span><?php endif; ?>
                    </div>
                    <form method="POST" action="solicitudes_adopcion.php" style="margin-top: 10px;">
                      <input type="hidden" name="animal_id" value="<?php echo $animal['id']; ?>" />
                      <button type="submit" name="agregar_solicitud" class="boton-adoptar">
                        <i class="bi bi-heart-fill"></i> Solicitar Adopción
                      </button>
                    </form>
                  </div>
              <?php 
                  endforeach; 
              } catch(Exception $e) {
                  echo "<div style='grid-column: 1 / -1; text-align: center; padding: 20px; background: #ffeaa7; border-radius: 10px;'>
                          <p>⚠️ Temporalmente no podemos mostrar los gatos disponibles.</p>
                        </div>";
              }
              ?>
            </div>
          </section>

          <!-- Sección Otros Animales -->
          <section id="otros" class="contenedor">
            <h2 class="seccion">🐇 Otros Animales</h2>
            <p class="texto">También tenemos otros animales especiales que buscan un hogar responsable.</p>
            <div class="grilla">
              <?php
              try {
                  $otros = $db->query("SELECT * FROM animales WHERE tipo NOT IN ('perro', 'gato') AND disponible = 1")->fetchAll();
                  foreach($otros as $animal): 
              ?>
                  <div class="tarjeta tarjeta-animal">
                    <div class="contenedor-img-animal">
                      <img src="img/animales/<?php echo $animal['imagen']; ?>" alt="<?php echo $animal['nombre']; ?>" />
                      <span class="insignia-tipo otro"><?php echo ucfirst($animal['tipo']); ?></span>
                    </div>
                    <h3><?php echo $animal['nombre']; ?></h3>
                    <div class="informacion-animal">
                      <p><i class="bi bi-calendar"></i> <strong>Edad:</strong> <?php echo $animal['edad']; ?> años</p>
                      <p><i class="bi bi-gender-ambiguous"></i> <strong>Sexo:</strong> <?php echo ucfirst($animal['sexo']); ?></p>
                      <p><i class="bi bi-rulers"></i> <strong>Tamaño:</strong> <?php echo ucfirst($animal['tamanio']); ?></p>
                    </div>
                    <p class="descripcion"><small><?php echo $animal['descripcion']; ?></small></p>
                    <div class="estado-salud">
                      <?php if($animal['vacunado']): ?><span class="insignia-salud vacunado"><i class="bi bi-shield-check"></i> Vacunado</span><?php endif; ?>
                      <?php if($animal['desparasitado']): ?><span class="insignia-salud desparasitado"><i class="bi bi-bug"></i> Desparasitado</span><?php endif; ?>
                    </div>
                    <form method="POST" action="solicitudes_adopcion.php" style="margin-top: 10px;">
                      <input type="hidden" name="animal_id" value="<?php echo $animal['id']; ?>" />
                      <button type="submit" name="agregar_solicitud" class="boton-adoptar">
                        <i class="bi bi-heart-fill"></i> Solicitar Adopción
                      </button>
                    </form>
                  </div>
              <?php 
                  endforeach; 
              } catch(Exception $e) {
                  echo "<div style='grid-column: 1 / -1; text-align: center; padding: 20px; background: #ffeaa7; border-radius: 10px;'>
                          <p>⚠️ Temporalmente no podemos mostrar otros animales disponibles.</p>
                        </div>";
              }
              ?>
            </div>
          </section>

          <!-- Sección Proceso de Adopción -->
          <section id="proceso" class="contenedor">
            <h2 class="seccion">📋 Nuestro Proceso de Adopción</h2>
            <div class="pasos-proceso">
              <div class="paso">
                <div class="icono-paso">1</div>
                <h4>Conoce al Animal</h4>
                <p>Revisa los perfiles y elige a tu compañero ideal</p>
              </div>
              <div class="paso">
                <div class="icono-paso">2</div>
                <h4>Solicita la Adopción</h4>
                <p>Completa el formulario con tus datos</p>
              </div>
              <div class="paso">
                <div class="icono-paso">3</div>
                <h4>Entrevista</h4>
                <p>Coordinamos una entrevista para conocerte</p>
              </div>
              <div class="paso">
                <div class="icono-paso">4</div>
                <h4>Hogar Definitivo</h4>
                <p>¡Lleva a tu nuevo amigo a casa!</p>
              </div>
            </div>
          </section>

        </main>

        <!-- Aside derecho - SWIPER HISTORIAS -->
        <aside class="col-lg-2 d-none d-lg-block aside-fijo">
          <h5 class="text-center mb-4">🌟 Historias de Éxito</h5>
          <div class="swiper swiper-right">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="tarjeta-historia">
                  <img src="img/historias/luna_familia.jpg" alt="Luna con su familia" />
                  <div class="contenido-historia">
                    <h6>Luna</h6>
                    <p>Adoptada hace 6 meses. ¡Ahora es la reina de la casa!</p>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="tarjeta-historia">
                  <img src="img/historias/max_jugando.jpg" alt="Max jugando" />
                  <div class="contenido-historia">
                    <h6>Max</h6>
                    <p>Lleno de energía y amor en su nuevo hogar</p>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="tarjeta-historia">
                  <img src="img/historias/kitty_descanso.jpg" alt="Kitty descansando" />
                  <div class="contenido-historia">
                    <h6>Kitty</h6>
                    <p>Encontró el sofá perfecto para sus siestas</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="boton-swiper-prev boton-swiper-prev-der" aria-label="Anterior"></div>
            <div class="boton-swiper-next boton-swiper-next-der" aria-label="Siguiente"></div>
          </div>
        </aside>

      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="footer-content">
    <div class="footer-section">
      <h4>Cusco Adopta</h4>
      <p>Rescatando y encontrando hogares para animales en Cusco desde 2022</p>
    </div>
    <div class="footer-section">
      <h4>Contacto</h4>
      <p><i class="bi bi-geo-alt"></i> Cusco, Perú</p>
      <p><i class="bi bi-envelope"></i> info@cuscoadopta.com</p>
      <p><i class="bi bi-telephone"></i> +51 984 123 456</p>
    </div>
    <div class="footer-section">
      <h4>Síguenos</h4>
      <div class="redes">
        <a href="https://www.facebook.com/CuscoAdopta" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/cuscoadopta" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://www.tiktok.com/@cuscoadopta" target="_blank"><i class="bi bi-tiktok"></i></a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2025 Cusco Adopta. Todos los derechos reservados. | Hecho con ❤️ para los animales de Cusco</p>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>

<!-- Modal de Contacto -->
<div id="modalContacto" class="modal">
  <div class="tarjeta-modal">
    <button id="cerrarModal" class="cerrar">&times;</button>
    <div class="encabezado-modal">
      <img src="img/logo_cusco_adopta.png" alt="Logo Cusco Adopta" class="logo-modal" />
      <div class="header-text">
        <h2>Contáctanos</h2>
        <p>¿Tienes preguntas sobre adopción o quieres ayudar? ¡Escríbenos! 🐾</p>
      </div>
    </div>

    <form method="post" action="../Controlador/procesar_contacto.php" class="formulario-contacto">
      <div class="campo">
        <label for="nombre">Nombre Completo *</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" required />
      </div>

      <div class="campo">
        <label for="email">Correo electrónico *</label>
        <input type="email" id="email" name="email" placeholder="ejemplo@gmail.com" required />
      </div>

      <div class="campo">
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" placeholder="+51 984 123 456" />
      </div>

      <div class="campo">
        <label for="tipo_consulta">Tipo de consulta *</label>
        <select id="tipo_consulta" name="tipo_consulta" required>
          <option value="">Selecciona una opción</option>
          <option value="adopcion">Información sobre adopción</option>
          <option value="donacion">Donaciones</option>
          <option value="voluntariado">Voluntariado</option>
          <option value="reportar">Reportar animal en situación de calle</option>
          <option value="otro">Otro</option>
        </select>
      </div>

      <div class="campo">
        <label for="mensaje">Mensaje *</label>
        <textarea id="mensaje" name="mensaje" rows="4" placeholder="Escribe tu mensaje aquí..." required></textarea>
      </div>

      <button type="submit" class="btn-enviar">
        <i class="bi bi-send"></i> Enviar mensaje
      </button>
    </form>
  </div>
</div>

<script>
const modal = document.getElementById('modalContacto');
const abrir = document.getElementById('abrirContacto');
const cerrar = document.getElementById('cerrarModal');

abrir.onclick = () => (modal.style.display = 'flex');
cerrar.onclick = () => (modal.style.display = 'none');
window.onclick = e => {
  if (e.target === modal) modal.style.display = 'none';
};
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>
