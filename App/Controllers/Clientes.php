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

    public function setCliente()
    {
      $data = file_get_contents("php://input");

      $data = json_decode($data);

      $cliente = new ModelCliente();
      $cliente->setNome($data->vNome);
      $cadastro = $cliente->cadastrarCliente();

      if ($cadastro == 1){
        echo "Ciente ".$data->vNome." cadastrado com sucesso!";
      } else {
        echo "False";
      }
    }

    public function mostraClientes()
    {
      $this->render('mostraClientes');
    }

}
