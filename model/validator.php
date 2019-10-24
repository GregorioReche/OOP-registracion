<?php
  /**
   *
   */
  abstract class ClassName extends AnotherClass
  {
    private $db;
    private $errores = array();

    function __construct($db){
      this->$db = $db;
    }

    public abstract function validate($datos){

    }

  }



 ?>
