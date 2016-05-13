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

    public function render($action, $layout = 1)
    {
        $this->action = $action;
        if ($layout > 0){
            switch ($layout) {
              case 3:
                if (file_exists("../App/Views/plugins.ph'")){
                  include_once '../App/Views/plugins.php';
                } else {
                   echo "NAO FOI POSSIVEL CARREGAR OS PLUGINS";
                }
                break;

              case 2:
                if (file_exists("../App/Views/layout_2.php")){
                  include_once '../App/Views/layout_2.php';
                } else {
                   echo "NAO FOI POSSIVEL CARREGAR O LAYOUT 2";
                }
                break;

              default:
                if (file_exists("../App/Views/layout.php")){
                  include_once '../App/Views/layout.php';
                } else {
                   echo "NAO FOI POSSIVEL CARREGAR O LAYOUT PRINCIPAL";
                }
                break;
            }

        } else{
            $this->content();
        }
    }

    public function content()
    {
        $atual = get_class($this);
        $singleClassName = strtolower(str_replace("App\\Controllers\\","",$atual));

        include_once '../App/Views/'.$singleClassName."/".$this->action.'.php';
    }

}
