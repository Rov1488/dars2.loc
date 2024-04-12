<?php


namespace app\models;


class Product extends AppModel
{
    public $attributes = [
        'productCode' => '',
        'productName' => '',
        'productLine' => '',
        'productScale' => '',
        'productVendor' => '',
        'productDescription' => '',
        'quantityInStock' => '',
        'buyPrice' => '',
        'MSRP' => ''
    ];
public function tableName()
{
    return 'products';
}


}