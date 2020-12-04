<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class AccessDenied
{
    public function info()
    {
        return new Response("Access denied");
    }
}