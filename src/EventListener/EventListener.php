<?php


namespace App\EventListener;


use App\Controller\AccessDenied;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RouterInterface;

class EventListener
{
    private $router;

    private $controller;

    /**
     * EventListener constructor.
     * @param RouterInterface $router
     * @param AccessDenied $accessDenied
     */
    public function __construct(RouterInterface $router, AccessDenied $accessDenied)
    {
        $this->router = $router;
        $this->controller = $accessDenied;
    }


    public function onKernelController(ControllerEvent $event)
    {

        /** @var RouteCollection $collection */
        $route = $this->router->getRouteCollection()->get("access_granted");
        if ($route !== null && $route->hasOption('Ouverture')) {
            $format = explode("-", $route->getOption('Ouverture'));
            $start = $format[0];
            $end = $format[1];
            $innerTime = date("G");
            if ($innerTime < $start && $innerTime > $end) {
                $event->setController([$this->controller, 'info']);
            }
        }
    }
}