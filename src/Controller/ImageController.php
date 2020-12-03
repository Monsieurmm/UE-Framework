<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/img")
 * Class ImageController
 * @package App\Controller
 */
class ImageController extends AbstractController
{
    /**
     * @Route("/home", name="image_controller")
     * @return Response
     */
    public function home(): Response
    {
        $title = "Site Image";

        return $this->render(
            'img/home.html.twig',
            ['title' => $title]
        );
    }

    /**
     * @Route("/data/{image}")
     * @return Response
     */
    public function affiche($image): Response
    {
        return new BinaryFileResponse(__DIR__."/../../images/$image.jpg", 200, ['Content-Type' => 'image/jpg']);
    }
}