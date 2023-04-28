<?php

include('../source/object/item.php');

class InventoryService {

    public function get_all() {

        return array (
            new Item(123, 'Paint Sprayer', 549.99, 1, true),
            new Item(124, 'Brush', 49.19, 4, true),
            new Item(125, 'Bucket', 11.99, 2, true),
            new Item(126, 'Eggshell Blue Paint', 39, 8, true),
        );
    }

    public function get_by($id) {
        return array (
            new Item(999, 'Sample Item', 69.00, 1, true),
        );
    }

    public function create($data) {
        
        return true;

    }

    public function update($data, $id) {
        
        return true;

    }

    public function delete($id) {
        
        return true;
        
    }

}