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
	public $stopWords = array("a", "i" , "0" , "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", "also","although","always","am","among", "amongst", "amoungst", "amount",  "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as",  "at", "back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", "however", "hundred", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", "many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", "neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", "other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", "the", ' ', '');

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

		$os = array("a", "i" , "0" , "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", "also","although","always","am","among", "amongst", "amoungst", "amount",  "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as",  "at", "back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", "however", "hundred", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", "many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", "neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", "other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", "the", ' ', '');

		// var_dump($this->mWordStringToFrequencyMap);

		// [ {word : ""} {count : #}, ]
		foreach ($this->mWordStringToFrequencyMap as $key => $value) 
		{
			$key_string = trim((string)$key);

			if (!in_array($key_string, $os) && strlen($key) > 2)
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