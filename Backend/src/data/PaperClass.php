<?php

// Paper class
class Paper
{
	// private member variables
	private $mPaperName;
	private $mAuthorNames;
	private $mPDFURLLink;

	// constructor
	public function __construct($paperName, $authorNames, $pdfURLLink) 
	{
		$this->mPaperName = $paperName;
		$this->mAuthorNames = $authorNames;
		$this->mPDFURLLink = $pdfURLLink;
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