<?php

use Silex\WebTestCase;

class SiteLayoutTest extends WebTestCase {

  public function createApplication () {
    return require __DIR__.'/../app/app.php';
  }

  public function test_home_page_links () {
    $client = $this->createClient();
	  $crawler = $client->request('GET', '/');
	  $content = "Welcome to the Sample App";

	  $this->assertTrue($client->getResponse()->isSuccessful());
	  $this->assertCount(1, $crawler->filter("h1:contains($content)"));
		$this->assertCount(2, $crawler->filter('a[href="/"]'));
		$this->assertCount(1, $crawler->filter('a[href="/static_pages/help"]'));
		$this->assertCount(1, $crawler->filter('a[href="/static_pages/about"]'));
		$this->assertCount(1, $crawler->filter('a[href="/static_pages/contact"]'));
		$this->assertCount(1, $crawler->filter('a[href="/signup"]'));
  }

  public function test_should_get_signup () {
  	$client = $this->createClient();
	  $crawler = $client->request('GET', '/signup');

	  $this->assertTrue($client->getResponse()->isSuccessful());
	  $this->assertCount(1, $crawler->filter('title:contains("Sign up")'));
  }

}