<?php

require_once('../../src/PaperClass.php');

class PaperClassUnitTest extends PHPUnit_Framework_TestCase
{
	// test constructor
	public function testPaperClassConstructor()
	{
		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "url";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$this->assertNotNull($paper);
	}

	// test mPaperName ecapsulation
	public function testGetPaperNameReturnsValidPaperName()
	{
		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "url";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$this->assertEqauls($mPaperName, $paper->getPaperName());
	}

	public function testGetPaperNameReturnsInvalidPaperName()
	{
		$mPaperName = null;
		$mAuthorNames = array();
		$mPDFURLLink = "url";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$this->assertEqauls($mPaperName, $paper->getPaperName());
	}

	// test mAuthorNames encapsulation
	public function testGetAuthorNamesReturnsAuthorNames()
	{
		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "url";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$this->assertEqauls($mAuthorNames, $paper->getAuthorNames());
	}

	public function testAddAuthorNameSingleAddReturnsSingleAuthor()
	{
		$paper = new Ppaer(null, null, null);
		paper->addAuthorName("author");

		$this->assertEquals(1, sizeof($paper->getAuthorNames()));
	}

	public function testAddAuthorNameMultipleAddReturnsMultipleAuthor()
	{
		$paper = new Paper(null, null, null);

		for ($i = 0; $i < 5; ++i)
		{
			paper->addAuthorName("author");
		}

		$this->assertEquals(5, sizeof($paper->getAuthorNames()));
	}

	public function testAddAuthorNameNothingAddedReturnsEmpty()
	{
		$paper = new Paper(null, null, null);
		$this->assertEmpty($paper->getAuthorNames());
	}

	// test mPDFURLLink encapsulation
	public function testGetPDFURLLinkReturnsValidPDFURLLink()
	{
		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = "url";

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$this->assertEqauls($mPDFURLLink, $paper->getPDFURLLink());
	}

	public function testGetPDFURLLinkReturnsInvalidPDFURLink()
	{
		$mPaperName = "Name";
		$mAuthorNames = array();
		$mPDFURLLink = null;

		$paper = new Paper($mPaperName, $mAuthorNames, $mPDFURLLink);

		$this->assertEqauls($mPDFURLLink, $paper->getPDFURLLink());
	}
}

?>