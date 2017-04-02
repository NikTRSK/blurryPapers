<?php

use PHPUnit\Framework\TestCase;

class WebCrawelrClassUnitTest extends TestCase
{
	// test constructor
	public function testWebCrawlerClassConstructor()
	{
		$webCrawler = new WebCrawler();

		$this->assertNotNull($webCrawler);
	}

	// test GetSearchQueryContent function
	public function testGetSearchQueryContent()
	{

	}
}

?>