<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RequestContext;

/**
 * @Route("/client", Options={"Ouverture":"8-17"})
 * Class ClientController
 * @package App\Controller
 */
class ClientController extends AbstractController
{
    private $request;
    function __construct(RequestContext $requestContext)
    {
        $this->request = $requestContext;
    }

    /**
     * @Route("/info/{firstname}", name="client_firstname", requirements={"firstname"="^[a-z]{1}[a-z -]*[a-z]{1}$"})
     * @param $firstname
     * @return Response
     */
    public function info ($firstname): Response
    {
        $host = $this->request->getHost();
        return $this->render(
            'monTemplate.html.twig',
            ['msg' => 'Bonjour', 'firstname' => $firstname, 'host' => $host]
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