<?php

use App\Controller\ClientController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('toto', '/client/prenom/{firstname}')
        ->controller([ClientController::class, 'info'])
        ->methods(['GET'])
        ->requirements(['firstname' => '[a-z]{1}[a-z -]*[a-z]{1}$']);
};