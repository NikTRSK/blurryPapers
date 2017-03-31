<?php

include ("pdf2text.php");



class PDFParser
{ 
    public function convertPDFToText($pdfLocalURL)
    {
		$a = new PDF2Text();
		$data = $a->parseFile($pdfLocalURL); 
		
		// for debugging purposes
		$my_file = '../rsc/output.txt';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		fwrite($handle, $data); 

		return $data;		
    }
} 

?>