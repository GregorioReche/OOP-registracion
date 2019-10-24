<?php
  /**
   *
   */
  use model\DataConnection;

  class ValidatorRegistration extends Validator
  {

    public function validate($datos, $connection){


      if (strlen($datos["name"]) < 4) {
        $this->errores["name"] = "El nombre de contener más de 4 caracteres.";
      }

      if(isset($datos["birthday"])){
        if ($datos["birthday"] == "") {
          $this->errores["birthday"] = "Debe completar el campo birthday.";
        }
        else if (validateAge($datos["birthday"]) == false) {
          $this->errores["birthday"] = "Debe ser mayor de edad para registratse";
        }
      }

      if (!isset($datos["gender"])){
        $this->errores["gender"] = "Debe seleccionar un gender";
      }

      if ($datos["password"] == "") {
        $this->errores["password"] = "Debe completar el password.";
      }

      if ($datos["cpassword"] == "") {
        $this->errores["cpassword"] = "Debe completar la confirmación de password.";
      }

      if ($datos["password"] != "" && $datos["cpassword"] != "" && $datos["password"] != $datos["cpassword"]) {
        $this->errores["password"] = "Password y confirmación deben ser iguales.";
      }

      if ($datos["email"] == "") {
        $this->errores["email"] = "Debe completar el campo email.";
      }
      else if (filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false) {
        $this->errores["email"] = "Debe ingresar un mail válido.";
      }
      else if ($connection->existeElEmail($datos["email"])) {
        $this->errores["email"] = "Ese email ya esta tomado";
      }

      return $this->errores;
    }

  }


 ?>
