<?php
require 'vendor/autoload.php';

$http = new \GuzzleHttp\Client;

$response = $http->post('http://localhost:8886/oauth/token', [
    'form_params' => [
        'client_id' => '3',
        'client_secret' =>'Btcm3ojIkUhLeyJ9PsoRsdjqvPWQORxjCtUP56Un', //'Btcm3ojIkUhLeyJ9PsoRsdjqvPWQORxjCtUP56Un',//passport
        'grant_type' => 'authorization_code',
        'redirect_uri' => 'http://localhost:9988/callback.php',
        'code' =>$_GET['code'],
    ],
]);
print"<pre>";
print_r(json_decode((string) $response->getBody(), true));
print"</pre>";