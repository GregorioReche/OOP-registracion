<?php
/**
 *
 */
class User {

  private $name;
  private $email;
  private $gender;
  private $password;
  private $phone;

  private function sanitize(){
    //code
  }

  // Getters and setters

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



}


 ?>
