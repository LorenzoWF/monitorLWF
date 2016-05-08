<?php

namespace  App\Controllers;

use App\Models\ModelJson;

class Json
{
    public function recebeJson()
    {
        $data = file_get_contents("php://input");

        $data = json_decode($data);

        $model = new ModelJson();

        $cliente = $model->verificaCliente($data);

        if ($cliente == 1){

          switch ($data->acao) {
            case 0:
              # code...
              break;

            case 1:
              $model->salvaDisco($data);
              break;

            default:
              # code...
              break;
          }

        } else {
          echo "ERRO: Cliente nao cadastrado";
        }
    }

}
