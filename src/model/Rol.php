<?php
class Rol extends EntidadBase{
  private $id;
  private $nombre;

  public function __construct($adapter) {
    $table="roles";
    parent::__construct($table, $adapter);
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function save(){
    $query="INSERT INTO roles (id,nombre)
            VALUES(NULL,
                  '".$this->nombre."');";
    $save=$this->db()->query($query);
    //$this->db()->error;
    return $save;
  }

}
?>