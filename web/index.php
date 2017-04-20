<?php

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

require_once 'static_pages_controller.php';

$app->mount('/static_pages', new Acme\StaticPagesControllerProvider());

$app->get('/', function () use($app) {
    return $app['twig']->render('home.twig');
});

$app->run();

return $app;
