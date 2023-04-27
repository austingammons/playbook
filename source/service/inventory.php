<?php

class InventoryService {

    public function get() {
        return array (
            [
                'id' => 123,
                'name' => 'Paint Sprayer',
                'is_available' => true,
                'cost' => 549.99
            ],
            [
                'id' => 142,
                'name' => 'Car Keys',
                'is_available' => false,
                'cost' => 0
            ],
            [
                'id' => 121,
                'name' => 'Shovel',
                'is_available' => true,
                'cost' => 49.99
            ],
        );
    }

    public function get_by($id) {
        return array (
            'id' => $id,
            'name' => 'Paint Sprayer',
            'is_available' => true,
            'cost' => 549.99
        );
    }

    public function post($data) {
        // 
    }

    public function put($data, $id) {
        // 
    }

    public function patch($data, $id) {
        // 
    }

    public function delete($id) {
        // 
    }

}