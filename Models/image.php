<?php
require_once("db_connect.php");
class image{

  private $id;
  private $url;
  private $type;
  private $idProduct;

  public function setProperties($url,$type,$idProduct)
  {
    $this->url = $url;
    $this->type = $type;
    $this->idProduct = $idProduct;
  }

  public function save()
  {
    $nbrRow = 0;
    $c = new db_connect();
    if(empty($c->select("SELECT * FROM Products WHERE id_p = $this->idProduct")))
    {
      echo "The associated product to the Image is Unknown or Inaccessible !";
    }
    else{
      $nbrRow = $c->execute("INSERT INTO Images VALUES (null,'$this->url','$this->type',$this->idProduct)");
    }
    return $nbrRow;
  }

  public static function getImages($condition)
  {
    $c = new db_connect();
    return $c->select("SELECT * FROM images $condition");
  }
}
