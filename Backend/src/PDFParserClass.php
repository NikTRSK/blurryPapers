<?php

require_once ("pdf2text.php");

include 'vendor/autoload.php';

function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

class PDFParser implements JsonSerializable
{ 
    public function convertPDFToText($pdfLocalURL)
    {
		$a = new \Smalot\PdfParser\Parser();
		$pdf = $a->parseFile($pdfLocalURL); 
        $data = $pdf->getText();
		// echo $data;
		// for debugging purposes
		// $my_file = '../rsc/output.txt';
		// $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		// fwrite($handle, $data); 

		$pieces = multiexplode(array("\n"," ","\t", "\r"), $data);


		return $pieces;		
    }

    public function jsonSerialize()
    {
      return get_object_vars($this);
    }
} 

?>