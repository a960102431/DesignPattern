<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface Person {

    public function welcome();
}

class Foreign {

    public function hello() {
        echo 'hello';
    }

}

class Speaker implements Person {

    private $foregin = null;

    public function __construct($foregin) {
        $this->foregin = $foregin;
    }

    public function welcome() {
        $this->foregin->hello();
    }

}

class Client {

    public static function main() {
        $foregin = new Foreign();
        $speaker = new Speaker($foregin);
        $speaker->welcome();
    }

}

Client::main();
