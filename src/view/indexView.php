<!DOCTYPE HTML>
<html lang="es">
  <head>
    <meta charset="utf-8"/>
    <title>CRUD PHP MySQLi POO MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <style>
      input{
        margin-top:5px;
        margin-bottom:5px;
      }
      .right{
        float:right;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">ABM Usuarios</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="#">Usuarios</a>
            <a class="nav-link" href="<?php echo $helper->url("roles","index"); ?>">Roles</a>
          </div>
        </div>
      </div>
    </nav>
    <form action="<?php echo $helper->url("usuarios","crear"); ?>" method="post" class="col-lg-5">
      <h3>Añadir usuario</h3>
      <hr/>
      Nombre: <input type="text" name="nombre" class="form-control"/>
      Apellido: <input type="text" name="apellido" class="form-control"/>
      Domicilio: <input type="text" name="domicilio" class="form-control"/>
      <input type="submit" value="enviar" class="btn btn-success"/>
    </form>
    <div class="col-lg-7">
      <h3>Usuarios</h3>
      <hr/>
    </div>
    <section class="col-lg-7 usuario" style="height:400px;overflow-y:scroll;">
      <?php foreach($allusers as $user) { //recorremos el array de objetos y obtenemos el valor de las propiedades ?>
        <?php echo $user->id; ?> -
        <?php echo $user->nombre; ?> -
        <?php echo $user->apellido; ?> -
        <?php echo $user->domicilio; ?>
        <div class="right">
          <a href="<?php echo $helper->url("usuarios","borrar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-danger">Borrar</a>
        </div>
        <hr/>
      <?php } ?>
    </section>
    <footer class="col-lg-12">
      <hr/>
      CRUD PHP MySQLi POO MVC - David Flores - <a href="https://djsflores.github.io/">Portfolio</a> - Copyright &copy; <?php echo  date("Y"); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
