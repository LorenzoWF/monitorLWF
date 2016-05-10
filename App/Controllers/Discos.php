<?php

namespace App\Controllers;

use src\Pages\Render;
use App\Models\ModelDisco;

class Discos extends Render
{
    public function getDiscos()
    {
        $discos = new ModelDisco();
        $listaDiscos = $discos->discosFullServidor();

        header('Content-Type: application/json');
        $json = json_encode($listaDiscos);
        echo $json;
    }

    public function mostraDiscos()
    {
        $this->render('mostraDiscos');
    }

}
