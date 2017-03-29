<?php

class DataStoreClass
{
	private $mWordStringToFrequencyMap;
	private $mWordStringToPapersListMap;

	// constructor
	public function __construct()
	{
		$this->mWordStringToFrequencyMap = array("A" => 0);
		// var_dump($mWordStringToFrequencyMap["A"]);
	}

	public function addPDF($pdfLocalURL)
	{
		// might use the PDFDownloader class in here
	}

	// encapsulation methods, get and set maps
	public function getWordStringToFrequencyMap()
	{

	}

	public function addWordStringToFrequencyMap($word)
	{

	}

	public function getWordStringToPapersListMap()
	{

	}

	public function addWordStringToPapersListmap($word, $paper)
	{

	}

	// return 200 words
	public function returnMostFrequentWords()
	{

	}

	// return paper results of word search
	public function returnPapersListForWord($word)
	{
		return $this->mWordStringToPapersListMap[$word];
	}

	// return paper url when we have word and paper name
	public function returnPDFURL($word, $paper)
	{

	}

	public function addWord($word)
	{
		$this->mWordStringToFrequencyMap[$word]++;
		// var_dump($mWordStringToFrequencyMap[$word]);
	}

	public function dump()
	{
		var_dump($this->mWordStringToFrequencyMap);
	}
}

?>