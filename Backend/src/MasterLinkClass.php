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

        if (strtolower($query) == "halfond")
        {
            $paper = new Paper("AMNESIA: analysis and monitoring for NEutralizing SQL-injection attacks", array("Halfond"), "local", "The use of web applications has become increasingly popular in our routine activities, such as reading the news, paying bills, and shopping on-line. As the availability of these services grows, we are witnessing an increase in the number and sophistication of attacks that target them. In particular, SQL injection, a ...");
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

            $paper = new Paper("An investigation into energy-saving programming practices for Android smartphone app development", array("Halfond"), "local", "Developing energy efficient mobile applications is an impor- tant goal for software developers as energy usage can di- rectly affect the usability of a mobile device. Unfortunately, developers lack guidance as to how to improve the energy efficiency of their implementation and which practices are most useful. In this paper we conducted a small-scale em- pirical evaluation of commonly suggested energy-saving and performance-enhancing coding practices. In the evaluation we evaluated the degree to which these practices were able to save energy as compared to their unoptimized code coun- terparts. Our results provide useful guidance for mobile app developers. In particular, we found that bundling network packets up to a certain size and using certain coding prac- tices for reading array length information, accessing class fields, and performing invocations all led to reduced energy consumption. However, other practices, such as limiting memory usage had a very minimal impact on energy us- age. These results serve to inform the developer community about specific coding practices that can help lower the over- all energy consumption and improve the usability of their applications.");
            $paper->setConference("GREENS 2014 Proceedings of the 3rd International Workshop on Green and Sustainable Software");
            $paper->setDoi("10.1145/2593743.2593750");
            $paper->setBibtex("@inproceedings{Li:2014:IEP:2593743.2593750,
                 author = {Li, Ding and Halfond, William G. J.},
                 title = {An Investigation into Energy-saving Programming Practices for Android Smartphone App Development},
                 booktitle = {Proceedings of the 3rd International Workshop on Green and Sustainable Software},
                 series = {GREENS 2014},
                 year = {2014},
                 isbn = {978-1-4503-2844-9},
                 location = {Hyderabad, India},
                 pages = {46--53},
                 numpages = {8},
                 url = {http://doi.acm.org/10.1145/2593743.2593750},
                 doi = {10.1145/2593743.2593750},
                 acmid = {2593750},
                 publisher = {ACM},
                 address = {New York, NY, USA},
                 keywords = {Energy, Programming patterns},
                } 
                ");
            $this->mDataStore->addPaper($paper);

            $paper = new Paper("Automated Identification of Parameter Mismatches in Web Applications", array("Halfond"), "local", "Energy is a critical resource for apps that run on mobile de- vices. Among all operations, making HTTP requests is one of the most energy consuming. Previous studies have shown that bundling smaller HTTP requests into a single larger HTTP request can be an effective way to improve energy efficiency of network communication, but have not defined an automated way to detect when apps can be bundled nor to transform the apps to do this bundling. In this paper we propose an approach to reduce the energy consumption of HTTP requests in Android apps by automatically detecting and then bundling multiple HTTP requests. Our approach first detects HTTP requests that can be bundled using static analysis, then uses a proxy based technique to bundle HTTP requests at runtime. We evaluated our approach on a set of real world marketplace Android apps. In this evaluation, our approach achieved an average energy reduction of 15% for the subject apps and did not impose a significant runtime overhead on the optimized apps.");
            $paper->setConference("ICSE '16 Proceedings of the 38th International Conference on Software Engineering
                Pages 249-260 ");
            $paper->setDoi("10.1145/2884781.2884867");
            $paper->setBibtex("@inproceedings{Li:2016:AEO:2884781.2884867,
                 author = {Li, Ding and Lyu, Yingjun and Gui, Jiaping and Halfond, William G. J.},
                 title = {Automated Energy Optimization of HTTP Requests for Mobile Applications},
                 booktitle = {Proceedings of the 38th International Conference on Software Engineering},
                 series = {ICSE '16},
                 year = {2016},
                 isbn = {978-1-4503-3900-1},
                 location = {Austin, Texas},
                 pages = {249--260},
                 numpages = {12},
                 url = {http://doi.acm.org/10.1145/2884781.2884867},
                 doi = {10.1145/2884781.2884867},
                 acmid = {2884867},
                 publisher = {ACM},
                 address = {New York, NY, USA},
                 keywords = {HTTP requests, energy optimization, mobile apps},
                }  
                ");
            $this->mDataStore->addPaper($paper);
        }
        else if (strtolower($query) == "jeffrey miller")
        {
            $paper = new Paper("An embedded system for real-time navigation and remote command of a trained canine", array("Jeffrey Miller", "Winard R. Britt", "Paul Waggoner", "David M. Bevly", "John A. Hamilton Jr"), "local", "This paper demonstrates a capability to use a
                    developed embedded sensor suite to consistently track the
                    position, motion behavior, and orientation of a canine.
                    Quantifying and recording canine position and motion in
                    real time provides a useful mechanism for objective analysis
                    of canine trials and missions. We provide a detailed
                    description of the sensor equipment, including the global
                    position satellite (GPS) receiver and antenna, accelerometers,
                    gyroscopes, and magnetometers. Sensors beyond GPS
                    provide for higher frequency readings, a tolerance to GPS
                    loss, and the ability to characterize canine orientation. We
                    demonstrate integrating sensor measurements using an
                    Extended Kalman Filter (EKF) to estimate the canine
                    position and velocity during temporary GPS loss. The
                    system supports the remote actuation of tone and vibration
                    commands and reports commands in real time alongside
                    sensor data. This extends the range at which a handler
                    could monitor a canine and allows enhanced trial analysis
                    using raw sensor data and visualizations. To illustrate the
                    system capabilities, we performed a case study in the
                    remote command and navigation of a trained canine by a
                    professional trainer. The results of this case study are
                    analyzed in terms of canine trial success, motion behavior
                    analysis, and in the context of simulated GPS losses. We
                    discuss other potential applications of the system in
                    autonomous canine command, canine motion analysis, and
                    non-canine applications.");
            $paper->setConference("December 2010 Personal and Ubiquitous Computing: Volume 15 Issue 1, January 2011");
            $paper->setDoi("10.1007/s00779-010-0298-4");
            $paper->setBibtex("@article{Britt:2011:ESR:1937792.1937849,
                 author = {Britt, Winard R. and Miller, Jeffrey and Waggoner, Paul and Bevly, David M. and Hamilton,Jr, John A.},
                 title = {An Embedded System for Real-time Navigation and Remote Command of a Trained Canine},
                 journal = {Personal Ubiquitous Comput.},
                 issue_date = {January   2011},
                 volume = {15},
                 number = {1},
                 month = jan,
                 year = {2011},
                 issn = {1617-4909},
                 pages = {61--74},
                 numpages = {14},
                 url = {http://dx.doi.org/10.1007/s00779-010-0298-4},
                 doi = {10.1007/s00779-010-0298-4},
                 acmid = {1937849},
                 publisher = {Springer-Verlag},
                 address = {London, UK, UK},
                 keywords = {Canine augmentation technology, Canine guidance, Embedded systems, Sensor aggregation, Sensor navigation},
                }");
            $this->mDataStore->addPaper($paper);
        }
        else if(strtolower($query) == "aaron cote")
        {
            $paper = new Paper("Randomized k-server on hierarchical binary trees", array("Aaron Coté", "Adam Meyerson", "Laura Poplawski"), "local", "We design a randomized online algorithm for k-server on binary trees with hierarchical edge lengths, with expected competitive ratio O(log ∆), where ∆ is the diameter of the metric. This is one of the first k-server algorithms with competitive ratio poly-logarithmic in the natural problem parameters, and represents substantial progress on the ran- domized k-server conjecture. Extending the algorithm to trees of higher degree would give a competitive ratio of O(log2 ∆ log n) for the k-server problem on general metrics with n points and diameter ∆.");
            $paper->setConference("May 2008 STOC '08: Proceedings of the fortieth annual ACM symposium on Theory of computing");
            $paper->setDoi("10.1145/1374376.1374411");
            $paper->setBibtex("@inproceedings{Cote:2008:RKH:1374376.1374411,
                 author = {Cot{\'e}, Aaron and Meyerson, Adam and Poplawski, Laura},
                 title = {Randomized K-server on Hierarchical Binary Trees},
                 booktitle = {Proceedings of the Fortieth Annual ACM Symposium on Theory of Computing},
                 series = {STOC '08},
                 year = {2008},
                 isbn = {978-1-60558-047-0},
                 location = {Victoria, British Columbia, Canada},
                 pages = {227--234},
                 numpages = {8},
                 url = {http://doi.acm.org/10.1145/1374376.1374411},
                 doi = {10.1145/1374376.1374411},
                 acmid = {1374411},
                 publisher = {ACM},
                 address = {New York, NY, USA},
                 keywords = {k-server, online competitive analysis},
                } ");
            $this->mDataStore->addPaper($paper);
        }
        else // if smith
        {
            $paper = new Paper("This Way Up", array("Smith, Foulkes"), "local", "A.T. Shank & Son have a bad day at the parlour when a falling boulder flattens their hearse. Emotional and literal pitfalls lie in wait for the odd couple as they make their way cross country with just a coffin for company. This short animated caper puts the fun back into funeral as their journey and relationship unravel on an epic scale.");
            $paper->setConference("December 2008 SIGGRAPH Asia '08: ACM SIGGRAPH ASIA 2008 computer animation festival");
            $paper->setDoi("10.1145/1504271.1504301");
            $paper->setBibtex("@inproceedings{Smith:2008:TWU:1504271.1504301,
                 author = {Smith and Foulkes},
                 title = {This Way Up},
                 booktitle = {ACM SIGGRAPH ASIA 2008 Computer Animation Festival},
                 series = {SIGGRAPH Asia '08},
                 year = {2008},
                 isbn = {978-1-60558-530-7},
                 location = {Singapore},
                 pages = {40--40},
                 numpages = {1},
                 url = {http://doi.acm.org/10.1145/1504271.1504301},
                 doi = {10.1145/1504271.1504301},
                 acmid = {1504301},
                 publisher = {ACM},
                 address = {New York, NY, USA},
                }");
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

    public function jsonSerialize()
    {
      return get_object_vars($this);
    }
} 

?>