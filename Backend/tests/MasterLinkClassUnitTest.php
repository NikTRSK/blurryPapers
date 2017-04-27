<?php

use PHPUnit\Framework\TestCase;

class MasterLinkClassUnitTest extends TestCase
{
	public $test;

	function __construct()
	{
		$this->test = new MasterLinkClass();
	}

	public function testMasterLinkConstruction()
	{
		$test = new MasterLinkClass();
		$this->assertNotNull($test);
	}

	public function testGetTop200Word()
	{
		// $test = new MasterLinkClass();
		$get = $this->test->getTop200WordsFromQueryAndNumPapers("Halfond", 1);
		$this->assertNotNull($get);
	}

	// public function testSearchQueryACM()
	// {
	// 	$test = new MasterLinkClass();
	// 	$value = $test->searchQuery("Halfond", "ACM");
	// 	$this->assertNotNull($value);
	// }

	public function testGetPaperWithWord()
	{
		$get = $this->test->getTop200WordsFromQueryAndNumPapers("cote", 1);
		$this->assertNotNull($get);
		$value = $this->test->getPapersWithWord("the");
		$this->assertNotNull($value);
	}

	public function testGetBibtexFromDoi()
	{
		$get = $this->test->getTop200WordsFromQueryAndNumPapers("Halfond", 1);
		$this->assertNotNull($get);
		$value = $this->test->getBibtexFromDoi("10.1109/ISSRE.2012.37");
		$this->assertNotNull($value);
	}

	public function testGetAbstractFromDoi()
	{
		$get = $this->test->getTop200WordsFromQueryAndNumPapers("Halfond", 1);
		$this->assertNotNull($get);
		$value = $this->test->getAbstractFromDoi("10.1109/ISSRE.2012.37");
		$this->assertNotNull($value);

	}

	// public function testSearchQueryIEEE()
	// {
	// 	$test = new MasterLinkClass();
	// 	$value = $test->searchQuery("Halfond", "IEEE");
	// 	$this->assertNotNull($value);
	// }

	public function testGetDataStore()
	{
		$get = $this->test->getTop200WordsFromQueryAndNumPapers("Halfond", 1);
		$this->assertNotNull($get);
		// $test = new MasterLinkClass();
		$value = $this->test->getDataStore();

		$this->assertNotNull($value);

		// $this->assertNotNull($test->mDataStore);
	}

	public function testGetWordMap()
	{
		$get = $this->test->getTop200WordsFromQueryAndNumPapers("Halfond", 1);
		$this->assertNotNull($get);
		$value = $this->test->getWordMap();

		$this->assertNotNull($value);
		// $value = $this->test->jsonSerialize();
		// $this->assertNotNull($value);
	}

	public function testJsonSerialize()
	{
		$value = $this->test->jsonSerialize();
		$this->assertNotNull($value);
	}

	public function testGetProgress()
	{
		$test = new MasterLinkClass();
		$value = $test->getTop200WordsFromQueryAndNumPapers("Halfond", "1");

		$this->assertNotNull($test->getProgress());
	}

	public function testGetWordFromDOI()
	{
		$test = new MasterLinkClass();
		$value = $test->getTop200WordsFromQueryAndNumPapers("Halfond", "1");
		$return = $test->getWordsInSpecificDOIs(array("10.1109/ISSRE.2012.37"));
		$this->assertNotNull($return);
	}

	public function testHighlightPaper()
	{
		$test = new MasterLinkClass();
		$value = $test->getTop200WordsFromQueryAndNumPapers("Halfond", "1");

		$test->highlightPaper("10", "the");

		$this->assertNotNull($test);
	}

	public function testExportPDF()
	{
		$test = new MasterLinkClass();
		$value = $test->getTop200WordsFromQueryAndNumPapers("Halfond", "1");
		$test->exportPDF();
		$this->assertNotNull($test);
	}

	public function getPaperInConf()
	{
		$test = new MasterLinkClass();
		$value = $test->getTop200WordsFromQueryAndNumPapers("Halfond", "1");
		$words = $test->getPaperInConf("a");
		$this->assertNotNull($words);
	}


	// public function testGetWordMap()
	// {
	// 	$test = new MasterLinkClass();
	// 	// $value = $test->searchQuery("Halfond", "ACM");

	// 	$this->assertNotNull($value);


	// 	$this->assertNotNull($test->mDataStore);

	// 	$this->assertNotNull($test->mWordMap);
	// }

}

?>