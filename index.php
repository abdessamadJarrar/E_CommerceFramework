<?php
//header("location:Vues/index.html");
require_once("Models/category.php");
require_once("Models/product.php");
require_once("Models/image.php");
require_once("Models/user.php");
require_once("Models/order.php");
function print_r2($a)
{
  echo "<pre>";
  print_r($a);
  echo "</pre>";
}

$o = new order();
$o->setProperties("2021-2-5",5,1,14);
$o->save();
print_r2($o->getOrders(""));
