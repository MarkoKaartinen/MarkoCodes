<!--
Please do not remove this text!

-------------------------------------------
Simple Calendar by Marko Kaartinen
-------------------------------------------
Www: www.markokaartinen.net
E-mail: markokaartinen [at] gmail [dot] com
-------------------------------------------

Please do not remove this text!
-->
<!DOCTYPE html>
<html lang="fi">
<head>
	<meta charset="utf-8">
	<title>Cal</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
$month = $_GET['m'];
$year = $_GET['y'];
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

//months
$months[1] = "Tammikuu";
$months[2] = "Helmikuu";
$months[3] = "Maaliskuu";
$months[4] = "Huhtikuu";
$months[5] = "Toukokuu";
$months[6] = "Kes&auml;kuu";
$months[7] = "Hein&auml;kuu";
$months[8] = "Elokuu";
$months[9] = "Syyskuu";
$months[10] = "Lokakuu";
$months[11] = "Marraskuu";
$months[12] = "Joulukuu";

if(substr($month, 0, 1) == 0){
	$monthNoZeros = substr($month, 1);
}else{
	$monthNoZeros = $month;
}

$prevMonth = $monthNoZeros - 1;
if($prevMonth == 0){
	$prevMonth = 12;
	$prevYear = $year - 1;
}else{
	$prevYear = $year;
}

$nextMonth = $monthNoZeros + 1;
if($nextMonth == 13){
	$nextMonth = 1;
	$nextYear = $year + 1;
}else{
	$nextYear = $year;
}

$numofdays = date("t", strtotime("$year-$month-01"));

$controls = "<div id=\"calControls\"><a href=\"index.php?y=$prevYear&amp;m=$prevMonth\">&laquo; ".$months[$prevMonth]."</a> - <a href=\"index.php?y=$nextYear&amp;m=$nextMonth\">".$months[$nextMonth]." &raquo;</a></div>";

echo "<div id=\"calHeader\">";
echo "<h1 id=\"calHeading\">".$months[$monthNoZeros]." $year</h1>";
echo "<div style=\"padding-top:15px;\">$controls</div>";
echo "</div>";
echo "<div class=\"calClear\"></div>";

echo "<table id=\"calTable\" cellpadding=\"0\" cellspacing=\"0\">";

echo "<tr id=\"headings\">";
echo "<td class=\"weekhead\">vko</td>"; //print the week header
//print the weekdays
for($i = 1; $i <= 7; $i++){
	echo "<td>" . $days[$i] . "</td>";
}
echo "</tr>";

echo "<tr>";
echo "<td class=\"week\">".date("W", strtotime("$year-$month-01"))."</td>";
//empty slots
$z = date("N", strtotime("$year-$month-01"));
for($x = 1; $x < $z; $x++){
	echo "<td class=\"empty\">
		<div class=\"dayhead\">".($numofdays-(7-$x))."</div>
	</td>";
}

for($i = 1; $i <= $numofdays; $i++){
	if(strlen($i) == 1){
		$j = "0".$i;
	}else{
		$j = $i;
	}
	$weekday = date("N", strtotime("$year-$month-$j"));
	
	if($weekday == 1){
		echo "<td class=\"week\">".date("W", strtotime("$year-$month-$j"))."</td>";
	}
	
	if(date("Y-m-d") == "$year-$month-$j"){
		$class = "today";
	}else{
		$class = "day";
	}
	echo "<td class=\"$class\">
		<div class=\"dayhead\">$i</div>
		<br /><br />
	</td>";
	if($weekday == 7){
		echo "</tr><tr>";
	}
}

//more empty slots
$lastweekday = date("N", strtotime("$year-$month-$numofdays"));
$z = 1;
for($x = $lastweekday; $x < 7; $x++){
	echo "<td class=\"empty\">
		<div class=\"dayhead\">$z</div>
	</td>";
	$z++;
}

echo "</tr>";

echo "</table>";
echo $controls;
?>

</body>
</html>