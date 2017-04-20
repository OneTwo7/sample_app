<?php
namespace Acme;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class StaticPagesControllerProvider implements ControllerProviderInterface {

	public function connect (Application $app) {
		$controllers = $app['controllers_factory'];

		$controllers->get('/help', function (Application $app) {
			return $app['twig']->render('help.twig');
		});

		$controllers->get('/about', function (Application $app) {
			return $app['twig']->render('about.twig');
		});

		$controllers->get('/contact', function (Application $app) {
			return $app['twig']->render('contact.twig');
		});

		return $controllers;
	}

}
