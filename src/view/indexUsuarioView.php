<!DOCTYPE HTML>
<html lang="es">
  <head>
    <meta charset="utf-8"/>
    <title>CRUD PHP MySQLi POO MVC</title>
    <!-- Bootstrap CSS v5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JQuery -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- cdn iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
    <div class="container mt-5">
      <div class="row justify-content-venter">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              Editar datos del usuario:
            </div>
            <form action="<?php echo $helper->url("usuarios","actualizar"); ?>&id=<?php echo $datauserid; ?>" method="post" class="row p-4 g-3 needs-validation" novalidate>
              <div class="mb-3">
                <label class="form-label">Nombre: </label>
                <input type="text" name="nombre" class="form-control" required value="<?php echo $datausernombre;?>">
                <div class="invalid-feedback">
                  Por favor complete este campo.
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Apellido: </label>
                <input type="text" name="apellido" class="form-control" required value="<?php echo $datauserapellido;?>">
                <div class="invalid-feedback">
                  Por favor complete este campo.
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Domicilio: </label>
                <input type="text" name="domicilio" class="form-control" required value="<?php echo $datauserdomicilio;?>">
                <div class="invalid-feedback">
                  Por favor complete este campo.
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Roles: </label>
                <br>
                  <?php 
                  $checkear=0;
                  foreach($allroles as $rol) {
                    if (in_array($rol->id, $rolesAsignados)) {
                      $checkear=1;
                    } else{
                      $checkear=0;
                    }
                  ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox<?php echo $rol->id; ?>" name="checkRoles[]" value="<?php echo $rol->id; ?>" <?php echo $checkear===1 ? 'checked' : '' ?> >
                    <label class="form-check-label" for="inlineCheckbox<?php echo $rol->id; ?>"><?php echo $rol->nombre; ?></label>
                  </div>
                  <?php
                  }
                  ?>
              </div>
              <div class="d-grid">
                <input type="hidden" name="oculto" value="1">
                <input type="submit" class="btn btn-primary" value="Actualizar">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container-fluid bg-dark fixed-bottom">
        <div class="row">
          <div class="col-md text-light text-center py-1">
            <span>CRUD PHP MySQLi POO MVC - David Flores - <a href="https://djsflores.github.io/">Portfolio</a> - Copyright &copy; <?php echo  date("Y"); ?></span>
          </div>
        </div>
      </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="./view/js/app.js"></script>
  </body>
</html>
