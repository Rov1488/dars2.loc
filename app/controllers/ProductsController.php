<?php


namespace app\controllers;


use app\models\Product;
use core\Request;
use core\libs\Pagination;

class ProductsController extends AppController
{

    public function lists($id = null){
        $getId = $id;

        $product = new Product();
        $columnName = $product->getColumnNames();

        $request = new Request();
        $sortAttr = (isset($request->sorType)) ? $request->sorType : 'asc';//тип сортировки из GET параметра "desc" or "asc"

        //Pagination setting
        $total = $product->getCount("products");//DB ma'lumotlar soni
        $perpage = $product->getPageCount();//bitta betda chiqadigan ma'lumotlar soni formula orqali
        $pagination = new Pagination($perpage, $total);//pagination klass
        $offset = $pagination->getStart();//Метод расчета текущие страници по формуле
        $result = $product->getListSort($offset);// kerakli pageda $offset bo'yicha ma'lumot olish


        $this->render("product/lists" , [
            "list" => $result, "id" => $getId,
            'pagination' => $pagination,
            'offset' => $offset,
            'total' => $total,
            'sortAttr' =>$sortAttr,
            'columnName' => $columnName
        ]);
    }
    public function add(){
        if (isset($_POST) && !empty($_POST)){

        }

        $this->render("product/add");
    }
    public function update(){
        $this->render("product/update");
    }
    public function view(){

        $this->render("product/view");
    }
    public function delete(){
        $this->render("product/delete");

        /* include "views/layouts/header.php";

         include "views/cart/delete.php";

         include "views/layouts/footer.php";*/
    }
}