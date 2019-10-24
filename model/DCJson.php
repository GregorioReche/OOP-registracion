<?php
  /**
   * Data Connection implementation for JSON.
   */
  use model\User;

  class DCJson extends DataConnection
  {

    // function __construct(argument)
    // {
    //   // code...
    // }

    public function buscarUsuarioPorEmail($email){

      $usuarios = $this->traerTodosLosUsuarios();

      foreach ($usuarios as $usuario) {
        // var_dump($email);
        echo "<pre>";
        // var_dump($usuario);
        echo "</pre>";
        if (isset($usuario["email"])){
          if ($usuario["email"] == $email) {

            return $usuario;
          }
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
      echo "<pre>";
      var_dump($usuario);
      echo "</pre>";
      $id = $this->proximoId();
      $usuario->setId($id);
      echo "<pre>";
      var_dump($usuario);
      echo "</pre>";
      $usuarioArray = $usuario->toArray();
      var_dump($usuarioArray);
      $usuarios[] = $usuarioArray;

      $usuariosJSON = json_encode($usuarios);

      file_put_contents("usuarios.json", $usuariosJSON);

      return $usuario->getId;
    }
    public function proximoId(){
      $usuarios = $this->traerTodosLosUsuarios();

      // Si no hay usuarios el proximo id es el ultimo
      if (empty($usuarios)) {
        return 1;
      }

      // obtener ultimo usuario id
      $ultimoUsuarioId = count($usuarios);

      // Del ultimo usuario obtenemos el id y sumamos uno
      return $ultimoUsuarioId + 1;
    }
  }


 ?>
