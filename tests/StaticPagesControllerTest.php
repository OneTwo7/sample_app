<?php
use Silex\WebTestCase;

class StaticPagesControllerTest extends WebTestCase {
  public function createApplication () {
    return require __DIR__.'/../web/index.php';
  }

	private function checkTitle ($params_array) {
		$crawler = $params_array['crawler'];
		$title = 'Sample App';
		if (array_key_exists('page', $params_array)) {
			$title = $params_array['page'] . ' | ' . $title;
		}
		$this->assertCount(1, $crawler->filter("title:contains('$title')"));
	}

  public function test_get_home () {
    $client = $this->createClient();
	  $crawler = $client->request('GET', '/');

	  $this->assertTrue($client->getResponse()->isOk());
		$this->checkTitle(array(
			'crawler' => $crawler
		));
  }

	public function test_get_help () {
    $client = $this->createClient();
	  $crawler = $client->request('GET', '/static_pages/help');

	  $this->assertTrue($client->getResponse()->isOk());
		$this->checkTitle(array(
			'crawler' => $crawler,
			'page'    => 'Help'
		));
  }

	public function test_get_about () {
    $client = $this->createClient();
	  $crawler = $client->request('GET', '/static_pages/about');

	  $this->assertTrue($client->getResponse()->isOk());
		$this->checkTitle(array(
			'crawler' => $crawler,
			'page'    => 'About'
		));
  }

  public function test_get_contact () {
    $client = $this->createClient();
	  $crawler = $client->request('GET', '/static_pages/contact');

	  $this->assertTrue($client->getResponse()->isOk());
		$this->checkTitle(array(
			'crawler' => $crawler,
			'page'    => 'Contact'
		));
  }
}
