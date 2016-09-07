<?php

/**
 *	@descrpition Bridge ге╫сдёй╫
 *
 */

/**
 * @description Pen
 */
abstract class Pen {
	
	protected $color = null;
	
	public function setColor(Color $color) {
		$this->color = $color;
	}
	
	public function draw() {
		
	}
	
}

/**
 * @description pen with draw
 */
class BigPen extends Pen {
	 
	public function draw() {
		echo "BigPen with" . $this->color->getColor() . "\n";
	}
	 
}

class MiddlePen extends Pen {
	 
	public function draw() {
		echo "MiddlePen with" . $this->color->getColor() . "\n";
	}
	 
}

class SmallPen extends Pen {
	 
	public function draw() {
		echo "SmallPen with" . $this->color->getColor() . "\n";
	}
	 
}

/**
 * @description Color
 */
abstract class Color {
	
	public function getColor() {
		
	}
	
}

class Red extends Color {
	
	public function getColor() {
		return 'red';
	}
	
}

class Blue extends Color {
	
	public function getColor() {
		return 'blue';
	}
	
}

class Green extends Color {
	
	public function getColor() {
		return 'green';
	}
	
}


/**
 * client
 */
class Client {
    
    public static function main() {
        $color = new Red();
		$green = new Green();
		$blue = new Blue();
		$pen = new BigPen();
		$pen->setColor($color);
		$pen->draw();
		$pen = new SmallPen();
		$pen->setColor($green);
		$pen->draw();
		$pen = new MiddlePen();
		$pen->setColor($blue);
		$pen->draw();
		
    }
    
}

Client::main();
?>