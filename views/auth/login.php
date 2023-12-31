<main class="auth" id="miLogin">
    <h2 class="auth__heading"> <?php echo $titulo; ?> </h2>
    <p class="auth__texto">Inicia sesión en Silicom</p>

    <?php
        require_once __DIR__ . '/../templates/alertas.php'
    ?>

    <form method="POST" action="/login" class="formulario">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input 
                type="email" 
                class="formulario__input"
                placeholder="Tu Email"
                id="email"
                name="email"
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

        <input type="submit" class="formulario__submit" value="Iniciar Sesión">
    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">¿Aún no tienes una cuenta? Crear una</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu Constraseña?</a>
    </div>

</main>

<script>
document.getElementById('login').addEventListener('click', function(event) {
  // Previene la acción predeterminada del enlace (navegar a la URL externa)
  event.preventDefault();

  // Realiza una acción específica, como desplazarse a un elemento con un atributo 'id'
  var destino = document.getElementById('miLogin');
  if (destino) {
    destino.scrollIntoView({ behavior: 'smooth' });
  }
});


</script>