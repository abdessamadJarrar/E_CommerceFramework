<?php
  require_once("../Models/product.php");
  require_once("../Models/user.php");

  function getProducts($id)
  {
    $start = (intval($id)-1)*24;
    $p = new product();
    return $p->getProducts("ORDER BY id_p DESC LIMIT $start,24");
  }

  function register($post)
  {
    // remove special chars
    foreach ($post as $key => $value) {
      $post[$key] = htmlspecialchars($post[$key],ENT_QUOTES);
    }
    // creating and printing use object
    $user = new user();
    $user->setProperties($post["email"], $post["password"], $post["first_name"],
    $post["last_name"], $post["sexe"], $post["country"], $post["city"],
    $post["phone"],$post["address"],$post["birth"]);
    $user->show();
    if(!filter_var($post["email"],FILTER_VALIDATE_EMAIL))
    {
      echo "not a valid email<br>";
    }
    return $user->validate();
  }
