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
            $model->salvaDados($data);
        }
    }

}
