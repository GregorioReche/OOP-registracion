<?php

/**
 * CONECCTION TO THE CLIENTS FILE OR CONNECTION TO THE USERS DATABASE.
 */

  abstract class DataConnection  {

    // function __construct(argument)
    // {
    //   // code...
    // }

    public abstract function buscarUsuarioPorEmail($email);
    public abstract function buscarUsuarioPorId($id);
    public abstract function traerTodosLosUsuarios();
    public abstract function existeElEmail($email);
    public abstract function registrar($usuario);
    public abstract function proximoId();
}


 ?>
