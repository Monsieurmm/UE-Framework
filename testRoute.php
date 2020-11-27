<?php
require_once "vendor/autoload.php";

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

$locator = new FileLocator(__DIR__."/config");
$yaml = new YamlFileLoader($locator);
$collection = $yaml->load("routes.yaml");

$context = new RequestContext('', 'GET');
$analyzer = new UrlMatcher($collection, $context);

try {
    $findRoute = $analyzer->match('/client/prenom/{firstname}');
    var_dump($findRoute);
} catch (Exception $e) {
    print($e->getMessage());
}