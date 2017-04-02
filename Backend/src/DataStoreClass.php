<?php

require_once ("PDFParserClass.php");

class DataStoreClass
{
	private $mWordStringToFrequencyMap;
	private $mWordStringToPapersListMap; // word to map of name to paper object

	// constructor
	public function __construct()
	{
		$this->mWordStringToFrequencyMap = array();
		$this->mWordStringToPapersListMap = array();
	}

	public function addPaper($paper)
	{
		// might use the PDFDownloader class in here
		// convert paper to text and calculate frequency account
		$pdfParser = new PDFParser();
		$words = $pdfParser->convertPDFToText($paper->mPDFLocalURL);

		foreach($words as &$word)
		{
			addWordStringToFrequencyMap($word);
			addWordStringToPapersListmap($word, $paper);
		}
	}

	// encapsulation methods, get and set maps
	public function getWordStringToFrequencyMap()
	{
		return $this->mWordStringToFrequencyMap;
	}

	public function addWordStringToFrequencyMap($word)
	{
		if (in_array($word, $this->mWordStringToFrequencyMap)) 
		{
			$this->mWordStringToFrequencyMap[$word]++;
		}
		else
		{
			$this->mWordStringToFrequencyMap[$word] = 1;
		}
	}

	public function getWordStringToPapersListMap()
	{
		return $this->mWordStringToPapersListMap;
	}

	public function addWordStringToPapersListmap($word, $paper)
	{
		if (in_array($word, $this->mWordStringToPapersListMap)) 
		{
			$this->mWordStringToPapersListMap[$word][$paper->mPaperName] = $paper;

		}
		else
		{
			$this->mWordStringToPapersListMap[$word] = array();
			$this->mWordStringToPapersListMap[$word][$paper->mPaperName] = $paper;
		}
	}

	// return 200 words
	public function returnMostFrequentWords()
	{
		sort($this->mWordStringToFrequencyMap);

		$mostFrequentWords = array();

		foreach ($this->mWordStringToFrequencyMap as &$word) 
		{
    		array_push($mostFrequentWords, $word);
		}

		return $mostFrequentWords;
	}

	// return paper results of word search
	public function returnPapersListForWord($word)
	{
		return $this->mWordStringToPapersListMap[$word];
	}

	// return paper url when we have word and paper name
	public function returnPDFURL($word, $paperName)
	{
		return $this->mWordStringToPapersListMap[$word][$paperName]->mPDFLocalURL;
	}


	// James - probably for internal use
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