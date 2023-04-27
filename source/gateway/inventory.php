<?php

include('../source/service/inventory.php');

class InventoryGateway {

    function __construct() {

        $this->service = new InventoryService();

    }

    public function process($verb, $id) {

        if (!method_exists($this, $verb)) {

            return http_response(404);

        }

        return call_user_func(array($this, $verb), $id);
    }

    public function GET($id = null) {

        return is_null($id) == true ? $this->service->get() : $this->service->get_by($id);
        
    }

}