<?php 

class PDFDownloader implements JsonSerializable
{ 

    public function downloadPDF($url, $path)
    {
    	$this->mPDFLocalURL = $path;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, $url);

        $data = curl_exec($ch);

        curl_close($ch);

        $result = file_put_contents($path, $data);
    }

    public function jsonSerialize()
    {
      return get_object_vars($this);
    }
} 

?>