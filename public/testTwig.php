<?php
require_once "../vendor/autoload.php";

class Cli {
    private $name;
    public function getName()
    {
        return $name = ('toto');
    }
}
$data = new Cli();

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/views');
$enTwig = new \Twig\Environment($loader);

echo $enTwig->render(
    'monTemplate.html.twig',
    ['msg' => $data]
);