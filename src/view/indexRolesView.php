<!DOCTYPE HTML>
<html lang="es">
  <head>
    <meta charset="utf-8"/>
    <title>CRUD PHP MySQLi POO MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- cdn iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
            <a class="nav-link active" aria-current="page" href="<?php echo $helper->url("usuarios","index"); ?>">Usuarios</a>
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
              Lista de Roles
            </div>
            <div class="p-4">
              <table class="table">
                <thead>
                  <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col" colspan="2">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($allroles as $rol) { ?>
                  <tr>
                    <td scope="row"><?php echo $rol->id; ?></td>
                    <td><?php echo $rol->nombre; ?></td>
                    <td>
                      <a class="text-success" href="#">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                    </td>
                    <td><a class="text-danger" href="<?php echo $helper->url("roles","borrar"); ?>&id=<?php echo $rol->id; ?>" onclick="return confirm('Desea eliminar el rol?')"><i class="bi bi-trash"></i></a></td>
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
              Ingresar datos del rol:
            </div>
            <form action="<?php echo $helper->url("roles","crear"); ?>" method="post" class="p-4">
              <div class="mb-3">
                <label class="form-label">Nombre: </label>
                <input type="text" name="nombre" class="form-control" autofocus required>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <footer class="col-lg-12">
      <hr/>
      CRUD PHP MySQLi POO MVC - David Flores - <a href="https://djsflores.github.io/">Portfolio</a> - Copyright &copy; <?php echo  date("Y"); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>