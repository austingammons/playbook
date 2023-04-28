<?php

class Item {

    public $id;

    public $name;

    public $price;

    public $amount;

    public $is_available;

    function __construct($id, $name, $price, $amount, $is_available) {

        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
        $this->is_available = $is_available;

    }

}