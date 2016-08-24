<?php

namespace DesignPattern;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 车子
 */
abstract class Vehicle {

    public function getInfo() {
        
    }

}

/**
 * 汽车
 */
class Car extends Vehicle {

    public function getInfo() {
        echo "this is a car\n";
    }

}

/**
 * 卡车
 */
class Truck extends Vehicle {

    public function getInfo() {
        echo "this is a truck\n";
    }

}

/**
 * 简单工厂
 * 缺点:不满足开闭原则
 */
class SimpleFactory {

    static public function create($type) {
        switch ($type) {
            case 1:
                return new Car();break;
            case 2:
                return new Truck();break;
            default :
                break;
        }
    }

}

function testSimpleFactory() {
    $car = SimpleFactory::create(1);
    $truck = SimpleFactory::create(2);
    $car->getInfo();
    $truck->getInfo();
}

/**
 * 工厂方法
 */
interface FactoryInterface {
    function create();
}

class CarFactory implements FactoryInterface{
    public function create() {
        return new Car();
    }
}

class TruckFactory implements FactoryInterface{
    public function create() {
        return new Truck();
    }
}

function testFactoryInterface() {
    $factory = new CarFactory();
    $car = $factory->create();
    $factory = new TruckFactory();
    $truck = $factory->create();
    $car->getInfo();
    $truck->getInfo();
}

testFactoryInterface();