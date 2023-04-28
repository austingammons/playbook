<?php

$filtered_request_uri = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);

$request_uri = explode('/', $filtered_request_uri);
$request_method = $_SERVER['REQUEST_METHOD'];
$body = file_get_contents('php://input');

$requested_gateway = strtolower($request_uri[4]);

$id = null;

if (array_key_exists(5, $request_uri)) {
    $id = $request_uri[5] == '' ? null : filter_var($request_uri[5], FILTER_SANITIZE_NUMBER_INT);
}

$service = null;

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

$result = $service->process($request_method, $id, $body);
$json_result = json_encode($result);

echo $json_result;