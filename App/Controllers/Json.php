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

        $cliente = $model->verificaClienteServidor($data);

        if ($cliente == 1){
          $model->insertLogDisco($data);
        } else {
          echo "ERRO 01: as informacoes do servidor ou do cliente nao foram aprovadas !\n";
        }
    }

}
