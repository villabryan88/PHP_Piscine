#!/usr/bin/php
<?php

if ($argc == 2)
{
	$ch = curl_init($argv[1]);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$html = curl_exec($ch);

	$html = file_get_contents("test.html");

	preg_match_all("/<img\s+(?:\S+\s+)?src\s+=\s*((?:\"\s*)?\S+(?:\s*\")?)\s*(?:\s\S.*)?>/sUi", $html, $matches); 
	$links = $matches[1];


	$links = preg_replace("/\"?(.*?)\"?/", "$1", $links);
	
	print_r($links);
}
?>
