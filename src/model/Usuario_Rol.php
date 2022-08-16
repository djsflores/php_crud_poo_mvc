<?php
class Usuario_Rol extends EntidadBase{
  private $id;
  private $id_usuario;
  private $id_rol;

  public function __construct($adapter) {
    $table="usuarios_roles";
    parent::__construct($table, $adapter);
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getIdUsuario() {
    return $this->id_usuario;
  }

  public function setIdUsuario($id_usuario) {
    $this->id_usuario = $id_usuario;
  }

  public function getIdRol() {
    return $this->id_rol;
  }

  public function setIdRol($id_rol) {
    $this->id_rol = $id_rol;
  }

  public function save(){
    $query="INSERT INTO usuarios_roles (id,id_usuario,id_rol)
            VALUES(NULL,
                  '".$this->id_usuario."',
                  '".$this->id_rol."');";
    $save=$this->db()->query($query);
    //$this->db()->error;
    return $save;
  }

  public function getAllUserRol(){
    $query=$this->db()->query("SELECT id_usuario, nombre FROM usuarios_roles JOIN roles ON usuarios_roles.id_rol = roles.id");
    //Devolvemos el resultset en forma de array de objetos
    while ($row = $query->fetch_object()) {
      $resultSet[]=$row;
    }
    return $resultSet;
  }

  public function getAllUserRolByUserId($id){
    $query=$this->db()->query("SELECT id_usuario, id_rol, nombre FROM usuarios_roles JOIN roles ON usuarios_roles.id_rol = roles.id WHERE id_usuario=$id");
    //Devolvemos el resultset en forma de array de objetos
    while ($row = $query->fetch_object()) {
      $resultSet[]=$row;
    }
    return $resultSet;
  }

  public function deleteByUserIdRolId($id_user, $id_rol){
    $query=$this->db()->query("DELETE FROM usuarios_roles WHERE id_usuario=$id_user AND id_rol=$id_rol");
    return $query;
  }

}
?>