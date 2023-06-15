<?php

class ItemGateway extends BaseGateway {

    function __construct() {

        $this->service = new ItemService();

    }

    public function GET($args) {


        $copmany_guid = "";
        $inventory_guid = "";
        $item_guid = "";

        if (array_key_exists('company_guid', $args['parameters'])) {

            $company_guid = $args['parameters']['company_guid'];

        } else {

            return $this->error_response(400, get_class(), "required parameter company_guid was not provided");

        }

        if (array_key_exists('inventory_guid', $args['parameters'])) {

            $inventory_guid = $args['parameters']['inventory_guid'];

        } else {

            return $this->error_response(400, get_class(), "required parameter inventory_guid was not provided");

        }

        if (array_key_exists('item_guid', $args['parameters'])) {

            $item_guid = $args['parameters']['item_guid'];

        }

        return empty($item_guid) == true ? $this->service->get_all($company_guid, $inventory_guid) : $this->service->get_by($company_guid, $inventory_guid, $item_guid);

    }

    
    public function POST($id, $body) {

        $this->has_required_parameters($id, $body);

        $result = $this->service->create($body);

        if ($result) {

            return http_response_code(201);

        } else {

            return http_response_code(500);

        }
        
    }

    public function PUT($id, $body) {

        // For a PUT request: HTTP 200, HTTP 204 should imply "resource updated successfully". HTTP 201 if the PUT request created a new resource.

        if (is_null($id) || empty($body)) return http_response_code(400);

        $result = $this->service->update($body);

        if ($result) {

            return http_response_code(201);

        } else {

            return http_response_code(500);

        }
        
    }

    public function DELETE($id) {

        // A 202 ( Accepted ) status code if the action will likely succeed but has not yet been enacted. 
        // A 204 ( No Content ) status code if the action has been enacted and no further information is to be supplied

        if (is_null($id)) return http_response_code(400);

        $result = $this->service->delete($body);

        if ($result) {

            return http_response_code(201);

        } else {

            return http_response_code(500);

        }
        
    }

}