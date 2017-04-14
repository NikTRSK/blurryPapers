<?php

session_start(); // This has to be on the top. Initializes a session
error_reporting(E_ERROR | E_PARSE);

// import statements
require('MasterLinkClass.php');

// returns top 200 words with given query and number of papers
if ( $_GET["query"] && $_GET["paperCount"] ) 
{
	$masterLink = new MasterLinkClass();
	$top200WordsArray = $masterLink->getTop200WordsFromQueryAndNumPapers($_GET["query"], $_GET["paperCount"]);
	$_SESSION["masterLink"] = serialize($masterLink);
	echo json_encode($top200WordsArray, JSON_PRETTY_PRINT);
}
// returns list of papers with word
else if ( isset($_GET["word"]) ) 
{
	$masterLink = unserialize($_SESSION["masterLink"]);
	$papersList = $masterLink->getPapersWithWord($_GET["word"]);
	$_SESSION["masterLink"] = serialize($masterLink);
	echo json_encode($papersList, JSON_PRETTY_PRINT);
}
// returns bibtex given doi
else if ( isset($_GET["doiBibtex"]) ) 
{
	$masterLink = unserialize($_SESSION["masterLink"]);
	$bibtex = $masterLink->getBibtexFromDoi($_GET["doiBibtex"]);
	$_SESSION["masterLink"] = serialize($masterLink);
	echo json_encode($bibtex, JSON_PRETTY_PRINT);
}
// returns abstract given doi
else if ( isset($_GET["doiAbstract"]) ) 
{
	$masterLink = unserialize($_SESSION["masterLink"]);
	$abstract = $masterLink->getAbstractFromDoi($_GET["doiAbstract"]);
	$_SESSION["masterLink"] = serialize($masterLink);
	echo json_encode($abstract, JSON_PRETTY_PRINT);
}
else 
{
  echo "lyricsBorne API\nInvalid query\n";
}

?>