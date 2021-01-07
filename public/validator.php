<?php
require_once '../vendor/autoload.php';

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validation;

$validator = Validation::createValidator();

$constraints = new NotBlank();

$results = $validator->validate('', $constraints);

if (count($results) > 0) {
    /** @var ConstraintViolation $error */
    foreach($results as $error) {
        echo $error->getMessage();
    }
} else {
    echo "is ok";
}