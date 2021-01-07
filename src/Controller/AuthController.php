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
            'constraints' => [$constraint, new Length(['min' => 2])]
        ])
            ->add('btSubmit', SubmitType::class);

        $form = $builder->getForm();

        $renderInto = $form->createView();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('auth.html.twig', [
                'data' => $form->getData()
            ]);
        } else {
            return $this->render('login.html.twig', [
                'formInfo' => $renderInto
            ]);
        }
    }
}