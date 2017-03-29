<?php 

	class WebCrawler
	{
		private $mURL;
		private $mDom; 
		private $mConfig;

		public function __construct($config)
		{
			$this->mConfig = $config;
		}

		function getContent($url)
		{
			if ($this->mConfig == "IEEE")
			{
				$url = "http://ieeexplore.ieee.org:80/search/searchresult.jsp?reload=true&amp;newsearch=true&amp;queryText=Halfond";
				$this->mURL = $url;

				$ch = curl_init();
				$timeout = 20;
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				$html = curl_exec($ch);
				curl_close($ch);

				# Create a DOM parser object
				$this->mDom = new DOMDocument();

				# Parse the HTML from html.
				# The @ before the method call suppresses any warnings that
				# loadHTML might throw because of invalid HTML in the page.
				// @JavaScript
				@$this->mDom->loadHTML($html);

				echo $this->mDom->saveHTML();
			}
			if ($this->mConfig == "ACM")
			{
				$url = "http://dl.acm.org/results.cfm?query=Halfond";
				$this->mURL = $url;

				$ch = curl_init();
				$timeout = 5;
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				$html = curl_exec($ch);
				curl_close($ch);

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
			if ($this->mConfig == "IEEE")
			{
				// echo "HI THERE\n";
				$finder = new DomXPath($this->mDom);
				$classname="ng-binding";
				$nodes = $finder->query("//*[contains(@class, '$classname')]");
				foreach ($nodes as $key) {
					// echo "IMHERE\n";
					$text .= $this->mDom->saveHTML($key);
					echo $text . "\n";
				}
			}
			if ($this->mConfig == "ACM")
			{
				$finder = new DomXPath($this->mDom);
				$classname="title";
				$nodes = $finder->query("//*[contains(@class, '$classname')]");
				foreach ($nodes as $key) {
					$text .= $this->mDom->saveHTML($key);
					echo $text . "\n";
				}
			}
			
		}


	}

	

 ?>