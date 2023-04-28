<?php

include('../source/service/inventory.php');

class InventoryGateway {

    function __construct() {

        $this->service = new InventoryService();

    }

    public function process($verb, $id, $body) {

        if (!method_exists($this, $verb)) {

            return http_response(404);

        }

        return call_user_func(array($this, $verb), $id, $body);
    }

    public function GET($id = null) {

        return is_null($id) == true ? $this->service->get_all() : $this->service->get_by($id);
        
    }

    public function POST($id, $body) {

        if (is_null($id) || empty($body)) return http_response_code(400);

        $result = $this->service->create($body);

        if ($result) {

            return http_response_code(201);

        } else {

            return http_response_code(500);

        }
        
    }

    public function PUT($id, $body) {

        if (is_null($id) || empty($body)) return http_response_code(400);

        $result = $this->service->update($body);

        if ($result) {

            return http_response_code(201);

        } else {

            return http_response_code(500);

        }
        
    }

    public function DELETE($id) {

        if (is_null($id)) return http_response_code(400);

        $result = $this->service->delete($body);

        if ($result) {

            return http_response_code(201);

        } else {

            return http_response_code(500);

        }
        
    }

}