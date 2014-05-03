<?php

$fh = fopen("detikparse.txt", "r");

while(!feof($fh)){
	$current = trim(fgets($fh));
	$iArray[] = explode("*", $current);
}
$count = count($iArray);
for($x=0; $x<$count; $x++){
	$newArray[$x]["title"] = $iArray[$x][0];
	$newArray[$x]["link"] = $iArray[$x][1];
	}


?>
