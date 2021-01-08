<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AccessGranted extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @param ValidatorInterface $validator
     * @param Request $request
     * @return Response
     */
    public function home(ValidatorInterface $validator, Request $request): Response
    {
        $message = null;
        $user = new User();

        if ($request->isMethod("POST")) {

            $form = $this->createForm(UserType::class, $user);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                if ($user->getEmail() === "toto@toto.com" && $user->getPassword() === "password1") {
                    return $this->render('auth.html.twig', [
                        'user' => $user
                    ]);
                } else {
                    $errors = $validator->validate($form);

                    foreach ($errors as $error) {
                        $message .= $error->getMessage() . " ";
                    }
                }
            } else {
                $errors = $validator->validate($form);

                foreach ($errors as $error) {
                    $message .= $error->getMessage() . " ";
                }
            }
        }

        return $this->render("accueil/home.html.twig", [
            'message' => $message
        ]);
    }
}