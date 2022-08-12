<?php
class RolesModel extends ModeloBase{
  private $table;

  public function __construct(){
    $this->table="roles";
    parent::__construct($this->table);
  }
}
?>