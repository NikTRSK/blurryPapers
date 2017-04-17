<?php

session_start(); // This has to be on the top. Initializes a session
error_reporting(E_ERROR | E_PARSE);

class bibtex
{
	public $bibtex;
}

class abstrac
{	
	public $abstract;
}

class paperReturn
{
	public $title;
	public $authors;
	public $wordFrequency;
	public $downloadLink;
	public $conference;
	public $doi;

	function __construct($paper)
	{
		$this->title = $paper->mPaperName;
		$this->authors = $paper->mAuthorNames;
		$this->wordFrequency = 718;
	    $this->downloadLink = $paper->mPDFLocalURL;
	    $this->conference = array();
	    array_push($this->conference, $paper->mConference);
	    $this->doi = $paper->mDoi;
	}
}
// import statements
require('MasterLinkClass.php');
// echo ($_GET("query"));
// echo $_SERVER['SERVER_NAME'];
// echo htmlspecialchars($_GET["query"]);
// echo htmlspecialchars($_GET["paperCount"]);
// returns top 200 words with given query and number of papers
if ( isset($_GET["query"]) && isset($_GET["paperCount"]) ) 
{
	$masterLink = new MasterLinkClass();
	// $MasterLink->searchQuery($_GET["query"]);
	$top200WordsArray = $masterLink->getTop200WordsFromQueryAndNumPapers($_GET["query"], $_GET["paperCount"]);
	$_SESSION["masterLink"] = serialize($masterLink);

	echo json_encode($top200WordsArray, JSON_PRETTY_PRINT);
}
// returns list of papers with word
else if ( isset($_GET["word"]) ) 
{
	// echo $_SESSION["masterLink"];
	$masterLink = unserialize($_SESSION["masterLink"]);
	// var_dump($masterLink);
	$papersList = $masterLink->getPapersWithWord($_GET["word"]);
	// $_SESSION["masterLink"] = serialize($masterLink);
	$return = array();

	foreach ($papersList as $paper) {
		$temp = new paperReturn($paper);
		array_push($return, $temp);
	}

	echo json_encode($return, JSON_PRETTY_PRINT);
}
// returns bibtex given doi
else if ( isset($_GET["doiBibtex"]) ) 
{
	$masterLink = unserialize($_SESSION["masterLink"]);
	$bibtex = $masterLink->getBibtexFromDoi($_GET["doiBibtex"]);
	// $_SESSION["masterLink"] = serialize($masterLink);
	$result = new bibtex();
	$result->bibtex = $bibtex;
	echo json_encode($result, JSON_PRETTY_PRINT);
}
// returns abstract given doi
else if ( isset($_GET["doiAbstract"]) ) 
{
	$masterLink = unserialize($_SESSION["masterLink"]);
	$abstract = $masterLink->getAbstractFromDoi($_GET["doiAbstract"]);
	// $_SESSION["masterLink"] = serialize($masterLink);
	$result = new abstrac ();
	$result->abstract = $abstract;
	echo json_encode($result, JSON_PRETTY_PRINT);
}
else 
{
  echo "blurry paper API\nInvalid query\n";
}

?>