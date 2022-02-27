<?php

class ProductQuery
{
    public static function getProducts ($pdo)
    {
        $q = $pdo->prepare("SELECT productName, productPrice, productImg, productCat FROM product");
        $q->execute();
        
        $products = array();

        while ($row = $q->fetch()) {
            //var_dump($row);
            $products[] = new Product($row['productName'], $row['productPrice'], $row['productImg'], $row['productCat']);
            //var_dump($products);
        }

        return $products;
    }
}