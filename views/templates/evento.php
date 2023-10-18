<div class="evento  swiper-slide speaker">
    <div class="">
            <picture>
                <source srcset="img/tiendas/<?php echo $tienda->imagen; ?>.webp" type="image/webp">
                <source srcset="img/tiendas/<?php echo $tienda->imagen; ?>.png" type="image/png">
                <img class="speaker__imagen" loading="lazy" width="200" height="300" src="img/tiendas/<?php echo $tienda->imagen; ?>.png" alt="Imagen Producto">
            </picture>
            <h4 class="speaker__nombre"><?php echo $tienda->nombre; ?></h4>
            <p class="speaker__precio"> <?php echo $tienda->precio.'<sup>00</sup>' . ' ' . "Bs"; ?></p>
        <div class="evento__autor-info">
            <ul class="speaker__listado-skills">
                    <?php 
                        $tags = explode(',', $tienda->tags);
                            foreach($tags as $tag) { 
                    ?>
                         <li class="speaker__skill"><?php echo $tag; ?></li>
                    <?php } ?>
            </ul>
            <a href="/tienda?id=<?php echo $tienda->id; ?>" class="ver__boton">
                Ver Producto
            </a>
        </div>
    </div>
</div>