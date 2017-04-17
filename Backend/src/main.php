<?php 
	// require_once("WebCrawler.php");
	// echo "Hello World\n";

	require_once("MasterLinkClass.php");
	// $url = "http://www.google.com";
	

	# Create a DOM parser object
	$MasterLink = new MasterLinkClass();
	$MasterLink->searchQuery("Miller");
	// $top200WordsArray = $MasterLink->getTop200WordsFromQueryAndNumPapers("Miller", 1);

	var_dump($MasterLink->getWordMap());

	// $crawler = new WebCrawler("ACM");


	// $crawler->getContent($url);
	// $crawler->getPaperContent();
 ?>