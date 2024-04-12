<?php


namespace app\controllers;



class CategoryController extends AppController
{
    public function Lists(){

        $this->render("category/lists");
    }
    public function add(){

        $this->render("category/add");
    }
    public function update(){
        $this->render("category/update");
    }
    public function view(){

        $this->render("category/view");
    }
    public function delete(){
        $this->render("category/delete");
        /* include "views/layouts/header.php";

         include "views/cart/delete.php";

         include "views/layouts/footer.php";*/
    }
}