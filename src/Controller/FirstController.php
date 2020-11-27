<?php


namespace App\Controller;

/**
 * Class FirstController
 * @package App\Controller
 */
class FirstController
{
    public function response(): Response
    {
        $response = new Response();

        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/html');
        $response->setContent('<html><title>Response</title><body>Response body</body></html>');

        return $response;
    }
}