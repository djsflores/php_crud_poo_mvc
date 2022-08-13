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
    //Conseguimos todos los usuarios
    $allusers=$usuario->getAll();
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
      echo "save: ".$lastId;
    }
    if (isset($_POST['checkRoles'])){
      //Asociamos el usuario-rol
      $usuarioRol=new Usuario_Rol($this->adapter);
      foreach($_POST['checkRoles'] as $id){
        echo "id usuario: ".$lastId;
        echo "id rol: ".$id;
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
      $usuario->deleteById($id);
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
      //Creamos el objeto usuario
      $usuario=new Usuario($this->adapter);
      //Conseguimos los datos del usuario
      $user=$usuario->getById($id);
      //var_dump($user);
      //print_r($user['id']);
      $dataUser=json_decode(json_encode($user), true);
      // print_r($dataUser);
      $dataUserId=$dataUser["id"];
      $dataUserNombre=$dataUser["nombre"];
      $dataUserApellido=$dataUser["apellido"];
      $dataUserDomicilio=$dataUser["domicilio"];
      //Creamos el objeto rol
      $rol=new Rol($this->adapter);
      //Conseguimos todos los roles
      $allroles=$rol->getAll();
      //Creamos el objeto usuario-rol
      $usuarioRol=new Usuario_Rol($this->adapter);
      //Conseguimos todos los roles asignados al usuario
      $allusuarioroles=$usuarioRol->getAllUserRolByUserId($id);
      //Cargamos la vista index y le pasamos valores
      $this->view("indexUsuario",array(
          // "datauser"=>$dataUser,
          "datauserid"=>$dataUserId,
          "datausernombre"=>$dataUserNombre,
          "datauserapellido"=>$dataUserApellido,
          "datauserdomicilio"=>$dataUserDomicilio,
          "allroles"=>$allroles,
          "allusuarioroles"=>$allusuarioroles,
          "Hola"    =>"Soy David Flores"
      ));
    }
  }

}
?>
