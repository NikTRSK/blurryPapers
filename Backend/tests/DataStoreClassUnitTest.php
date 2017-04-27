<?php

use PHPUnit\Framework\TestCase;

class DataStoreClassUnitTest extends TestCase
{

	public function testDataStoreClassConstructor()
	{
		$dataStore = new DataStoreClass();

		$this->assertNotNull($dataStore);
	}

	public function testAddPaperWithValidPDFWordStringToFrequencyMapNotEmpty()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$this->assertNotEmpty($dataStore->mWordStringToFrequencyMap);

		// var_dump($dataStore->mWordStringToFrequencyMap);
	}

	public function testAddPaperWithValidPDFmWordStringToPapersListMapNotEmpty()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$this->assertNotEmpty($dataStore->mWordStringToPapersListMap);
	}

	// public function testAddPaperWithInvalidPDF()
	// {
	// 	$dataStore = new DataStoreClass();

	// 	$mPaperName = "Name";
	// 	$mAuthorNames = array();
	// 	$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";

	// 	$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

	// 	$dataStore->addPaper($paper);

	// 	// what happens if you pass in a address?
	// }

	public function testGetWordStringToFrequencyMapReturnsStringToFrequencyMap()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$mWordStringToFrequencyMap = $dataStore->getWordStringToFrequencyMap();

		$this->assertNotNull($mWordStringToFrequencyMap);
	}

	// // adding stuff check frequency and stuff

	public function testGetWordStringToPapersListMapReturnsWordStringToPapersListMap()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$getWordStringToPapersListMap = $dataStore->getWordStringToPapersListMap();
		
		$this->assertNotNull($getWordStringToPapersListMap);
	}

	// // adding stuff check papers and stuff

	public function testReturnMostFrequentWordsWithEqualToOrMoreThan200WordsInStore()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$mostFrequentWords = $dataStore->returnMostFrequentWords();

		$this->assertEquals(200, sizeof($mostFrequentWords));
	}

	public function testReturnMostFrequentWordsWithLessThan200WordsInStore()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$mostFrequentWords = $dataStore->returnMostFrequentWords();

		$this->assertEquals(200, sizeof($mostFrequentWords));
	}

	public function testReturnMostFrequentWordsInStoreNoStopWords()
	{
		$os = array("a", "i" , "0" , "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", "also","although","always","am","among", "amongst", "amoungst", "amount",  "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as",  "at", "back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", "however", "hundred", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", "many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", "neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", "other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", "the", ' ', '');

		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$mostFrequentWords = $dataStore->returnMostFrequentWords();

		$check = true;
		
		foreach ($mostFrequentWords as $key)
		{
			if (in_array($key, $os))
			{
				$check = false;
				break;
			}
		}

		$this->assertEquals($check, true);
	}

	public function testReturnPapersListForWordValidWordReturnsPapersList()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$papersList = $dataStore->returnPapersListForWord("the");

		$this->assertNotNull($papersList);
	}

	public function testReturnPapersListForWordInvalidWordReturnsNull()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$papersList = $dataStore->returnPapersListForWord("documents");

		$this->assertNotNull($papersList);
	}

	public function testReturnPDFURLValidWordAndValidPaperReturnsPDFURL()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$paperName = $dataStore->returnPDFURL("the", $mPaperName);

		$this->assertNotNull($paperName);
	}

	public function testReturnPDFURLInvalidWordAndValidPaperReturnsNull()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$paperName = $dataStore->returnPDFURL("asdfghjkl", $mPaperName);

		$this->assertNull($paperName);
	}
	public function testReturnAbstractValidWordAndValidPaperReturnsAbstract()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$abstract = $dataStore->returnAbstract("the", $mPaperName);

		$this->assertNotNull($abstract);
	}

	public function testReturnAbstractInvalidWordAndValidPaperReturnsAbstract()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$abstract = $dataStore->returnAbstract("dafkjdfads", $mPaperName);

		$this->assertNull($abstract);
	}

	public function testReturnAbstractValidWordAndInvalidPaperReturnsAbstract()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);

		$dataStore->addPaper($paper);

		$abstract = $dataStore->returnAbstract("the", "kdjafdf");

		$this->assertNull($abstract);		
	}

	public function testReturnAbstractInvalidWordAndInvalidPaperReturnsAbstract()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);

		$dataStore->addPaper($paper);

		$abstract = $dataStore->returnAbstract("dakfjnds", "djkafdjf");

		$this->assertNull($abstract);		
	}

	public function testReturnWordsInSpecificDOIs()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");

		$dataStore->addPaper($paper);

		$mostFrequentWords = $dataStore->returnWordsInSpecificDOIs(array("10.1.10"));


		$this->assertEquals(200, sizeof($mostFrequentWords));
	}

	public function testConference()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setConference("a");

		$dataStore->addPaper($paper);

		$conf = $dataStore->returnPapersInConf("a");


		$this->assertNotNull($conf);
	}

	public function testReturnBibtexFromDOI()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");
		$paper->setBibtex("bibtex");
		
		$dataStore->addPaper($paper);

		$bibtex = $dataStore->returnBibtexFromDoi("10.1.10");
		$this->assertEquals("bibtex",$bibtex);
		// $this->assertEquals(expected, actual);
	}

	public function testReturnAbstractFromDOI()
	{
		$dataStore = new DataStoreClass();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
		$mAbstract = "abstract";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);
		$paper->setDoi("10.1.10");
		$paper->setBibtex("bibtex");
		
		$dataStore->addPaper($paper);

		$abstract = $dataStore->returnAbstractFromDoi("10.1.10");

		$this->assertEquals($abstract, "abstract");
	}

	public function testJsonSeralize()
	{
		$dataStore = new DataStoreClass();

		$json = $dataStore->jsonSerialize();

		$this->assertNotNull($json);
	}

	// public function testReturnPDFURLValidWordAndInvalidPaperReturnsNull()
	// {
	// 	$dataStore = new DataStoreClass();

	// 	$mPaperName = "Name";
	// 	$mAuthorNames = array();
	// 	$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";
	// 	$mAbstract = "abstract";

	// 	$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink, $mAbstract);

	// 	$dataStore->addPaper($paper);

	// 	$abstract = $dataStore->returnPDFURL("the", "kdfjdsf");

	// 	$this->assertNull($paperName);
	// }

	// public function testReturnAbstractInvalidWordAndValidPaperReturnsAbstract()
	// {

	// }

	// public function testReturnAbstractValidWordAndInvalidPaperReturnsAbstract()
	// {
		
	// }

	// public function testReturnAbstractInvalidWordAndInvalidPaperReturnsAbstract()
	// {
		
	// }

	// public function testReturnPDFURLInvalidWordAndInvalidPaperReturnsNull()
	// {
	// 	$dataStore = new DataStoreClass();

	// 	$mPaperName = "Name";
	// 	$mAuthorNames = array();
	// 	$mPDFURLLink = "http://etd.lib.byu.edu/PDFCreation/EditingTextinPDFDocuments.pdf";

	// 	$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

	// 	$dataStore->addPaper($paper);

	// 	$paperName = returnPDFURL("dfdfd", "asfakhfadf");

	// 	$this->assertNull($paperName);
	// }
}

?>