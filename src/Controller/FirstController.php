<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FirstController
 * @package App\Controller
 */
class FirstController
{
    /**
     * @Route("/index", name="index")
     * @return Response
     */
    public function response(): Response
    {
        $response = new Response();

        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/html');
        $response->setContent('<html><title>Response</title><body>Response body</body></html>');

        return $response;
    }
}