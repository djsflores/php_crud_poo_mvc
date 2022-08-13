<?php
class RolesModel extends ModeloBase{
  private $table;

  public function __construct($adapter){
    $this->table="roles";
    parent::__construct($this->table, $adapter);
  }
}
?>