<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client")
 * Class ClientController
 * @package App\Controller
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/prenom/{firstname}", name="client_firstname", requirements={"firstname"="^[a-z]{1}[a-z -]*[a-z]{1}$"})
     * @param $firstname
     * @return Response
     */
    public function info ($firstname): Response
    {
        return new Response($firstname);
    }
}