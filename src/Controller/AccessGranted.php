<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccessGranted extends AbstractController
{
    /**
     * @Route("/", Options={"Ouverture":"8-17"}, name="access_granted")
     * @return Response
     */
    public function home()
    {
        return $this->render("accueil/home.html.twig");
    }
}