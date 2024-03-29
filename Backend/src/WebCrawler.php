<?php 
	require_once 'data/PaperClass.php';
	require_once 'PDFDownloaderClass.php';
	class WebCrawler implements JsonSerializable
	{
		public $mURL;
		public $mDom; 
		public $mConfig;

		public function __construct($config)
		{
			$this->mConfig = $config;
		}

		function getContent($url)
		{
			if ($this->mConfig == "IEEE")
			{
				$url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?au=Halfond";
				$this->mURL = $url;

				$ch = curl_init();
				$timeout = 20;
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				$html = curl_exec($ch);
				curl_close($ch);

				// echo $html;
				# Create a DOM parser object
				$this->mDom = new DOMDocument();


				# Parse the HTML from html.
				# The @ before the method call suppresses any warnings that
				# loadHTML might throw because of invalid HTML in the page.
				// @JavaScript
				@$this->mDom->loadXML($html);

				// echo $this->mDom->saveHTML();
			}
			if ($this->mConfig == "ACM")
			{
				$url = "http://dl.acm.org/results.cfm?query=Jeffery+Miller";
				// $url = "http://dl.acm.org/results.cfm?query=" . $url;
				$this->mURL = $url;

				$ch = curl_init();
				$timeout = 5;
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				$html = curl_exec($ch);
				curl_close($ch);

				// echo $html;

				# Create a DOM parser object
				$this->mDom = new DOMDocument();

				# Parse the HTML from html.
				# The @ before the method call suppresses any warnings that
				# loadHTML might throw because of invalid HTML in the page.
				@$this->mDom->loadHTML($html);
			}
			
		}



		function getPaperContent()
		{
			// echo $mConfig;
			$paperList = array();
			if ($this->mConfig == "IEEE")
			{
				// echo "HI THERE\n";
				$finder = new DomXPath($this->mDom);
				$nodes = $finder->query("//document");
				foreach ($nodes as $key) {
					// echo "IMHERE\n";
					$title = $finder->query("./title" , $key)->item(0);
					echo $title->textContent . "\n";

					$authors = $finder->query("./authors", $key)->item(0);
					echo $authors->textContent . "\n";

					$conference = $finder->query("./pubtitle", $key)->item(0);
					echo $conference->textContent . "\n";

					$abstract = $finder->query("./abstract", $key)->item(0);
					echo $abstract->textContent . "\n";

					$downloadURL = $finder->query("./pdf" ,$key)->item(0);
					echo $downloadURL->textContent . "\n";

					echo "======================\n";
					// $text = $key->textContent;
					// echo $text . "\n";
				}
			}
			if ($this->mConfig == "ACM")
			{
				$finder = new DomXPath($this->mDom);
				$classname="details";
				$nodes = $finder->query("//*[contains(@class, '$classname')]");
				// $nodes = $finder->query("//*[@class='details']");

				foreach ($nodes as $key) {

					//CRAWL TITLE
					$titleQuery = $finder->query("./*[contains(@class, 'title')]", $key)->item(0);
					$titleQuery1 = $finder->query("./a", $titleQuery)->item(0);
					// $titleText = $finder->query("//a", $title)->item(0);
					$titleText = $titleQuery1->textContent;
					// $tempDom = 

					// echo $titleText."\n";


					// ABSTRACT
					$abstractQuery = $finder->query("./*[contains(@class, 'abstract')]", $key)->item(0);
					$abstractText = $abstractQuery->textContent;
					// echo $abstractText. "\n";

					//URL
					$urlQuery = $finder->query("./*[contains(@class, 'ft')]", $key)->item(0);
					// try {
					if (!$finder->query("./a", $urlQuery)->item(0)) continue;

					$urlQuery1 = $finder->query("./a", $urlQuery)->item(0)->getAttribute('href');
					
					
					$href = "http://dl.acm.org/" . $urlQuery1;
	
				   $curl = curl_init($href);
	
				   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

				   $curl_response = curl_exec($curl);
				   if (curl_errno($curl))
				   {
				   	echo "ERROR";
				   }
				   $redirect_url = curl_getinfo($curl);
				   // echo $redirect_url["redirect_url"];
				   curl_close($curl);

				   $paper = new Paper($titleText, array(), $redirect_url["redirect_url"], $abstractText);

				   array_push($paperList, $paper);

				}
			}
			return $paperList;

			
		}

		public function jsonSerialize()
    	{
      		return get_object_vars($this);
    	}
	}

	

 ?>