<?php

// Paper class
class Paper
{
	// private member variables
	private $mPaperName;
	private $mAuthorNames;
	private $mPDFURLLink;
    private $mPDFLocalURL;

	// constructor
	public function __construct($paperName, $authorNames, $pdfURLLink) 
	{
		$this->mPaperName = $paperName;
        
        if (!is_null($authorNames))
        {
            $this->mAuthorNames = $authorNames;
        }
        else
        {
            $this->mAuthorNames = array();
        }
		
		$this->mPDFURLLink = $pdfURLLink;


        //Downloading the PDF File
        $url  = $pdfURLLink;
        $path = "data/". $paperName. ".pdf";

        $this->mPDFLocalURL = $path;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, $url);

        $data = curl_exec($ch);

        curl_close($ch);

        $result = file_put_contents($path, $data);
    }

    // ecapsulation functions
    public function getPaperName()
    {
    	return $this->mPaperName;
    }

    public function setPaperName($paperName)
    {
    	$this->mPaperName = $paperName;
    }

    public function getAuthorNames()
    {
    	return $this->mAuthorNames;
    }

    public function addAuthorName($authorName)
    {
    	 array_push($this->mAuthorNames, $authorName);
    }

    public function getPDFURLLink()
    {
    	return $this->mPDFURLLink;
    }

    public function setPDFURLLink($pdfURLLink)
    {
    	$this->mPDFURLLink = $pdfURLLink;
    }
}

?>