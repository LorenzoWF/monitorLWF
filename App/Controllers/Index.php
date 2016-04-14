<?php

namespace App\Controllers;

use src\Pages\Render;

class Index extends Render
{
    public function index()
    {
        //$this->verificaCookie();
        //$this->verificaSession();
        $this->render('index');
    }

    private function verificaSession()
    {
        echo "VERIFICA SESSION";
    }

    private function verificaCookie()
    {
        echo "VERIFICA COOKIE";
    }

}
