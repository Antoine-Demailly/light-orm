<?php

namespace components\console\generate;

use components\ORM\OrmConfig;

class Entity
{
  private $table;
  private $arguments;

  public function __construct($args)
  {
    $this->arguments = $args;

    if (empty($this->arguments[0]))
      exit("Missing 1 parameters. <name> parameter is require for: generate:entity <name> <table(?)>\n");

    $this->table = empty($this->arguments[1]) ? $this->generateTableName($this->arguments[0]) : $this->arguments[1];
  }

  private function generateTableName($entity)
  {
    $table = strtolower($entity);
    
    if (substr($table, -1) == 'y')
      $table = rtrim($table, 'y') . 'ies';
    else
      $table .= 's';

    return $table;
  }

  private function getStructure()
  {

    // $db = OrmConfig::getConnexion();
    //
    // $query = $db->query('SHOW COLUMNS FROM users');
    // var_dump($query->fetchAll(PDO::FETCH_COLUMN));
  }
}