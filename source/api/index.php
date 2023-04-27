<?php

// this acts as the route with the switch case
// this is the gatekeeper
// this news up a service and calls the method

$parts = explode('/', $_SERVER['REQUEST_URI']);

$service = strtolower($parts[1]);

switch ($service) {
    case 'inventory':
        # code...
        break;
    
    default:
        # code... 404
        break;
}