<?php

namespace DesignPattern;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Singleton {

    static private $_instance = null;

    private function __construct() {
        
    }

    static public function getInstance() {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getInfo() {
        echo 'Singleton';
    }

}

/**
 * 单件可以有多个实例
 */
class User {

    static private $_instance = array();
    private $_uid = array();

    private function __construct($uid) {
        $this->_uid = $uid;
    }

    static public function getInstance($uid) {
        if (!isset(self::$_instance[$uid])) {
            self::$_instance[$uid] = new self($uid);
        }
        return self::$_instance[$uid];
    }

    public function getInfo() {
        echo 'uid is' . $this->_uid . "\n";
    }

}

function test() {
    //Singleton::getInstance()->getInfo();
    User::getInstance('123')->getInfo();
    User::getInstance('321')->getInfo();
}

test();
