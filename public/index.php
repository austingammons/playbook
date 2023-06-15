<?php

ini_set("allow_url_fopen", true);

include('../source/includes.php');

$filtered_request_uri = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);

$request_uri = explode('/', $filtered_request_uri);
$request_method = $_SERVER['REQUEST_METHOD'];



$uri_parts = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$path = array_slice($uri_parts, -2, 2);
$folder = $path[0];
$file = explode('?', $path[1]);
$parameters = [];

if (count($file) == 0) {

    page_error("page not found", 404);

} else if (count($file) == 1) {

    // no parameters

} else if (count($file) > 1) {

    $query_parameters = explode('&', $file[1]);

    if (count($query_parameters)) {

        foreach ($query_parameters as $index => $query_parameter) {
            
            $name_value_pair = explode('=', $query_parameter);
            $parameters[$name_value_pair[0]] = $name_value_pair[1];

        }

    }

}

$body = json_decode(file_get_contents('php://input'), true);

$requested_gateway = strtolower($file[0]);

$id = null;

if (array_key_exists(5, $request_uri)) {
    $id = $request_uri[5] == '' ? null : filter_var($request_uri[5], FILTER_SANITIZE_NUMBER_INT);
}

$service = null;

$allowed_gateways = ['inventory', 'item'];

if (!in_array($requested_gateway, $allowed_gateways)) {
    http_response_code(404);
}

// this requested_gateway may need more security
switch ($requested_gateway) {
    case 'inventory':
        require('../source/gateway/'.$requested_gateway.'.php');
        $service = new InventoryGateway();
        break;
    case 'item':
        require('../source/gateway/'.$requested_gateway.'.php');
        $service = new ItemGateway();
        break;
    
    default:
        http_response_code(404);
        exit;
        break;
}

$result = $service->process($request_method, $id, $body, $parameters);
$json_result = json_encode($result, JSON_PRETTY_PRINT);

echo $json_result;
