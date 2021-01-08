<?php


namespace App\Controller;


use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @return Response
     */
    public function login(Request $request): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            if (/* data valid */) {
                return $this->render('auth.html.twig', [
                    'data' =>
                ])
            }

        }
    }
}