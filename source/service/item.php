<?php

class ItemService extends BaseService {

    function get_all($company_guid, $inventory_guid) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_items WHERE company_guid = :company_guid AND inventory_guid = :inventory_guid");
        $statement->execute(array(':company_guid' => $company_guid, ':inventory_guid' => $inventory_guid));
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function create($body) {
    
    }

    function read($item_guid, $company_guid, $inventory_guid) {
      
    }

    function update($item_guid, $item_name, $item_quantity, $item_type_guid, $inventory_guid, $company_guid) {
      

    }

    function delete($item_guid, $customer_guid, $inventory_guid) {
     
    }

}