<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/login", name="login", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function login(Request $request): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            if ($user->getEmail() === "toto@toto.com" && $user->getPassword() === "password1") {
                return $this->render('auth.html.twig', [
                    'user' => $user
                ]);
            } else {
                return $this->render('login.html.twig', [
                    'form' => $form->createView()
                ]);
            }
        }

        return $this->render('login.html.twig', [
            'form' => $form->createView()
        ]);
    }
}