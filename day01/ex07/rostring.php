#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$arr = [];
		$format = preg_replace("/\s+/", " ", trim($argv[1]));
		if(!empty($format))
		{
			$arr = explode(" ", $format);
			array_push($arr, array_shift($arr));
		}
		$i = 0;
		$size = count($arr);
		while($i < $size)
		{
			echo $arr[$i];
			$i++;
			if ($i != $size)
				echo " ";
		}
		echo "\n";
	}
?>
