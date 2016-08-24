<?php

/*
 * 创建者模式，将复杂对象的创建分解成各个部分，如肯德基套餐
 */

class Product {

    private $_foods = null;

    public function __construct() {
        $this->_foods = array();
    }

    public function add($key, $value) {
        $this->_foods[$key] = $value;
    }

    public function printProduct() {
        foreach ($this->_foods as $key => $value) {
            echo $key . '    ' . $value . "\n";
        }
    }

}

abstract class Builder {

    public abstract function BuildPart1();

    public abstract function BuildPart2();

    public abstract function getProduct();
}

class AdultBuilder extends Builder {

    private $_product = null;

    public function __construct() {
        $this->_product = new Product();
    }

    public function BuildPart1() {
        $this->_product->add('hambuger', 2);
    }

    public function BuildPart2() {
        $this->_product->add('coke', 1);
    }

    public function getProduct() {
        return $this->_product;
    }

}

class ChildBuilder extends Builder {

    private $_product = null;

    public function __construct() {
        $this->_product = new Product();
    }

    public function BuildPart1() {
        $this->_product->add('hambuger', 1);
    }

    public function BuildPart2() {
        $this->_product->add('chips', 1);
    }

    public function getProduct() {
        return $this->_product;
    }

}

class Director {

    public function buildFood($builder) {
        $builder->BuildPart1();
        $builder->BuildPart2();
        return $builder->getProduct();
    }

}

function test() {
    $director = new Director();
    $adultBuilder = new AdultBuilder();
    $childBuilder = new ChildBuilder();
    $adultProduct = $director->buildFood($adultBuilder);
    $childProduct = $director->buildFood($childBuilder);
    
    $adultProduct->printProduct();
    $childProduct->printProduct();
}

test();