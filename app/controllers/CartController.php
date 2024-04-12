<?php


namespace app\controllers;


class CartController extends AppController
{

    public function Lists(){

        $this->render("cart/lists");
    }
    public function add(){

        $this->render("cart/add");
    }
    public function update(){
        $this->render("cart/update");
    }
    public function view(){

        $this->render("cart/view");
    }
    public function delete(){
        $this->render("cart/delete");
       /* include "views/layouts/header.php";

        include "views/cart/delete.php";

        include "views/layouts/footer.php";*/
    }


}