<?php
/*
Класс для построение по страничной навигации
 */

namespace core\libs;


use core\Request;

class Pagination {

    public $currentPage; //свойство текущая страния
    public $perpage; //свойство кол-во товаров на странице
    public $total; // свойства получения кол-во записей из БД
    public $countPages; // свойства общие кол-во страниц
    public $uri;
    public $sortGet = null;


    //Конструктор
    public function __construct($perpage, $total){
        $request = new Request();
        $page = $request->page;
        $this->sortGet = $request->getSort;

        $this->perpage = $perpage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);//"&"."sort={$this->sortGet}"
        $this->uri = $this->getParams();
        //var_dump($this->uri);
    }

    //Метод для формирования html пагинацию
    public function getHtml(){
        $back = null; // ссылка НАЗАД
        $forward = null; // ссылка ВПЕРЕД
        $startpage = null; // ссылка В НАЧАЛО
        $endpage = null; // ссылка В КОНЕЦ
        $page2left = null; // вторая страница слева
        $page1left = null; // первая страница слева
        $page2right = null; // вторая страница справа
        $page1right = null; // первая страница справа

        if( $this->currentPage > 1 ){
            $back = "<li class='page-item'><a class='page-link' href='{$this->uri}page=" .($this->currentPage - 1). "'>&lt;</a></li>";
        }
        if( $this->currentPage < $this->countPages ){
            $forward = "<li class='page-item'><a class='page-link' href='{$this->uri}page=" .($this->currentPage + 1). "'>&gt;</a></li>";
        }
        if( $this->currentPage > 3 ){
            $startpage = "<li class='page-item'><a class='page-link' href='{$this->uri}page=1'>&laquo;</a></li>";
        }
        if( $this->currentPage < ($this->countPages - 2) ){
            $endpage = "<li class='page-item'><a class='page-link' href='{$this->uri}page={$this->countPages}"."'>&raquo;</a></li>";
        }
        if( $this->currentPage - 2 > 0 ){
            $page2left = "<li class='page-item'><a class='page-link' href='{$this->uri}page=" .($this->currentPage-2). "'>" .($this->currentPage - 2). "</a></li>";
        }
        if( $this->currentPage - 1 > 0 ){
            $page1left = "<li class='page-item'><a class='page-link' href='{$this->uri}page=" .($this->currentPage-1). "'>" .($this->currentPage-1). "</a></li>";
        }
        if( $this->currentPage + 1 <= $this->countPages ){
            $page1right = "<li class='page-item'><a class='page-link' href='{$this->uri}page=" .($this->currentPage + 1). "'>" .($this->currentPage+1). "</a></li>";
        }
        if( $this->currentPage + 2 <= $this->countPages ){
            $page2right = "<li class='page-item'><a class='page-link' href='{$this->uri}page=" .($this->currentPage + 2). "'>" .($this->currentPage + 2). "</a></li>";
        }

        return '<ul class="pagination">' . $startpage.$back.$page2left.$page1left.'<li class="page-item active"><a class="page-link">'.$this->currentPage.'</a></li>'.$page1right.$page2right.$forward.$endpage . '</ul>';
    }

    //Метод для возвращения пагинацию в сторке
    public function __toString(){
        return$this->getHtml();
    }

    //Метод который получает общие кол-во страниц
    public function getCountPages(){
      return ceil($this->total / $this->perpage) ?: 1; //ceil()-данная функция округлает числа
    }

    //Метод который получает текущие номет страницы
    public  function getCurrentPage($page){
        if (!$page || $page < 1) $page = 1;
        if ($page > $this->countPages) $page = $this->countPages;
        return $page;
    }

    //Метод расчета текущие страници по формуле
    public function getStart(){
        return ($this->currentPage - 1) * $this->perpage;

    }

    //Метод для записе параметров
    public function getParams(){
        $url = $_SERVER['REQUEST_URI'];

        preg_match_all("#filter=[\d,&]#", $url, $matches);
        if (count($matches[0]) > 1){
            $url = preg_replace("#filter=[\d,&]+#", "", $url, 1);
        }

        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if(isset($url[1]) && $url[1] != ''){
            $params = explode('&', $url[1]);
            foreach($params as $param){
                if(!preg_match("#page=#", $param)) $uri .= "{$param}&amp;";
            }
        }
        return urldecode($uri);
    }
}