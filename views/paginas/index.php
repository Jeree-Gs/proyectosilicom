<div class="dashboard__contenedor-boton margin-boton">
    <!-- POP UP BOTON VER MAS PRODUCTOS -->
<div class="center-container">
    <button class="boton-color" type="button" onclick="togglePopup()">Ver más Productos</button>
</div>
<div class="overlay" id="overlay"></div>
<!--POP-UP-->
<div class="popup-container" id="popup-container">
        <span class="close-btn" onclick="togglePopup()"><i class="fa-solid fa-circle-xmark" style="color: #f40606;"></i></span>
        <h2><i class="fa-solid fa-triangle-exclamation" style="color: #ffbb00;"></i></h2>
        <h4>Para ver más productos, registrese o inicie sesión</h4>
        <p>Selecciona una opción:</p>
        <div class="button-container">
            <a class="popup-button" href="/login">Iniciar sesión</a>
            <a class="popup-button" href="/registro">Registrarse</a>
        </div>
    </div>
</div>

<h2 class="dashboard__heading"> Productos a la Venta </h2>

<p class="speakers__descripcion">Conoce nuestros Productos de Silicom</p>


<section class="agenda">
    <h2 class="eventos__heading">Cámaras</h2>

    <div class="eventos">
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($tiendas['Camaras'] as $tienda) { ?>         
                     <?php include __DIR__ . '../../templates/evento.php'; ?>    
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<section class="agenda">
    <h2 class="eventos__heading">Video Porteros</h2>

    <div class="eventos">
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($tiendas['VideoPorteros'] as $tienda) { ?>         
                     <?php include __DIR__ . '../../templates/evento.php'; ?>    
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<!-- POP UP BOTON VER MAS PRODUCTOS -->
<div class="center-container">
    <button class="boton-index" type="button" onclick="togglePopup()">Ver más Productos</button>
</div>
<div class="overlay" id="overlay"></div>
<!--POP-UP-->
<div class="popup-container" id="popup-container">
        <span class="close-btn" onclick="togglePopup()"><i class="fa-solid fa-circle-xmark" style="color: #f40606;"></i></span>
        <h2><i class="fa-solid fa-triangle-exclamation" style="color: #ffbb00;"></i></h2>
        <h4>Para ver más productos, registrese o inicie sesión</h4>
        <p>Selecciona una opción:</p>
        <div class="button-container">
            <a class="popup-button" href="/login">Iniciar sesión</a>
            <a class="popup-button" href="/registro">Registrarse</a>
        </div>
    </div>



<!-- SECCION DE CANTIDAD DE PRODUCTOS -->
<section class="resumen">
    <div class="resumen__grid">
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto">Ofrecemos una amplia gama de productos de seguridad, desde cámaras hasta sistemas de alarma, con un total de </p> <p class="resumen__texto resumen__texto--numero"><?php echo $tiendas_total; ?><p><p class="resumen__texto"> artículos en stock.</p>
        </div>
    </div>
</section>

<section class="agenda">
    <h2 class="eventos__heading">Video Porteros</h2>

    <div class="eventos">
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($tiendas['VideoPorteros'] as $tienda) { ?>         
                     <?php include __DIR__ . '../../templates/evento.php'; ?>    
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>


<!-- MAPA -->
<h2 class="speakers__heading">¿Dónde nos Ubicamos?</h2>
    <div id="mapa" class="mapa"></div>








<script>
        function togglePopup() {
            var overlay = document.getElementById("overlay");
            var popupContainer = document.getElementById("popup-container");
            overlay.style.display = (overlay.style.display === "none" || overlay.style.display === "") ? "block" : "none";
            popupContainer.style.display = (popupContainer.style.display === "none" || popupContainer.style.display === "") ? "block" : "none";
        }
    </script>
