<?php
$dir = "privdb";
$users_file = "users";
$categories_file = "categories";
$products_dir = "database";




$accounts = array();

$admin = [
	"login" => "masa",
	"passwd" => hash("whirlpool", "thepassword"),
	"isadmin" => 1,
];

$accounts[] = $admin;
$categories = array("6", "big", "test", "waifu", "single");
$products_files = array(
	"6_pack" => "tags: 6\nA real nice 6 pack of websites!", 
	"big site"=> "tags: big\nA reallg big site lol.",
	"test" => "tags: test\na professional and exceptional website",
	"waifu" => "tags: waifu, single\na real nice waifu website!",
);

if (!file_exists($dir))
	mkdir($dir);
if (!file_exists($dir."/".$users_file))
	file_put_contents($dir."/".$users_file, serialize($accounts));
if (!file_exists($dir."/".$categories_file))
	file_put_contents($dir."/".$categories_file, serialize($categories));
if (!file_exists($products_dir))
	mkdir($products_dir);
foreach($products_files as $file => $content)
{
	if (!file_exists($products_dir."/".$file))
		file_put_contents($products_dir."/".$file, "$content");
}
?>
