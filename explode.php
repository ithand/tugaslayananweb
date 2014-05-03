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
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DETIK</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
	<h1>Detik berita bola dalam dan luar negri</h1>
	<?php
	$output = '';
	foreach($newArray as $new){
		/*echo '<div class="video">';
		echo '<img src ="' .$new['imageSrc'] . '" alt="detik image">';
		echo '<a href="' . $new['link'] . '"><h4>' . $new['title'] . '</h4></a>';*/

	
	echo '<table border="0" cellpadding="1" cellspacing="2">';
	echo '<tr class="row">';
	echo '<td class="col"><a href="' .$new['link']. '"><h5>' .$new['title']. '</h5></a></td>';
	//echo '<td class="own"><a href="' .$new['ownerLink']. '"><h6>' .$new['owner']. '</h6></a></td>';
	//cho '<td class="dur">' .$new['duration']. '</td>';
	echo '</tr>';
	echo '</table>';
	}

	?>
	</div>
</body>
</html>
