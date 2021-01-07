<?php
/*
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Forms;

require_once '../vendor/autoload.php';

$formFactory = Forms::createFormFactory();
$builder = $formFactory->createBuilder();

$builder->add('name', TextType::class);
$builder->add('btnSubmit', SubmitType::class);

$form = $builder->getForm();

$form->handleRequest();

if ($form->isValid() && $form->isSubmitted()) {
    var_dump($form->getData());
}*/
