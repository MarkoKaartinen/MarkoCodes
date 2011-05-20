<!DOCTYPE html>
<html lang="fi">
<head>
	<meta charset="utf-8">
	<title>Cal</title>
</head>
<body>

<?php
$month = $_GET['m'];
$year = $_GET['year'];
if($month == ""){ $month = date("m"); }
if($year == ""){ $year = date("Y"); }

$currentDay = date("d");

if(strlen($month) == 1){
	$month = "0".$month;
}

//days of week monday to sunday
$days[1] = "Maanantai";
$days[2] = "Tiistai";
$days[3] = "Keskiviikko";
$days[4] = "Torstai";
$days[5] = "Perjantai";
$days[6] = "Lauantai";
$days[7] = "Sunnuntai";

$numofdays = date("t", strtotime("$year-$month-01"));

echo "$month // $year // $numofdays // $currentDay<br /><br />";

echo "<table border=\"1\">";

echo "<tr>";
echo "<td>Viikko</td>"; //print the week header
//print the weekdays
for($i = 1; $i <= 7; $i++){
	echo "<td>" . $days[$i] . "</td>";
}
echo "</tr>";

echo "<tr>";
echo "<td>".date("W", strtotime("$year-$month-01"))."</td>";
//empty slots
$z = date("N", strtotime("$year-$month-01"));
for($x = 1; $x < $z; $x++){
	echo "<td>".($numofdays-(7-$x))."</td>";
}

for($i = 1; $i <= $numofdays; $i++){
	if(strlen($i) == 1){
		$j = "0".$i;
	}else{
		$j = $i;
	}
	$weekday = date("N", strtotime("$year-$month-$j"));
	
	if($weekday == 1){
		echo "<td>".date("W", strtotime("$year-$month-$j"))."</td>";
	}
	
	echo "<td>$i</td>";
	if($weekday == 7){
		echo "</tr><tr>";
	}
}

//more empty slots
$lastweekday = date("N", strtotime("$year-$month-$numofdays"));
$z = 1;
for($x = $lastweekday; $x < 7; $x++){
	echo "<td>$z</td>";
	$z++;
}

echo "</tr>";

echo "</table>";
?>

</body>
</html>