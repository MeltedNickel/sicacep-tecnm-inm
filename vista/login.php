<style>
 .bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}
      
  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
    font-size: 3.5rem;    
  }
}
</style>
<!-- Custom styles for this template -->
<link href="./recursos/css/signin.css" rel="stylesheet">
<div class="text-center">
  <main class="form-signin">
    <form action="controlador/CtrlLogin.php" method="POST">
      <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Bienvenido</h1>
      <div class="form-floating">
        <input type="text" class="form-control" name="usu" id="usu" autofocus>
        <label for="floatingInput">Numero de Empleado</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña">
        <label for="floatingPassword">Contraseña</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesion</button>
      <p class="mt-5 mb-3 text-muted">SICACEP &copy; 2023</p>
  </form>
  </main>
</div>