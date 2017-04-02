<?php

use PHPUnit\Framework\TestCase;

class DataStoreClassUnitTest extends TestCase
{

	public function testDataStoreClassConstructor()
	{
		$dataStore = new DataStore();

		$this->assertNotNull($dataStore);
	}

	public function testAddPaperWithValidPDFWordStringToFrequencyMapNotEmpty()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$this->assertNotEmpty($dataStore->mWordStringToFrequencyMap);
	}

	public function testAddPaperWithValidPDFmWordStringToPapersListMapNotEmpty()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$this->assertNotEmpty($dataStore->mWordStringToPapersListMap);
	}

	public function testAddPaperWithInvalidPDF()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		// what happens if you pass in a address?
	}

	public function testGetWordStringToFrequencyMapReturnsStringToFrequencyMap()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$mWordStringToFrequencyMap = $dataStore->getWordStringToFrequencyMap();

		$this->assertNotNull($mWordStringToFrequencyMap);
	}

	// adding stuff check frequency and stuff

	public function testGetWordStringToPapersListMapReturnsWordStringToPapersListMap()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$getWordStringToPapersListMap = $dataStore->getWordStringToPapersListMap();
		
		$this->assertNotNull($getWordStringToPapersListMap);
	}

	// adding stuff check papers and stuff

	public function testReturnMostFrequentWordsWithEqualToOrMoreThan200WordsInStore()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$mostFrequentWords = $dataStore->returnMostFrequentWords();

		$this->assertEquals(200, sizeof($mostFrequentWords));
	}

	public function testReturnMostFrequentWordsWithLessThan200WordsInStore()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/smallpdf.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$mostFrequentWords = $dataStore->returnMostFrequentWords();

		$this->assertEquals(200, sizeof($mostFrequentWords));
	}

	public function testReturnPapersListForWordValidWordReturnsPapersList()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$papersList = returnPapersListForWord("the");

		$this->assertNotNull($papersList);
	}

	public function testReturnPapersListForWordInvalidWordReturnsNull()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$papersList = returnPapersListForWord("kdjafhdf");

		$this->assertNotNull($papersList);
	}

	public function testReturnPDFURLValidWordAndValidPaperReturnsPDFURL()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$paperName = returnPDFURL("the", "example");

		$this->assertNotNull($paperName);
	}

	public function testReturnPDFURLInvalidWordAndValidPaperReturnsNull()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$paperName = returnPDFURL("dklfjasfd", "example");

		$this->assertNull($paperName);
	}

	public function testReturnPDFURLValidWordAndInvalidPaperReturnsNull()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$paperName = returnPDFURL("the", "kdfjdsf");

		$this->assertNull($paperName);
	}

	public function testReturnPDFURLInvalidWordAndInvalidPaperReturnsNull()
	{
		$dataStore = new DataStore();

		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "../../rsc/example.pdf";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$dataStore->addPaper($paper);

		$paperName = returnPDFURL("dfdfd", "asfakhfadf");

		$this->assertNull($paperName);
	}
}

?>