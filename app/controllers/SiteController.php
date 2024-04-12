<?php


namespace app\controllers;


class SiteController extends AppController
{
    public function index(){
        $this->render("site/index");
    }

}