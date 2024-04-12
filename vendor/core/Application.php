<?php


namespace core;


class Application
{
private $id = null;
protected $getParams;
public $defaultClassName = "SiteController";
public $defaultMethod = "index";

    public function run(){
        $uri = $_SERVER['REQUEST_URI'];
        //Session open
        session_start();

        $data = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
        //print_r($uri);die();
        //Check url
      /*  if ($uri == '' || $uri == '/' || $uri == 'index'){
            $class_name = "controllers\\".$this->defaultClassName;
            $methodName = $this->defaultMethod;
        }else{
           $class_name = ucfirst($data[0]). "Controller";
            $class_name = "controllers\\".$class_name;

            if (strpos($data[1], "?")){
                $param = explode("?", $data[1]);
                $methodName = $param[0];
            }else{
                $methodName =  $data[1];
            }
            if (isset($data[2])){
                $this->id = $data[2];
            }
            $obj = new $class_name();
            //CHECK CLASS METHODS
            if (is_null($this->id)){
                $obj->{$methodName}();
            }else{
                $obj->{$methodName}($this->id);
            }
        }*/
        if (!empty($data[0]) && !empty($data[1])){

            $className = "app\controllers\\".ucfirst($data[0]). "Controller";
        //GET paramlarni ajratish
        if (strpos($data[1], "?")){
            $params = explode("?", $data[1]);
            $methodName = $params[0];
        }else{
            $methodName = $data[1];
        }

        if (isset($data[2])){
            $this->id = $data[2];
        }

        $controller = new $className();
        //CHECK CLASS METHODS
        if (is_null($this->id)){
                $controller->{$methodName}();
            }else{
                $controller->{$methodName}($this->id);
            }
        }else{
            //default route if $url[0] empty
            $defClassName = "app\controllers\\".$this->defaultClassName;
            $defMethod = $this->defaultMethod;
            $defController = new $defClassName;
            $defController->{$defMethod}();
        }

    }


}