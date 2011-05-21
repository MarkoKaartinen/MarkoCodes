<?php
//Simple counter to something
//Example: ETA to holiday: 200 days 10 hours 11 minutes

//expected date (YYYY-mm-dd H:i // 2012-04-24 18:44)
$date = "2011-08-14 07:50";

//date to UNIX timestamp
$timestamp = strtotime($date);

//date now in UNIX timestamp
$nowstamp = time();

//difference between two dates
$diff = $timestamp-$nowstamp;

if($diff < 0){
	$diff = $diff * (-1);
	$past = true;
}else{
	$past = false;
}

//diff seconds to minutes
$mins = floor($diff/60);

//full days
$days = floor($mins / 1440);

//full hours
$hours = floor(($mins - $days * 1440) / 60);

//last minutes
$minutes = $mins - ($days * 1440) - ($hours * 60);

//lets do some echo variables
if($days == 1){
	$dayecho = "1 p&auml;iv&auml;"; //1 day
}else{
	$dayecho = "$days p&auml;iv&auml;&auml;"; //x days
}

if($hours == 1){
	$hourecho = "1 tunti"; //1 hour
}else{
	$hourecho = "$hours tuntia"; //x hours
}

if($minutes == 1){
	$minutesecho = "1 minutti"; //1 minute
}else{
	$minutesecho = "$minutes minuuttia"; //x minutes
}

if($past){
	$futureorpast = "sitten"; //ago
}else{
	$futureorpast = "j&auml;ljell&auml;"; //remaining
}

$result = "$dayecho $hourecho $minutesecho $futureorpast";

echo $result;
?>