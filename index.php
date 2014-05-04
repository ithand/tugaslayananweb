<?php
require_once 'xpath.php';
set_time_limit(0);
$startUrl = "http://www.detik.com/";

// anchor title "//div[@class='yt-lockup-content']//h3[@class='yt-lockup-title']/a/text()"
// anchor title link "//div[@class='yt-lockup-content']//h3[@class='yt-lockup-title']/a/@href"
function scrapeDetik($url){
	$baseUrl = "http://www.detik.com";
	$array = array();
	$xpath = new XPATH($url);	

	//$imageSrcQuery = $xpath->query("//td[@class = 'pl-video-thumbnail'] //span[@class = 'yt-thumb-clip']//img/@src");
	$linkTitleQuery = $xpath->query("//div[@class='yt-lockup-content']//h3[@class='yt-lockup-title']/a/text()");
	$linkHrefQuery = $xpath->query("//div[@class='yt-lockup-content']//h3[@class='yt-lockup-title']/a/@href");
	//$linkOwnerQuery = $xpath->query("//td[@class='pl-video-owner']/a/text()");
	//$linkOwnerHrefQuery = $xpath->query("//td[@class='pl-video-owner']/a/@href");
	//$linkTimestampQuery = $xpath->query("//div[@class='timestamp']");

	$fh = fopen("detikparse.txt", "a+");
	for($x=0; $x<$linkHrefQuery->length; $x++){

		//$string = $array[$x]['imageSrc'] = $imageSrcQuery->item($x)->nodeValue ."*";
		$string .= $array[$x]['linkTitle'] = $linkTitleQuery->item($x)->nodeValue ."*";
		$string .= $array[$x]['linkHref'] = $baseUrl . $linkHrefQuery->item($x)->nodeValue ."*";
		//$string .= $array[$x]['linkOwner'] = $linkOwnerQuery->item($x)->nodeValue ."*";
		//$string .= $array[$x]['linkOwnerHref'] = $baseUrl . $linkOwnerHrefQuery->item($x)->nodeValue ."*";
		//$string .= $array[$x]['linkTimestamp'] = $linkTimestampQuery->item($x)->nodeValue ."*";

		fwrite($fh, $string ."\n");
		//$array[$x]['imageSrc'] = $imageSrcQuery->item($x)->nodeValue;
		//$array[$x]['linkTitle'] = $linkTitleQuery->item($x)->nodeValue;
		//$array[$x]['linkHref'] = $baseUrl . $linkHrefQuery->item($x)->nodeValue;
		//$array[$x]['linkOwner'] = $linkOwnerQuery->item($x)->nodeValue;
		//$array[$x]['linkOwnerHref'] = $baseUrl . $linkOwnerHrefQuery->item($x)->nodeValue;
		//$array[$x]['linkTimestamp'] = $linkTimestampQuery->item($x)->nodeValue;
	}
	fclose($fh);
	return $array;
}

$data = scrapeDetik("http://www.detik.com");
