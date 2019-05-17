<?php 
function ft_split($string)
{
	$format = preg_replace('/\s+/', ' ', trim($string));
	$array = [];
	if (empty($format))
		return $array;
	$array = explode(" ", $format);
	sort($array);
	return $array;
}
?>
