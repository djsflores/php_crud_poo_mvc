<?php
class UsuariosController extends ControladorBase{
  public $conectar;
  public $adapter;

  public function __construct() {
    parent::__construct();

    $this->conectar=new Conectar();
    $this->adapter=$this->conectar->conexion();
  }

  public function index(){
    //Creamos el objeto usuario
    $usuario=new Usuario($this->adapter);
    //Conseguimos todos los usuarios activos
    // $allusers=$usuario->getAll();
    $allusers=$usuario->getBy('activo', 1);
    //Creamos el objeto rol
    $rol=new Rol($this->adapter);
    //Conseguimos todos los roles
    $allroles=$rol->getAll();
    //Creamos el objeto usuario-rol
    $usuarioRol=new Usuario_Rol($this->adapter);
    //Conseguimos todos los roles asignados a los usuarios
    $allusuariosroles=$usuarioRol->getAllUserRol();
    //Cargamos la vista index y le pasamos valores
    $this->view("index",array(
        "allusers"=>$allusers,
        "allroles"=>$allroles,
        "allusuariosroles"=>$allusuariosroles,
        "Hola"    =>"Soy David Flores"
    ));
  }

  public function crear(){
    if(isset($_POST["nombre"])){
      //Creamos un usuario
      $usuario=new Usuario($this->adapter);
      $usuario->setNombre($_POST["nombre"]);
      $usuario->setApellido($_POST["apellido"]);
      $usuario->setDomicilio($_POST["domicilio"]);
      // $save=$usuario->save();
      $lastId=$usuario->saveId();
    }
    if (isset($_POST['checkRoles'])){
      //Asociamos el usuario-rol
      $usuarioRol=new Usuario_Rol($this->adapter);
      foreach($_POST['checkRoles'] as $id){
        $usuarioRol->setIdRol($id);
        $usuarioRol->setIdUsuario($lastId);   
        $save=$usuarioRol->save();     
      }
    }
    $this->redirect("Usuarios", "index");
  }

  public function borrar(){
    if(isset($_GET["id"])){
      $id=(int)$_GET["id"];
      $usuario=new Usuario($this->adapter);
      //$usuario->deleteById($id);
      $usuario->logicalErase($id);
    }
    $this->redirect();
  }

  public function hola(){
    $usuarios=new UsuariosModel($this->adapter);
    $usu=$usuarios->getUnUsuario();
    var_dump($usu);
  }

  public function editar(){
    if(isset($_GET["id"])){
      $id=(int)$_GET["id"];
      //Creamos el objeto usuario y conseguimos los datos del usuario
      $usuario=new Usuario($this->adapter);
      $user=$usuario->getById($id);
      $dataUser=json_decode(json_encode($user), true);
      $dataUserId=$dataUser["id"];
      $dataUserNombre=$dataUser["nombre"];
      $dataUserApellido=$dataUser["apellido"];
      $dataUserDomicilio=$dataUser["domicilio"];
      //Creamos el objeto rol y conseguimos todos los roles
      $rol=new Rol($this->adapter);
      $allroles=$rol->getAll();
      //Creamos el objeto usuario-rol y conseguimos todos los roles asignados al usuario
      $usuarioRol=new Usuario_Rol($this->adapter);
      $allusuarioroles=$usuarioRol->getAllUserRolByUserId($id);
      $rolesAsignados = [];
      if (is_array($allusuarioroles) || is_object($allusuarioroles)){
        foreach($allusuarioroles as $userrol) { 
          $rolesAsignados[] = $userrol->id_rol; 
        }
      }
      //Cargamos la vista index y le pasamos valores
      $this->view("indexUsuario",array(
          // "datauser"=>$dataUser,
          "datauserid"=>$dataUserId,
          "datausernombre"=>$dataUserNombre,
          "datauserapellido"=>$dataUserApellido,
          "datauserdomicilio"=>$dataUserDomicilio,
          "allroles"=>$allroles,
          // "allusuarioroles"=>$allusuarioroles,
          "rolesAsignados"=>$rolesAsignados,
          "Hola"    =>"Soy David Flores"
      ));
    }
  }

  public function actualizar(){
    if(isset($_GET["id"])){
      $id_usuario=(int)$_GET["id"];
      //Obtenemos el usuario y actualizamos
      $usuario=new Usuario($this->adapter);
      $usuario->setId($id_usuario);
      $usuario->setNombre($_POST["nombre"]);
      $usuario->setApellido($_POST["apellido"]);
      $usuario->setDomicilio($_POST["domicilio"]);
      $update=$usuario->update();
      // Obtenemos los nuevos roles recibidos de la vista
      if (isset($_POST['checkRoles'])){
        foreach($_POST['checkRoles'] as $id){
          $rolesNuevos[] = $id; 
        }
      }
      //Creamos el objeto usuario-rol y conseguimos todos los roles asignados al usuario
      $usuarioRol=new Usuario_Rol($this->adapter);
      $allusuarioroles=$usuarioRol->getAllUserRolByUserId($id_usuario);
      $rolesActuales = [];
      if (is_array($allusuarioroles) || is_object($allusuarioroles)){
        foreach($allusuarioroles as $userrol) { 
          $rolesActuales[] = $userrol->id_rol; 
        }
      }
      // Agregamos y eliminamos relaciones usuario-rol
      foreach($rolesActuales as $rol) {
        if (!in_array($rol, $rolesNuevos)) {
          // eliminar usuario-rol
          $usuarioRol=new Usuario_Rol($this->adapter);
          $usuarioRol->deleteByUserIdRolId($id_usuario, $rol);
        }
      }
      foreach($rolesNuevos as $rol) {
        if (!in_array($rol, $rolesActuales)) {
          // agregar usuario-rol
          $usuarioRol=new Usuario_Rol($this->adapter);
          $usuarioRol->setIdRol($rol);
          $usuarioRol->setIdUsuario($id_usuario);   
          $save=$usuarioRol->save();   
        }
      }
    }

    $this->redirect("Usuarios", "index");
    exit();
  }

}
?>
