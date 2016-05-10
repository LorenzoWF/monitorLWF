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

          switch ($data->acao) {
            case 0:
              # code...
              break;

            case 1:
              $disco = $model->verificaDisco($data);
              if ($disco == True){
                $model->salvaDisco($data);
              } else {
                echo "O Disco já está cadastrado";
              }

              break;

            case 2:
              $disco = $model->verificaDisco($data);
              if ($disco == False){
                $model->salvaLogDisco($data, $disco);
              } else {
                echo "O Disco nao está cadastrado ".$disco;
              }
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
