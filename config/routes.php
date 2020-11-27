<?php
use App\Controller\FirstController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('index', '/index')
        ->controller([FirstController::class, 'response']);
};