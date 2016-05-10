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

    public function render($action, $layout = 1, $plugins = true)
    {
        $this->action = $action;
        if ($layout > 0){
            switch ($layout) {
              case 2:
                //if file_exists("../App/Views/layout_2.php") ? include_once '../App/Views/layout_2.php' : echo "NAO FOI POSSIVEL CARREGAR O LAYOUT 2";
                if (file_exists("../App/Views/layout_2.php")){
                  include_once '../App/Views/layout_2.php';
                } else {
                   echo "NAO FOI POSSIVEL CARREGAR O LAYOUT 2";
                }
                break;

              default:
                //if file_exists("../App/Views/layout.php") == True ? include_once '../App/Views/layout.php' : echo "NAO FOI POSSIVEL CARREGAR O LAYOUT";
                if (file_exists("../App/Views/layout.php")){
                  include_once '../App/Views/layout.php';
                } else {
                   echo "NAO FOI POSSIVEL CARREGAR O LAYOUT PRINCIPAL";
                }
                break;
            }

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
