<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Regex([
                        'pattern' => "^([\w\.\-]+)@([\w\-]+)((\.(\w){2,})+)$^",
                        'message' => 'invalid email'
                    ])
                ]
            ])
            ->add('password', PasswordType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Regex([
                        'pattern' => "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$^",
                        'match' => true,
                        'message' => 'invalid password'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
