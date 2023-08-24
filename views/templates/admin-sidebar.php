<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?>  ">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>
        </a>

        <a href="/admin/clientes" class="dashboard__enlace <?php echo pagina_actual('/clientes') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-user dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Clientes
            </span>
        </a>

        <a href="/admin/almacen" class="dashboard__enlace <?php echo pagina_actual('/almacen') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-box dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Almacen
            </span>
        </a>

       <!-- <a href="/admin/categorias" class="dashboard__enlace <?php // echo pagina_actual('/categorias') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-layer-group"></i>
            <span class="dashboard__menu-texto">
                Categorías
            </span>
        </a> -->

        <a href="/admin/proveedores" class="dashboard__enlace <?php echo pagina_actual('/proveedores') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-truck-fast"></i>
            <span class="dashboard__menu-texto">
                Proovedores
            </span>
        </a>

        <a href="/admin/ventas" class="dashboard__enlace <?php echo pagina_actual('/ventas') ? 'dashboard__enlace--actual' : ''; ?> ">
        <i class="fa-solid fa-shop"></i>
            <span class="dashboard__menu-texto">
                Ventas
            </span>
        </a>

        <a href="/admin/tiendas" class="dashboard__enlace <?php echo pagina_actual('/tiendas') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-store"></i>
            <span class="dashboard__menu-texto">
                Tienda
            </span>
        </a>
    </nav>
</aside>