<?php


namespace core\base;


class View
{

    public function render($viewFile, $params = null){
       if (!is_null($params)){
           extract($params);//kelgan paramsdi ma'lumotlarini keylari bo'yicha o'zgaruvchi hosil qiladi
       }
        include "app/views/layouts/header.php";
        include "app/views/".$viewFile.".php";
        include "app/views/layouts/footer.php";
    }
}