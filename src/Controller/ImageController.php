<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        return $this->file(__DIR__ . "/../../images/$image.jpg", "image.jpg");
    }

    /**
     * @Route("/files", name="get_files")
     * @return Response
     */
    public function show()
    {
        $listElement = scandir(__DIR__."/../../images/");
        $files = [];

        foreach ($listElement as $item) {
            if ((is_dir($item)) == false) {
                array_push($files, $item);
            }
        }

        return $this->render(
            'partials/dropdown.html.twig',
            ['files' => $files]
        );
    }

    /**
     * @Route("/home", name="show_render")
     */
    public function menu()
    {
        return $this->render(
            'base.html.twig'
        );
    }
}