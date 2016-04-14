<?php

namespace App\Controllers;

use src\Pages\Render;
use App\Models\ModelDisco;

class Discos extends Render
{
    public function mostraDiscos()
    {
        $discos = new ModelDisco();
        $this->view->listaDiscos = $discos->discosFullClienteNome();

        $this->render('mostraDiscos');
    }

}
