<?php

class Basket {
    var $basket_name;
    var $items = array();

    function __construct($name) {
        $this->basket_name = $name;
        if (isset($_SESSION[$this->basket_name])) {
            $this->items = $_SESSION[$this->basket_name];
        }        
    }

    function setItem($id, $name, $category, $price, $quantity) {
        $this->items[$id] = array(
            'name' => $name,
            'category' => $category,
            'price' => $price,
            'quantity' => $quantity
        );
    }

    function setItemQuantity($id, $quantity) {
        $this->items[$id]['quantity'] = $quantity;
    }

    function getItemPrice($id) {
        return (float) $this->items[$id]['price'];
    }

    function getItemName($id) {
        return $this->items[$id]['name'];
    }

    function getItems() {
        return $this->items;
    }

    function hasItems() {
        return (bool) $this->items;
    }

    function getItemQuantity($id) {
        return (int) $this->items[$id]['quantity'];
    }

    function clean() {
        foreach ($this->items as $id => $item) {
            if ($item['quantity'] < 1) {
                unset($this->items[$id]);
            }
        }
    }

    function save() {
        $this->clean();
        $_SESSION[$this->basket_name] = $this->items;
    }
}

?>