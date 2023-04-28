<?php

// this is just an example of how to make a request in PHP
// don't try to run this because the .htaccess file redirects all traffic to index.php

$post = [
    'id' => 'user1',
    'name' => 'sample',
];

$ch = curl_init('localhost/projects/playbook/public/index/inventory/123');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$response = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);

// do anything you want with your response
var_dump($response);