<?php
require_once("db_connect.php");
class Category{

  private $id;
  private $name;

  public function __construct()
  {
    $this->name = "Unknown";
  }

  public function setName($n)
  {
    $this->name = $n;
  }

  public function getCategories()
  {
    $c = new db_connect();
    return $c->select("SELECT * FROM Categories");
  }

  public function save()
  {
    $nbrRow = 0;
    $c = new db_connect();
    if(strlen($this->name)>50)
    {
      echo "Can't Add the category: the size of the name of category is too big!!
      <br> Please try a shorter name";
    }
    else {
      $nbrRow = $c->execute("INSERT INTO Categories(Name_c) VALUES ('$this->name')");
    }
    return $nbrRow;
  }
  public function fillRandomCategories($n)
  {
    $c = new db_connect();
    for($i=0;$i<$n;$i++)
    {
      $name_c = "Category ".$i;
      $c->execute("INSERT INTO Categories(Name_c) VALUES ('$name_c')");
    }
  }
}
