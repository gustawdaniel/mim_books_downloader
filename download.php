<?php
/**
 * Daniel Gustaw <gustaw.daniel@gmail.com>
 */
// load list of books
$json = file_get_contents("books.json");

// convert json to array
$array = json_decode($json,1);
$length = count($array);

// print it to debug
var_dump($array);

// for each element
foreach ($array as $key => $value) {
	// download book to variable $tmp
	$tmp = file_get_contents("http://mst.mimuw.edu.pl/wyklady/".$value["code"]."/wyklad.pdf");
	// save book into main directory
	file_put_contents($value["name"].".pdf", $tmp);
	// inform user about progress
	echo "Downoladed ".$key."/".$length."\n";
}