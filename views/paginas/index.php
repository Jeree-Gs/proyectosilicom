<section class="speakers">
    <h2 class="speakers__heading">Productos</h2>
    <p class="speakers__descripcion">Conoce nuestros Productos de Silicom</p>

    <div class="speakers__grid">
        <?php foreach($tiendas as $tienda) { ?>
            <div <?php aos_animacion(); ?> class="speaker">
                <picture>
                    <source srcset="img/tiendas/<?php echo $tienda->imagen; ?>.webp" type="image/webp">
                    <source srcset="img/tiendas/<?php echo $tienda->imagen; ?>.png" type="image/png">
                    <img class="speaker__imagen" loading="lazy" width="200" height="300" src="img/tiendas/<?php echo $tienda->imagen; ?>.png" alt="Imagen Producto">
                </picture>

                <div class="speaker__informacion">
                    <h4 class="speaker__nombre">
                        <?php echo $tienda->nombre; ?>
                    </h4>

                    <p class="speaker__precio">
                        <?php echo $tienda->precio . ' ' . "Bs"; ?>
                    </p>

                    
                    <ul class="speaker__listado-skills">
                        <?php 
                            $tags = explode(',', $tienda->tags);
                            foreach($tags as $tag) { 
                        ?>
                            <li class="speaker__skill"><?php echo $tag; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
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

