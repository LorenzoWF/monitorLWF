<?php

namespace src\Pages;

abstract class Render
{
    protected $view;
    protected $action;


    public function __construct()
    {
        $this->view = new \stdClass();
    }

    public function render($action, $layout = true, $plugins = true)
    {
        $this->action = $action;
        if ($layout == true && file_exists("../App/Views/layout.php")){
            include_once '../App/Views/layout.php';
        } else{
            if ($plugins == true){
              include_once '../App/Views/plugins.php';
            } else {
              $this->content();
            }
        }
    }

    public function content()
    {
        $atual = get_class($this);
        $singleClassName = strtolower(str_replace("App\\Controllers\\","",$atual));

        include_once '../App/Views/'.$singleClassName."/".$this->action.'.php';
    }

}
