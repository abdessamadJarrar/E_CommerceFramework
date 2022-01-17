<?php
require_once("db_connect.php");
class user{

  private $Id;
  private $Email;
  private $Password;
  private $First_Name;
  private $Last_Name;
  private $Sexe;
  private $Country;
  private $City;
  private $Phone;
  private $Address;
  private $Date_of_Birth;

  public function setProperties($e,$pa,$f,$l,$s,$co,$ci,$ph,$a,$d)
  {
    $this->Email = $e;
    $this->Password = $pa;
    $this->First_Name = $f;
    $this->Last_Name = $l;
    $this->Sexe = $s;
    $this->Country = $co;
    $this->City = $ci;
    $this->Phone = $ph;
    $this->Address = $a;
    $this->Date_of_Birth = $d;
  }

  public function show()
  {

    echo "Email :" . $this->Email . "<br>";
    echo "Password :" . $this->Password . "<br>";
    echo "First Name :" . $this->First_Name . "<br>";
    echo "Last Name :" . $this->Last_Name . "<br>";
    echo "Sexe :" . $this->Sexe . "<br>";
    echo "Country :" . $this->Country . "<br>";
    echo "City :" . $this->City . "<br>";
    echo "Phone :" . $this->Phone . "<br>";
    echo "Address :" . $this->Address . "<br>";
    echo "Date of Birth :" . $this->Date_of_Birth . "<br>";
  }

  public function save()
  {
    if($this->validate()==1)
    {
      $this->Password = password_hash($this->Password,PASSWORD_DEFAULT); // user password_verify($input,$HashedPassword);
      $db_c = new db_connect();
      $numberRows = $db_c->execute("INSERT INTO users values(NULL,'$this->Email','$this->Password','$this->First_Name','$this->Last_Name','$this->Sexe','$this->Country','$this->City','$this->Phone','$this->Address','$this->Date_of_Birth')");
      return $numberRows;
    }
    else {
      echo "User data are not valid";
      return 0;
    }
  }

  public function login($username,$password)
  {
    $db_c = new db_connect();
    $row = $db_c->select("SELECT * FROM users WHERE Email_u = '$username'");
    print_r2($row);
    $pwd = $row[0]['Password_u'];
    if(password_verify($password,$pwd))
    {
      echo "login sucess";
      return $row[0]['Id_u'];
    }
    else {
      echo "login failed : $password and $pwd  does not match";
      return -1;
    }
  }

  public function validate()
  {
    return $this->validate_email() * $this->validate_password() *
     $this->validate_first_name() * $this->validate_last_name() *
     $this->validate_sexe() * $this->validate_country() *
     $this->validate_city() * $this->validate_phone() *
     $this->validate_address() * $this->validate_date();
  }

  private function validate_email() // Error number 2
  {
    return (filter_var($this->Email,FILTER_VALIDATE_EMAIL))?1:2;
  }

  private function validate_password() // Error number 3
  {
    $option = array(
      'options'=>array('regexp'=>'/.{8,20}/')
    );
    return (filter_var($this->Password,FILTER_VALIDATE_REGEXP,$option))?1:3;
  }

  private function validate_first_name() // Error number 5
  {
    $option = array(
      'options'=>array('regexp'=>'/^[a-zA-Z]{3,}$/')
    );
    return (filter_var($this->First_Name,FILTER_VALIDATE_REGEXP,$option))?1:5;
  }

  private function validate_last_name() // Error number 7
  {
    $option = array(
      'options'=>array('regexp'=>'/^[a-zA-Z]{3,}$/')
    );
    return (filter_var($this->Last_Name,FILTER_VALIDATE_REGEXP,$option))?1:7;
  }

  private function validate_sexe() // Error number 11
  {
    if($this->Sexe !== "MALE" and $this->Sexe !== "FEMALE")
    {
      return 11;
    }
    else {
      return 1;
    }
  }

  private function validate_country() // Error number 13
  {
    $option = array(
      'options'=>array('regexp'=>'/.{4,56}/')
    );
    return (filter_var($this->Country,FILTER_VALIDATE_REGEXP,$option))?1:13;
  }

  private function validate_city() // Error number 17
  {
    $option = array(
      'options'=>array('regexp'=>'/.{1,187}/')
    );
    return (filter_var($this->City,FILTER_VALIDATE_REGEXP,$option))?1:17;
  }

  private function validate_phone() // Error number 19
  {
    $option = array(
      'options'=>array('regexp'=>'/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.0-9]*$/')
    );
    return (filter_var($this->Phone,FILTER_VALIDATE_REGEXP,$option))?1:19;
  }

  private function validate_address() // Error number 23
  {
    $option = array(
      'options'=>array('regexp'=>'/.{1,187}/')
    );
    return (filter_var($this->Address,FILTER_VALIDATE_REGEXP,$option))?1:23;
  }

  private function validate_date() // Error number 29
  {
    $date = date_parse($this->Date_of_Birth); // or date_parse_from_format("d/m/Y", $date);
    if (checkdate($date['month'], $date['day'], $date['year'])) {
        return 1;
    }
    else {
      return 29;
    }
  }
}
