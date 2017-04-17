<?php

require_once ("PDFParserClass.php");

function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a > $b) ? -1 : 1;
}

class elem
{
	public $value;
	public $count;

	function __construct($value, $count)
	{
		$this->value = $value;
		$this->count = $count;
	}
}

class DataStoreClass implements JsonSerializable
{
	public $mWordStringToFrequencyMap;

	public $mWordStringToPapersListMap; // word to map of name to paper object
	public $mDoiAbstractMap;
	public $mDoiBibtexMap;
	// constructor
	public function __construct()
	{
		$this->mWordStringToFrequencyMap = array();
		$this->mWordStringToPapersListMap = array();
		$this->mDoiBibtexMap = array();
		$this->mDoiAbstractMap = array();
	}

	public function addPaper($paper)
	{
		// might use the PDFDownloader class in here
		// convert paper to text and calculate frequency account
		$pdfParser = new PDFParser();
		$words = $pdfParser->convertPDFToText($paper->mPDFLocalURL);
		foreach($words as $word)
		{
			$this->addWordStringToFrequencyMap(strtolower($word));
			$this->addWordStringToPapersListmap(strtolower($word),$paper);
			// echo $word."\n";
		}
		$this->mDoiAbstractMap[$paper->mDoi] = $paper->mAbstract;
		$this->mDoiBibtexMap[$paper->mDoi] = $paper->mBibtex;
	}

	// encapsulation methods, get and set maps
	public function getWordStringToFrequencyMap()
	{
		return $this->mWordStringToFrequencyMap;
	}

	public function addWordStringToFrequencyMap($word)
	{

		{
			if (array_key_exists($word, $this->mWordStringToFrequencyMap)) 
			{

				$this->mWordStringToFrequencyMap[$word]+= 1;
			}
			else
			{
				$this->mWordStringToFrequencyMap[$word] = 1;
			}
		} 
		// catch (Exception $e) 
		// {
		// 	//Do nothing
		// 	$this->mWordStringToFrequencyMap[$word]=1;

		// }
		
	}

	public function getWordStringToPapersListMap()
	{
		return $this->mWordStringToPapersListMap;
	}

	public function addWordStringToPapersListmap($word, $paper)
	{
		if (array_key_exists($word, $this->mWordStringToPapersListMap)) 
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
		uasort($this->mWordStringToFrequencyMap, 'cmp');

		$mostFrequentWords = array();

		$counter = 200;
		$counter = min(sizeof($this->mWordStringToFrequencyMap), $counter);
		$i = 0;
		// var_dump($this->mWordStringToFrequencyMap);

		// [ {word : ""} {count : #}, ]
		foreach ($this->mWordStringToFrequencyMap as $key => $value) 
		{
			if (strlen($key) > 2)
			{
				if ($i < $counter)
				{

					$obj = new elem($key, $value);
					// $obj = new elem($key);
					// elem->value = $key;
					// elem->count = $value;

					array_push($mostFrequentWords, $obj);

	    			// array_push($mostFrequentWords, $key => $word);
	    			// $mostFrequentWords[$key] = $value;
	    			$i++;
	    		}
	    		else
	    		{
	    			break;
	    		}
	    	}
		}

		// var_dump($mostFrequentWords);
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
		try 
		{
			return $this->mWordStringToPapersListMap[$word][$paperName]->mPDFLocalURL;
		} 
		catch (Exception $e) 
		{
			return null;
		}
	}

	// return paper url when we have word and paper name
	public function returnAbstract($word, $paperName)
	{
		try 
		{
			return $this->mWordStringToPapersListMap[$word][$paperName]->mAbstract;
		} 
		catch (Exception $e) 
		{
			return null;
		}
	}
	public function returnBibtexFromDoi ($doi)
	{
		return $this->mDoiBibtexMap[$doi];
	}

	public function returnAbstractFromDoi ($doi)
	{
		return $this->mDoiAbstractMap[$doi];
	}

	public function jsonSerialize()
    {
      return get_object_vars($this);
    }
}

?>