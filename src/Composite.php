<?php

/*
 * @description Composite组合模式
 */

/**
 * 
 * interface Menu
 */
interface MenuInterface {

    public function getName();

    public function display();

    public function getURL();

    public function getItems();

    public function add($menu);

    public function remove($menu);
}

/**
 * class Menu
 */
class Menu implements MenuInterface {

    protected $name = null;
    protected $items = array();
    protected $url = null;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function display() {
        static $align = '|';  
        if($this->getItems()) {  
            //substr($align, strpos($align,));  
            $align .= ' _ _ ';  
        }else{  
            $align .='';  
        }  
        echo $this->name, " \n";  
        foreach($this->items as $name=> $item) {  
            echo $align;  
            $item->display();  
        }
    }

    public function getURL() {
        return $this->url;
    }

    public function getItems() {
        return $this->items;
    }

    final function add($menu) {
        if (!empty($menu)) {
            $this->items[] = $menu;
        }
    }

    final function remove($menu) {
        if (!empty($menu)) {
            $key = array_search($menu, $this->items);
            if ($key != false) {
                unset($this->items[$key]);
            }
        }
    }

}

/**
 * class MenuItem
 */
class MenuItem extends Menu {

    public function __construct($name, $url) {
        $this->name = $name;
        $this->url = $url;
    }

    public function display() {
        echo '<a href="', $this->url, '">' , $this->name, '</a>'."\n";  
    }

}

/**
 * Client
 */
class Client {

    public static function main() {
        $rootMenu = new Menu('root');
        $menuEdit = new Menu('edit');
        $menuCopy = new Menu('copy');
        $menuDelete = new Menu('delete');
        $menuAdd = new Menu('add');
        $rootMenu->add($menuEdit);
        $rootMenu->add($menuCopy);
        $rootMenu->add($menuDelete);
        $rootMenu->add($menuAdd);
        
        $baidu = new MenuItem('one', 'www.baidu.com');
        $youku = new MenuItem('youku', 'www.youku.com');
        $google = new MenuItem('google', 'www.google.com');
        $sohu = new MenuItem('sohu', 'www.sohu.com');
        $qq = new MenuItem('qq', 'www.qq.com');
        
        $menuCopy->add($baidu);
        $menuEdit->add($youku);
        $menuDelete->add($google);
        $menuDelete->add($sohu);
        $menuAdd->add($qq);
        
        $rootMenu->display();
    }

}

Client::main();