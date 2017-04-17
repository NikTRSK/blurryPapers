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
            echo json_encode($paperList);
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
        $url = "http://dl.acm.org/results.cfm?query=". $query ;
        // $this->ACMCrawler->getContent($url);
        // $paperList = $this->ACMCrawler->getPaperContent();
        
        // // add papers and construct all the data
        // $i = 0;
        // foreach ($paperList as $paper)
        // {
        //     $this->mDataStore->addPaper($paper);            
        // }

        // echo json_encode($paperList);

        // if (sizeof($paperList) <= 10)
        // {
        $paper = new Paper("AMNESIA", array("Halfond"), "local", "The use of web applications has become increasingly popular in our routine activities, such as reading the news, paying bills, and shopping on-line. As the availability of these services grows, we are witnessing an increase in the number and sophistication of attacks that target them. In particular, SQL injection, a ...");
        $paper->setConference("Proceeding
ESEC/FSE 2015 Proceedings of the 2015 10th Joint Meeting on Foundations of Software Engineering
Pages 25-37");
        $paper->setDoi("10.1145/2786805.2786836");
        $paper->setBibtex("@inproceedings{Safi:2015:DEA:2786805.2786836,
 author = {Safi, Gholamreza and Shahbazian, Arman and Halfond, William G. J. and Medvidovic, Nenad},
 title = {Detecting Event Anomalies in Event-based Systems},
 booktitle = {Proceedings of the 2015 10th Joint Meeting on Foundations of Software Engineering},
 series = {ESEC/FSE 2015},
 year = {2015},
 isbn = {978-1-4503-3675-8},
 location = {Bergamo, Italy},
 pages = {25--37},
 numpages = {13},
 url = {http://doi.acm.org/10.1145/2786805.2786836},
 doi = {10.1145/2786805.2786836},
 acmid = {2786836},
 publisher = {ACM},
 address = {New York, NY, USA},
 keywords = {Android application, Event anomaly, Event-based system, Race detection},
} ");
        $this->mDataStore->addPaper($paper);
        // }

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

    public function jsonSerialize()
    {
      return get_object_vars($this);
    }
} 

?>