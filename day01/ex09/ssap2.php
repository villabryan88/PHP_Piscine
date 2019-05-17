#!/usr/bin/php
<?php
function stupid_ord($c)
{
	$num = ord($c);
	if ($num >= ord("a") && $num <= ord("z"))
		$num -= ord("a");
	else if ($num >= ord("A") && $num <= ord("Z"))
		$num -= ord("A");
	else if ($num >= ord("0") && $num <= ord("9"))
		$num -= ord("0") - 26;
	else
		$num += 36;
	return ($num);
}

function stupid_cmp($a, $b)
{
	$i = 0;
	$lena = strlen($a);
	$lenb = strlen($b);
	$minlen = $lena < $lenb ? $lena : $lenb;

	while ($i < $minlen && stupid_ord($a[$i]) == stupid_ord($b[$i]))
		$i++;
	if ($i < $minlen)
		return stupid_ord($a[$i]) - stupid_ord($b[$i]);
	if ($lena == $lenb)
		return 0;
	if ($i == $lena)
		return 0 - stupid_ord($b[$i]);
	return stupid_ord($a[$i]);
}

$i = 1;
$arr = [];
while ($i < $argc)
{
	$format = preg_replace("/\s+/"," ",trim($argv[$i]));
	if (!empty($format))
		$arr = array_merge($arr, explode(" ", $format));
	$i++;
}
usort($arr, "stupid_cmp");
foreach ($arr as $word)
	echo $word."\n";
?>
