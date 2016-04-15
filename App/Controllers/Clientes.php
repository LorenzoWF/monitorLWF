<?php

namespace App\Controllers;

use src\Pages\Render;
use App\Models\ModelCliente;

class Clientes extends Render
{
    public function getClientes()
    {
      $clientes = new ModelCliente();
      $listaClientes = $clientes->clientesFull();

      header('Content-Type: application/json');
      $json = json_encode($listaClientes);
      echo $json;
    }

    public function mostraClientes()
    {
        $this->render('mostraClientes');
    }

}
