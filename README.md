# playbook
Simple PHP RESTful API Project to showcase how you can set up your own API using only PHP

## how it works

- The .htaccess file routes all traffic to playbook/public/index.php
- playbook/public/index.php handles the request by splitting up the URI into parts (gateway, parameters, post body)
- playbook/public/index.php then decides which gateway is needed and news one up
- then we call the process method which is located in source/gateway/gateway.php
   $result = $service->process($request_method, $id, $body, $parameters);

- we package up the parameters and route the request to the gateway method dependent on the verb specified (GET, POST, etc)
- the gateway method is hit (example: source/gateway/inventory/GET) 
- after checking parameters passed in, we decide which service method is called
- the service method makes a database request and a result is returned
- this result is then echoed in playbook/public/index.php which is your curl result

## recent updates

- added Inventory and Item gateways / services to display how data is handled

## public/index.php

- handles routing to end points

## source/gateway

this folder contains gateway files which handle specific requests.

- news up the required service
- process the requested method

## source/service

this folder contains service files which make requests to your database.

- handles data requests to the database
