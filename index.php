<?php
require_once 'xpath.php';
set_time_limit(0);
$startUrl = "http://www.detik.com/";

// anchor title "//div[@class='yt-lockup-content']//h3[@class='yt-lockup-title']/a/text()"
// anchor title link "//div[@class='yt-lockup-content']//h3[@class='yt-lockup-title']/a/@href"
//read the xml source as string
$str = file_get_contents ("imoracle.xml")
