<main class="auth" id="miRegistro">
    <h2 class="auth__heading"> <?php echo $titulo; ?> </h2>
    <p class="auth__texto">Registrate en Silicom</p>

    <?php
        require_once __DIR__ . '/../templates/alertas.php'
    ?>

    <form method="POST" action="/registro" class="formulario">
         <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input 
                oninput="this.value = this.value.replace(/[^a-zA-Z]/,'')" 
                type="text" 
                class="formulario__input"
                placeholder="Tu Nombre"
                id="nombre"
                name="nombre"
                value="<?php echo $usuario->nombre; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Primer Apellido</label>
            <input 
                oninput="this.value = this.value.replace(/[^a-zA-Z]/,'')" 
                type="text" 
                class="formulario__input"
                placeholder="Tu Apellido"
                id="apellido"
                name="apellido"
                value="<?php echo $usuario->apellido; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="apellido2" class="formulario__label">Segundo Apellido (opcional)</label>
            <input 
                oninput="this.value = this.value.replace(/[^a-zA-Z]/,'')" 
                type="text" 
                class="formulario__input"
                placeholder="Tu Segundo Apellido"
                id="apellido2"
                name="apellido2"
                value="<?php echo $usuario->apellido2; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="direccion" class="formulario__label">Dirección</label>
            <input 
                oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')" 
                type="text" 
                class="formulario__input"
                placeholder="Tu Dirección Ej. (Av D'Orbigny N 1629 Entre Almagro y Pizarro)"
                id="direccion"
                name="direccion"
                value="<?php echo $usuario->direccion; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="telefono" class="formulario__label">Teléfono</label>
            <input 
                oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')" 
                type="text" 
                class="formulario__input"
                placeholder="Tu Número de Teléfono"
                id="telefono"
                name="telefono"
                value="<?php echo $usuario->telefono; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input 
                type="email" 
                class="formulario__input"
                placeholder="Tu Email"
                id="email"
                name="email"
                value="<?php echo $usuario->email; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="password" class="formulario__label">Contraseña</label>
            <input 
                type="password" 
                class="formulario__input"
                placeholder="Tu Contraseña"
                id="password"
                name="password"
            >
        </div>

        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Repetir Contraseña</label>
            <input 
                type="password" 
                class="formulario__input"
                placeholder="Repetir Contraseña"
                id="password2"
                name="password2"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Crear Cuenta">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Iniciar sesión</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu Constraseña?</a>
    </div>

</main>

<script>
document.getElementById('registro').addEventListener('click', function(event) {
  // Previene la acción predeterminada del enlace (navegar a la URL externa)
  event.preventDefault();

  // Realiza una acción específica, como desplazarse a un elemento con un atributo 'id'
  var destino = document.getElementById('miRegistro');
  if (destino) {
    destino.scrollIntoView({ behavior: 'smooth' });
  }
});
</script>