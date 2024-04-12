<?php


namespace core\base;

use core\base\View;

class Controller
{
public $view;

public function __construct()
{
    $this->view = new View();
}

public function render($viewFile, $params = null){
    $this->view->render($viewFile, $params);
}

}