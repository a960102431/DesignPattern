<?php

/*
 * Strategy 
 */

/**
 * 出行旅游
 */
interface TravelInterface {

    public function travel();
}

/**
 * 飞机
 */
class AirPlaneTravel implements TravelInterface {

    public function travel() {
        echo "travel by plane\n";
    }

}

/**
 * 火车
 */
class TrainTravel implements TravelInterface {

    public function travel() {
        echo "travel by train\n";
    }

}

/**
 * 步行
 */
class WalkTravel implements TravelInterface {

    public function travel() {
        echo "travel by walk\n";
    }

}

/**
 * 人
 */
class Person {

    private $_strategy = null;

    public function __construct($strategy) {
        $this->_strategy = $strategy;
    }

    public function setStrategy($strategy) {
        $this->_strategy = $strategy;
    }

    public function travel() {
        $this->_strategy->travel();
    }

}

/**
 * Client
 */
class Client {
    
    public static function main() {
        $airPlay = new AirPlaneTravel();
        $train = new TrainTravel();
        $walk = new WalkTravel();
        $person = new Person($airPlay);
        $person->travel();
        $person->setStrategy($train);
        $person->travel();
        $person->setStrategy($walk);
        $person->travel();
    }
    
}

Client::main();