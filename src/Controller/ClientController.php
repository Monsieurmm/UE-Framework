<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
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
     * @Route("/prenom/{firstname}", name="client_firstname", methods={"GET"})
     * @param $firstname
     * @return Response
     */
    public function info ($firstname): Response
    {
        if (preg_match("/^[a-z]*+([-])+[a-z]*/", $firstname)) {

            return new Response($firstname, Response::HTTP_OK);
        }

        return new Response("Invalid name", Response::HTTP_BAD_REQUEST);
    }
}