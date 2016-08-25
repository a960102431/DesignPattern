<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * interface ColorPrototype
 *
 * 
 * */
interface ColorPrototype {

    public function copy();
}

/**
 * class Color
 * 
 */
class Color implements ColorPrototype {

    private $red = 0;
    private $green = 0;
    private $blue = 0;

    public function __construct($red = 0, $green = 0, $blue = 0) {
        $this->red      = $red;
        $this->green    = $green;
        $this->blue     = $blue;
    }

    public function getRed() {
        return $this->red;
    }
    
    public function setRed($red) {
        $this->red = $red;
    }
    
    public function getGreen() {
        return $this->green;
    }
    
    public function setGreen($green) {
        $this->green = $green;
    }
    
    public function getBlue() {
        return $this->blue;
    }
    
    public function setBlue($blue) {
        $this->blue = $blue;
    }
    
    public function display() {
        return $this->red . ',' . $this->green . ',' . $this->blue;
    }
    
    public function copy() {
        return clone $this;
    }
    
}

/**
 * 
 * ColorManager
 */
class ColorManager {
    
    static $colors = array();
    
    public static function addColor($name, $color) {
        self::$colors[$name] = $color;
    }
    
    public static function getColor($name) {
        return self::$colors[$name]->copy();
    }
    
}

/**
 * client
 */
class Client {
    
    public static function main() {
        $color = new Color(123,321,111);
        ColorManager::addColor('color1', $color);
        $color = ColorManager::getColor('color1');
        echo $color->display();
        $color->setBlue(100);
        echo $color->display();
    }
    
}

Client::main();

?>