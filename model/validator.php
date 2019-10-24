<?php
  /**
   *
   */
  abstract class Validator {
    //private $db;
    protected $errores = array();

    // function __construct($db){
    //   $this->$db = $db;
    // }

    public abstract function validate($datos,$connection);

  }



 ?>
