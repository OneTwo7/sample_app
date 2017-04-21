<?php

require_once __DIR__.'/bootstrap.php';

$app = new Silex\Application();

$app->register(new Silex\Provider\AssetServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__.'/Resources/views',
));

require_once __DIR__.'/static_pages_controller.php';

$app->mount('/static_pages', new Acme\StaticPagesControllerProvider());

$app->get('/', function () use($app) {
  return $app['twig']->render('home.twig');
});

$app->get('/signup', function () use($app) {
	return $app['twig']->render('signup.twig');
});

return $app;