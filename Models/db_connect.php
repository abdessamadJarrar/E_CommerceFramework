<?php

class db_connect{
  private $local = "localhost";
  private $dbname = "e_commerce_framework";
  private $username = "root";
  private $password = "";

  public function execute($query)
  {
    $local = $this->local;
    $dbname = $this->dbname;
    $username = $this->username;
    $password = $this->password;
    $numRow = 0;
    try{
      $dbo = new PDO("mysql:local=$local;dbname=$dbname",$username,$password);
      $numRow = $dbo->exec($query);
      $dbo = null;
    }catch (PDOException $e) {
      echo "Database Error : " . $e->getMessage();
    }
    return $numRow;
  }

  public function select($q)
  {
    $local = $this->local;
    $dbname = $this->dbname;
    $username = $this->username;
    $password = $this->password;
    $rows = array();
    try {

      $dbo = new PDO("mysql:local=$local;dbname=$dbname",$username,$password);
      $query = $dbo->query($q);
      if(!empty($query))
      {
        foreach($query as $row) {
          $rows[] = $row;
        }
      }
      $query = null;
      $dbo = null;
    } catch (\Exception $e) {
      echo "Database Error : " . $e->getMessage();
    }
    return $rows;
  }

}
