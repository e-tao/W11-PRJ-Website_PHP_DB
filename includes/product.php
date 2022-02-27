<?php

class Product{

    private $pName;
    private $pPrice;
    private $pImg;
    private $pCat;

    public function __construct($pName, $pPrice, $pImg, $pCat)
    {
        $this->pName = $pName;
        $this->pPrice = $pPrice;
        $this->pImg = $pImg;
        $this->pCat = $pCat;
    }

    public function __toString()
    {
        return "<div class=\"product\"><img src=\"{$this->pImg}\" /><p>{$this->pName}</p><p>CAD$ {$this->pPrice}</p></div>";
    }

    public static function display($products)
    {
        $productList = '<div id="pWraper">';
        foreach($products as $product){
            $productList .= $product;
        }

        $productList.='</div>';
        return $productList;
    }

    private function getName() {
        return $this->pName;
    }

    private function getPrice() {
        return $this->pPrice;
    }

    private function getImg() {
        return $this->pImg;
    }

    private function getCat() {
        return $this->pCat;
    }

}