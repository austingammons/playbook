<?php

$parts = explode('/', $_SERVER['REQUEST_URI']);

$requested_gateway = strtolower($parts[4]);

$id = null;

if (array_key_exists(5, $parts)) {
    $id = $parts[5] == '' ? null : $parts[5];
}

$service = 0;

$allowed_gateways = ['inventory'];

if (!in_array($requested_gateway, $allowed_gateways)) {
    http_response_code(404);
}

switch ($requested_gateway) {
    case 'inventory':
        require('../source/gateway/'.$requested_gateway.'.php');
        $service = new InventoryGateway();
        break;
    
    default:
        http_response_code(404);
        exit;
        break;
}

$result = $service->process($_SERVER['REQUEST_METHOD'], $id);
$json_result = json_encode($result);

echo '<pre>';
print_r($json_result);
echo '</pre>';