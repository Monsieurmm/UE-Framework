<?php
require_once "../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Response;
$response = new Response();

$response->setStatusCode(Response::HTTP_OK);
$response->headers->set('Content-Type', 'text/html');
$response->setContent('<html><title>Response</title><body>Response body</body></html>');

$response->send();