<?php
require_once("db_connect.php");
class order{

  private $idOrder;
  private $Date;
  private $Qte;
  private $IdProduct;
  private $IdUser;

  public function setProperties($d,$q,$id_p,$id_u)
  {
    $this->Date = $d;
    $this->Qte = $q;
    $this->IdProduct = $id_p;
    $this->IdUser = $id_u;
  }

  public function save()
  {
    $nbrRow = 0;
    $c = new db_connect();
    if($this->Qte < 1)
    {
      echo "the quantity ordered is invalid";
    }
    else {
      if(empty($c->select("SELECT * FROM products WHERE Id_p = $this->IdProduct")) or empty($c->select("SELECT * FROM users WHERE Id_u = $this->IdUser")))
      {
        echo "Order inserting failed !";
      }
      else
      {
        $nbrRow = $c->execute("INSERT INTO orders VALUES (null,'$this->Date',$this->Qte,$this->IdProduct,$this->IdUser)");
      }

    }
    return $nbrRow;
  }

  public function getOrders($condition)
  {
    $c = new db_connect();
    return $c->select("SELECT * FROM orders $condition");
  }
}
