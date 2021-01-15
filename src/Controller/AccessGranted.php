<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AccessGranted extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * SecurityService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

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

                $user = new User();

                $form = $this->createForm(UserType::class, $user, [
                    'action' => $this->generateUrl('home'),
                    'method' => 'POST'
                ]);

                $form->handleRequest($request);

                $this->em->persist($user);
                $this->em->flush();

                return $this->redirectToRoute('getUsers');
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