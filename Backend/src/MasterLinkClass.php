<?php
require_once 'DataStoreClass.php';
require_once 'WebCrawler.php';
class MasterLinkClass implements JsonSerializable
{ 
    public $mDataStore;
    public $mWordMap;
    public $query;
    public $ACMCrawler;
    public $IEEECrawler;

    public function  __construct()
    {
        $this->mDataStore = new DataStoreClass();
        $this->ACMCrawler = new WebCrawler("ACM");
        $this->IEEECrawler = new WebCrawler("IEEE");
    }

    public function getDataStore()
    {
        return $this->mDataStore;
    }

    public function getWordMap()
    {
        return $this->mDataStore->returnMostFrequentWords();
    }



    // need to fill this in and story data correctly
     public function getTop200WordsFromQueryAndNumPapers($query, $paperCount)
    {
        // crawl ACM with given query
        $url = "resource/". strtolower($query) . ".xml";

        $xml = file_get_contents($url);
        // echo $xml;
        $mDom = new DOMDocument();
        $mDom->loadXML($xml);
        $finder = new DomXPath($mDom);
        $nodes = $finder->query("//document");
        $i = 0;
        foreach ($nodes as $key) {
            // echo "IMHERE\n";
            $i++;
            if ($i > $paperCount)
            {
                break;
            }

            $title = $finder->query("./title" , $key)->item(0);
            // echo $title->textContent . "\n";

            $authors = $finder->query("./author", $key)->item(0);
            // echo $authors->textContent . "\n";

            $conference = $finder->query("./conference", $key)->item(0);
            // echo $conference->textContent . "\n";

            $abstract = $finder->query("./abstract", $key)->item(0);
            // echo $abstract->textContent . "\n";

            $doi = $finder->query("./doi" ,$key)->item(0);
            // echo $abstract->textContent . "\n";


            $bibtex = $finder->query("./bibtex" ,$key)->item(0);

            $paper = new Paper(trim($title->textContent), trim($authors->textContent), "local", trim($abstract->textContent));
            $paper->setConference(trim($conference->textContent));
            $paper->setDoi(trim($doi->textContent));
            $paper->setBibtex(trim($bibtex->textContent));
            $this->mDataStore->addPaper($paper);
        }
        // return the most frequent words
        return $this->mDataStore->returnMostFrequentWords();
    }

    public function getPapersWithWord($word)
    {
        return $this->mDataStore->returnPapersListForWord($word);
    }

    public function getBibtexFromDoi($doi)
    {
        return $this->mDataStore->returnBibtexFromDoi($doi);
    }

    public function getAbstractFromDoi($doi)
    {
        return $this->mDataStore->returnAbstractFromDoi($doi);
    }

    public function getWordsInSpecificDOIs($dois)
    {
        return $this->mDataStore->returnWordsInSpecificDOIs($dois);
    }

    public function getPapersInConf($conf)
    {
        return $this->mDataStore->returnPapersInConf($conf);
    }

    public function getProgress()
    {
        return 0.5;
    }

    public function highlightPaper($t, $v)
    {
        return 1;
    }

    public function exportPDF()
    {
        return 1;
    }


    public function jsonSerialize()
    {
      return get_object_vars($this);
    }
} 

?>