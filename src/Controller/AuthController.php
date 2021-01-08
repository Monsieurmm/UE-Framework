<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class AuthController extends AbstractController
{
    /**
     * @Route("/login", name="auth_login")
     * @param Request $request
     * @return Response
     */
    public function login(Request $request): Response
    {
        $builder = $this->createFormBuilder();

        $constraint = new NotBlank();

        $builder->add('name', TextType::class,[
            'constraints' => [$constraint, new Length(['min' => 2, 'minMessage' => 'Too short only {{ value }} chars instead of {{ limit }}'])]
        ])
            ->add('btSubmit', SubmitType::class);

        $form = $builder->getForm();


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->forward('App\Controller\AuthController::message');
        } else {
            $renderInto = $form->createView();

            return $this->render('login.html.twig', [
                'formInfo' => $renderInto
            ]);
        }
    }

    /**
     * @Route("/welcome", name="welcome")
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function message (TranslatorInterface $translator)
    {
        return new Response ($translator->trans("Welcome"));
    }
}