#!/usr/bin/php
<?php

date_default_timezone_set("America/Los_Angeles");

$fd = fopen("/var/run/utmpx", "rb");
$buffer = fread($fd, 1256);
while (strlen($buffer = fread($fd, 628)) === 628)
{	
	$info = unpack("a256user/a4id/a32term/ipid/stype/s/itime/imicro/a256host", $buffer);
	echo $info["user"]."   ".$info["term"]."  ".date("M d H:i", $info["time"])."\n";
}
?>
