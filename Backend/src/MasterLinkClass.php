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

    public function searchQuery($query)
    {
        {   
            $url = "http://dl.acm.org/results.cfm?query=".$query;
            // $url = 
            $this->ACMCrawler->getContent($url);
            $paperList = $this->ACMCrawler->getPaperContent();
            foreach ($paperList as $paper)
            {
                $this->mDataStore->addPaper($paper);            
            }
        }

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
        // TODO: Need to account for number of papers to search
        $url = "http://dl.acm.org/results.cfm?query=".$query;
        $this->ACMCrawler->getContent($url);
        $paperList = $this->ACMCrawler->getPaperContent();
        
        // add papers and construct all the data
        foreach ($paperList as $paper)
        {
            $this->mDataStore->addPaper($paper);            
        }

        // return the most frequent words
        return $this->mDataStore->returnMostFrequentWords();
    }

    public function getPapersWithWord($word)
    {
        return $mDataStore->returnPapersListForWord($word);
    }

    public function getBibtexFromDoi($doi)
    {
        return $mDataStore->returnBibtexFromDoi($doi);
    }

    public function getAbstractFromDoi($doi)
    {
        return $mDataStore->returnAbstractFromDoi($doi);
    }

    public function jsonSerialize()
    {
      return get_object_vars($this);
    }
} 

?>