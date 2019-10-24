<?php
  /**
   * Data Connection implementation for JSON.
   */
  class DCJson extends DataConnection
  {

    // function __construct(argument)
    // {
    //   // code...
    // }

    public function buscarUsuarioPorEmail($email){

      $usuarios = $this->traerTodosLosUsuarios();

      foreach ($usuarios as $usuario) {
        if ($usuario["email"] == $email) {
          return $usuario;
        }
      }

      return null;

    }
    public function buscarUsuarioPorId($id){
      $usuarios = $this->traerTodosLosUsuarios();

      foreach ($usuarios as $usuario) {
        if ($usuario["id"] == $id) {
          return $usuario;
        }
      }

      return null;
    }

    public function traerTodosLosUsuarios(){
      if(!file_exists("usuarios.json")){
        return [];
      }
      $archivo = file_get_contents("usuarios.json");

      if ($archivo == "") {
        return [];
      }

      $usuarios = json_decode($archivo, true);

      return $usuarios;

    }

    public function existeElEmail($email){
      $usuario = $this->buscarUsuarioPorEmail($email);

      if ($usuario == null) {
        return false;
      } else {
        return true;
      }
    }

    public function registrar($usuario){
      $usuarios = $this->traerTodosLosUsuarios();

      $usuarios[] = $usuario;

      $usuariosJSON = json_encode($usuarios);

      file_put_contents("usuarios.json", $usuariosJSON);

    }
    public function function proximoId(){
      $usuarios = traerTodosLosUsuarios();

      // Si no hay usuarios el proximo id es el ultimo
      if (empty($usuarios)) {
        return 1;
      }

      // obtener ultimo usuario
      $ultimoUsuario = end($usuarios);

      // Del ultimo usuario obtenemos el id y sumamos uno
      return $ultimoUsuario["id"] + 1;
    }
  }


 ?>
