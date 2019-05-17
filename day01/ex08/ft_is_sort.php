<?php

function ft_is_sort($arr)
{
	$og = $arr;
	sort($arr);
	$size = count($og);

	$i = 0;
	$flag = 1;
	while ($i < $size)
	{
		if ($og[$i] != $arr[$i])
			$flag = 0;
		$i++;
	}
	return ($flag);
}

?>
