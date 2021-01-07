<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/hello", options={"Ouverture":"8-17"}, name="hello")
     * @return Response
     */
    public function home()
    {
        return new Response("hello world");
    }
}