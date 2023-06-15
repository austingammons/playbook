<?php

include('../source/object/item.php');

class InventoryService extends BaseService {


    function get_all($company_guid) {
        //$company_guid = 'CB1A5313FAC0E4FF0DFB9A82250587FA';
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_inventories WHERE company_guid = :company_guid");
        $statement->execute(array(':company_guid' => $company_guid));
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function get_by($company_guid, $inventory_guid) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_inventories WHERE inventory_guid = :inventory_guid AND company_guid = :company_guid");
        $statement->execute(array(":inventory_guid" => $inventory_guid, ':company_guid' => $company_guid));
        return $statement->fetch();
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