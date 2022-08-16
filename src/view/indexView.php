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
    <!-- <style>
      input{
        margin-top:5px;
        margin-bottom:5px;
      }
      .right{
        float:right;
      }
    </style> -->
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

    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header">
              Lista de Usuarios
            </div>
            <div class="p-4">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Domicilio</th>
                    <th scope="col">Roles</th>
                    <th scope="col" colspan="2">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allusers as $user) { ?>
                    <tr>
                      <td scope="row"><?php echo $user->id; ?></td>
                      <td><?php echo $user->nombre; ?></td>
                      <td><?php echo $user->apellido; ?></td>
                      <td><?php echo $user->domicilio; ?></td>
                      <?php 
                        $rolesUsuario = "";
                        if (is_array($allusuariosroles) || is_object($allusuariosroles)){
                          foreach($allusuariosroles as $userrol) {
                            if($user->id === $userrol->id_usuario){
                              if ($rolesUsuario == ""){
                                $rolesUsuario = $rolesUsuario.$userrol->nombre ;
                              } else {
                                $rolesUsuario = $rolesUsuario.", ".$userrol->nombre ;
                              }
                            }
                          }
                        }
                      ?>
                      <td><?php echo $rolesUsuario; ?></td>
                      <td><a class="text-success" href="<?php echo $helper->url("usuarios","editar"); ?>&id=<?php echo $user->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                      <td><a class="text-danger" href="<?php echo $helper->url("usuarios","borrar"); ?>&id=<?php echo $user->id; ?>" onclick="return confirm('Desea eliminar el usuario?')"><i class="bi bi-trash"></i></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              Ingresar datos del usuario:
            </div>
            <form action="<?php echo $helper->url("usuarios","crear"); ?>" method="post" class="p-4">
              <div class="mb-3">
                <label class="form-label">Nombre: </label>
                <input type="text" name="nombre" class="form-control" autofocus required>
              </div>
              <div class="mb-3">
                <label class="form-label">Apellido: </label>
                <input type="text" name="apellido" class="form-control" autofocus required>
              </div>
              <div class="mb-3">
                <label class="form-label">Domicilio: </label>
                <input type="text" name="domicilio" class="form-control" autofocus required>
              </div>
              <div class="mb-3">
                <label class="form-label">Roles: </label>
                <br>
                <?php 
                foreach($allroles as $rol) {
                ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox<?php echo $rol->id; ?>" name="checkRoles[]" value="<?php echo $rol->id; ?>">
                    <label class="form-check-label" for="inlineCheckbox<?php echo $rol->id; ?>"><?php echo $rol->nombre; ?></label>
                  </div>
                <?php
                }
                ?>
              </div>
              <div class="d-grid">
                <input type="hidden" name="oculto" value="1">
                <input type="submit" class="btn btn-primary" value="Registrar">
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
  </body>
</html>
