#!/usr/bin/php

<?PHP


function my_add($p1, $p2)
{
	return $p1 + $p2;
}

print("Hello\n");

$my_var = 42;
$my_str = "World";
//$my_tab = array("zero", "un", "deux");
$my_tab = explode(";", "zero;un;deux");
$my_hash = array("key1" => "val1", "key2" => "val2");

// echo "$my_var\n$my_str";


$result = "21" + "21";
//echo "$result\n";

$my_tab[0] = "00";

//echo $my_tab[0];
//echo "\n";
//echo $my_hash["key1"]."\n";

//echo "$my_tab\n\n";

//print_r($my_tab);

//echo my_add("36", "6");

if ($my_tab[1] == "un")
{
	echo "OK\n";
}
else
echo "KO";

echo "$argc\n";
print_r($my_tab);

foreach ($my_tab as $elem)
{
	echo "$elem\n";
}




?>
