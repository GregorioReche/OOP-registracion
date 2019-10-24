<?php
/**
 *
 */
class User {

  private $id;
  private $name;
  private $email;
  private $gender;
  private $password;
  private $phone;

  function __construct($datos){
    // var_dump($datos);exit;
    $this->name = ucfirst($datos["name"]);
    $this->email = trim($datos["email"]);
    $this->gender = $datos["gender"];
    $this->password = password_hash($datos["password"],PASSWORD_DEFAULT);
    $this->phone = trim($datos["phone"]);
  }

  // Getters and setters
  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function getName(){
    return $this->name;
  }
  public function setName($name){
    $this->name = $name;
  }
  public function getEmail(){
    return $this->email;
  }
  public function setEmail($email){
    $this->email = $email;
  }
  public function getGender(){
    return $this->gender;
  }
  public function setGender($gender){
    $this->gender = $gender;
  }
  public function getPassword(){
    return $this->password;
  }
  public function setPassword($password){
    $this->password = $password;
  }
  public function getphone(){
    return $this->phone;
  }
  public function setphone($phone){
    $this->phone = $phone;
  }

  public function toArray(){
    return get_object_vars($this);
  }

}


 ?>
