<?php
use App\Controller\ClientController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('client_firstname', '/client/prenom/{firstname}')
        ->controller([ClientController::class, 'info'])
        ->methods(['GET']);
};