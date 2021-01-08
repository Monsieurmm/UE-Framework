<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="create_account")
     * @param Request $request
     */
    public function createAccount(Request $request)
    {
        $builder = $this->createFormBuilder();

        $constraint = new NotBlank();

        $builder->add('email', EmailType::class, [
            'constraints' => [$constraint, new Length(['min' => 2])]
        ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Confirm password']
            ])
            ->add('submit', SubmitType::class);

        $form = $builder->getForm();

        $renderForm = $form->createView();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            return $this->render('auth.html.twig', [
                'data' => $form->getData()
            ]);
        } else {
            return $this->render('account.html.twig', [
                'formInfo' => $renderForm
            ]);
        }
    }
}