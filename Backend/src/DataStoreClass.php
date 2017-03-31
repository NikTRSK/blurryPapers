<?php

class DataStoreClass
{
	private $mWordStringToFrequencyMap;
	private $mWordStringToPapersListMap;

	// constructor
	public function __construct()
	{
		$this->mWordStringToFrequencyMap = array("A" => 0);

		$this->$mWordStringToFrequencyMap = array();
		// var_dump($mWordStringToFrequencyMap["A"]);
	}

	public function addPDF($pdfLocalURL)
	{
		// might use the PDFDownloader class in here
	}

	// encapsulation methods, get and set maps
	public function getWordStringToFrequencyMap()
	{
		return $this->$mWordStringToFrequencyMap;
	}

	public function addWordStringToFrequencyMap($word)
	{
		if (in_array($word, $this->$mWordStringToFrequencyMap)) 
		{
			$this->$mWordStringToFrequencyMap[$word] = $this->$mWordStringToFrequencyMap[$word]++;
		}
		else
		{
			$this->$mWordStringToFrequencyMap[$word] = 0;
		}
	}

	public function getWordStringToPapersListMap()
	{
		return $this->$mWordStringToPapersListMap;
	}

	public function addWordStringToPapersListmap($word, $paper)
	{
		if (in_array($word, $this->$mWordStringToPapersListMap)) 
		{
			array_push($this->$mWordStringToPapersListMap[$word], $paper);
		}
		else
		{
			$this->$mWordStringToPapersListMap[$word] = array();
			array_push($this->$mWordStringToPapersListMap[$word], $paper);

		}
	}

	// return 200 words
	public function returnMostFrequentWords()
	{
		sort($this->$mWordStringToFrequencyMap);

		$mostFrequentWords = array();

		foreach ($word as $this->$mWordStringToFrequencyMap) 
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
	public function returnPDFURL($word, $paper)
	{
		return $this->mWordStringToPapersListMap[$word][$paper];
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