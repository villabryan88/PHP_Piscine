#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');

function get_seconds($s)
{
	$months = array("/^[jJ]anvier$/", "/^[fF]évrier$/", "/^[mM]ars$/","/^[aA]vril$/","/^[mM]ai$/","/^[jJ]uin$/","/^[jJ]uillet$/",
		"/^[aA]oût$/","/^[sS]eptembre$/","/^[oO]ctobre$/","/^[nN]ovembre$/","/^[dD]écembre$/");
	$days = array("/^[Ll]undi$/" ,"/^[Mm]ardi$/" ,"/^[Mm]ercredi$/" ,"/^[Jj]eudi$/" ,"/^[Vv]endredi$/" ,"/^[sS]amedi$/" ,"/^[Dd]imanche$/" );

	$months_eng = array("january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december");
	$days_eng = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	
	$time_split = explode(" ", $s);
	if(count($time_split) != 5)
		return FALSE;
	else
	{
		if (!($time_split[0] = preg_filter($days, $days_eng, $time_split[0])))
			return FALSE;
		if (!preg_match("/^\d\d$/", $time_split[1]))
			return FALSE;
		if (!($time_split[2] = preg_filter($months, $months_eng, $time_split[2])))
			return FALSE;
		if (!preg_match("/^\d\d\d\d$/", $time_split[3]))
			return FALSE;
		if (!preg_match("/^\d\d:\d\d:\d\d$/", $time_split[4]))
			return FALSE;

		return strtotime(implode(" ", $time_split));
	}
	return FALSE;
}


if ($argc == 2)
{
	if (($seconds = get_seconds($argv[1])) !== FALSE)
		echo $seconds."\n";
	else
		echo "Wrong Format"."\n";
}
?>
