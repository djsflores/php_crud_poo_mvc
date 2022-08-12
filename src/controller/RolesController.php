<?php
class RolesController extends ControladorBase{
  public function __construct() {
    parent::__construct();
  }

  public function index(){
    //Creamos el objeto rol
    $rol=new Rol();
    //Conseguimos todos los roles
    $allroles=$rol->getAll();
    //Cargamos la vista index y le pasamos valores
    $this->view("indexRoles",array(
        "allroles"=>$allroles,
    ));
  }

  public function crear(){
    if(isset($_POST["nombre"])){
      //Creamos un rol
      $rol=new Rol();
      $rol->setNombre($_POST["nombre"]);
      $save=$rol->save();
    }
    $this->redirect("Roles", "indexRoles");
  }

  public function borrar(){
    if(isset($_GET["id"])){
      $id=(int)$_GET["id"];
      $rol=new Rol();
      $rol->deleteById($id);
    }
    $this->redirect("Roles", "indexRoles");
  }

}