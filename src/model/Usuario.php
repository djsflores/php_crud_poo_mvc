<?php
class Usuario extends EntidadBase{
  private $id;
  private $nombre;
  private $apellido;
  private $domicilio;

  public function __construct($adapter) {
    $table="usuarios";
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
 
  public function getApellido() {
    return $this->apellido;
  }
 
  public function setApellido($apellido) {
    $this->apellido = $apellido;
  }

  public function getDomicilio() {
    return $this->domicilio;
  }

  public function setDomicilio($domicilio) {
    $this->domicilio = $domicilio;
  }

  public function save(){
    $query="INSERT INTO usuarios (id,nombre,apellido,domicilio)
            VALUES(NULL,
                  '".$this->nombre."',
                  '".$this->apellido."',
                  '".$this->domicilio."');";
    $save=$this->db()->query($query);
    //$this->db()->error;
    return $save;
  }
  public function saveId(){
    $query="INSERT INTO usuarios (id,nombre,apellido,domicilio)
            VALUES(NULL,
                  '".$this->nombre."',
                  '".$this->apellido."',
                  '".$this->domicilio."');";
    $save=$this->db()->query($query);
    //$this->db()->error;
    $last_id = $this->db()->insert_id;
    return $last_id;
  }

}
?>
