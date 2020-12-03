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
     * @Route("/firstname/{firstname}", name="client_firstname", requirements={"firstname"="^[a-z]{1}[a-z -]*[a-z]{1}$"})
     * @param $firstname
     * @return Response
     */
    public function info ($firstname): Response
    {
        $url = $this->generateUrl('client_picture', ['firstname' => $firstname]);
        return $this->render(
            'monTemplate.html.twig',
            ['msg' => 'Bonjour', 'firstname' => $firstname, 'url' => $url]
        );
    }

    /**
     * @Route("/photo/{firstname}", name="client_picture")
     * @param $firstname
     * @return BinaryFileResponse
     */
    public function picture ($firstname)
    {
        return new BinaryFileResponse(__DIR__ . "/../../images/chat.jpg");
    }

    /**
     * @Route("/show/{firstname}", name="client_show_picture")
     * @param $firstname
     * @return Response
     */
    public function showPicture($firstname)
    {
        return $this->render('_photo.html.twig',
        ['firstname' => $firstname]);
    }
}