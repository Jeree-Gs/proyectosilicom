<section class="agenda">
    <h2 class="eventos__heading">Cámaras</h2>
    <p class="speakers__descripcion">Conoce nuestros Productos de Silicom</p>

    <div class="eventos">
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($tiendas as $tienda) { ?>         
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
    <p class="speakers__descripcion">Conoce nuestros Productos de Silicom</p>

    <div class="eventos">
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($tiendas as $tienda) { ?>         
                     <?php include __DIR__ . '../../templates/evento.php'; ?>    
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>



<h2 class="speakers__heading">¿Dónde nos Ubicamos?</h2>
    <div id="mapa" class="mapa"></div>

<section class="resumen">
    <div class="resumen__grid">
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto">Ofrecemos una amplia gama de productos de seguridad, desde cámaras hasta sistemas de alarma, con un total de </p> <p class="resumen__texto resumen__texto--numero"><?php echo $tiendas_total; ?><p><p class="resumen__texto"> artículos en stock.</p>
        </div>

    </div>
</section>

