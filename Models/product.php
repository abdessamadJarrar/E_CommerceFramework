<?php
require_once("db_connect.php");
class product{

  private $id;
  private $name;
  private $price;
  private $description;
  private $idCategory;

  public function setProperties($n,$p,$d,$idc)
  {
    $this->name = $n;
    $this->price = $p;
    $this->description = $d;
    $this->idCategory = $idc;
  }

  public function save()
  {
    $nbrRow = 0;
    $c = new db_connect();
    if(strlen($this->name)>100)
    {
      echo "Can't Add the product: the size of the name of product is too big!!
      <br> Please try a shorter name";
    }
    else {
      if(empty($c->select("SELECT * FROM Categories WHERE Id_c = $this->idCategory")))
      {
        echo "The Category of the product is unknown or inaccessible !";
      }
      else
      {
        $nbrRow = $c->execute("INSERT INTO Products VALUES (null,'$this->name',$this->price,'$this->description','$this->idCategory')");
      }

    }
    return $nbrRow;
  }

  public function getProducts($condition)
  {
    $c = new db_connect();
    return $c->select("SELECT * FROM Products $condition");
  }

  public function fillRandomProducts($n)
  {
    $c = new db_connect();
    for($i=0;$i<$n;$i++)
    {
      $na = "name ".$i;
      $p = $i * 3.14;
      $desc = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
      $nbr = count($c->select("SELECT * FROM Categories"));
      $id = $i%$nbr;
      $c->execute("INSERT INTO Products VALUES (null,'$na',$p,'$desc',1)");
    }
  }
}
