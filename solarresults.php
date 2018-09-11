<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sunrise and Sunset times</title>
 <STYLE type="text/css">
   p {
	font-size: xx-small;
		}
		
 </STYLE>

</head>

<body>
<?php 
// function to convert degrees minutes seconds in to decimal value
		function DecimalDeg(&$deg,&$min,&$sec)
				{
				$temp1=$deg;
				$temp2=$min/60;
				$temp3=$sec/60/60;
				$decimal= (float) ($temp1+$temp2+$temp3);
				$decimal = number_format($decimal, 3); 
				return $decimal;
				}
				
// function to convert calendar day to unix timestamp
		function Date2timestamp(&$day,&$month,&$year)
				{
				$jd = gregoriantojd($day,$month,$year);
				$unix = jdtounix($jd);
				return $unix;
				}

// function to get proper name for timezone
			function TimezoneLongName(&$offset)
				{
				switch ($offset):
					case -12:
						$timezone = "(UTC -12:00)";
						break;
					case -11:
						$timezone = "(UTC -11:00)";
						break;
					case -10:
						$timezone = "(UTC -10:00)";
						break;
					case -9.5:
						$timezone = "(UTC -9:30)";
						break;
					case -9:
						$timezone = "Alaska Time (UTC -9:00)";
						break;
					case -8:
						$timezone = "Pacific Time (UTC -8:00)";
						break;
					case -7:
						$timezone = "Mountain Time (UTC -7:00)";
						break;
					case -6:
						$timezone = "North American Central Time (UTC -6:00)";
						break;
					case -5:
						$timezone = "North American Eastern Time (UTC -5:00)";
						break;
					case -4.5:
						$timezone = "Venezuela (UTC -4:30)";
						break;
					case -4:
						$timezone = "Eastern Caribbean Time (UTC -4:00)";
						break;
					case -3.5:
						$timezone = "Newfoundland Standard Time (UTC -3:30)";
						break;
					case -3:
						$timezone = "(UTC -3:00)";
						break;
					case -2:
						$timezone = "(UTC -2:00)";
						break;
					case -1:
						$timezone = "(UTC -1:00)";
						break;
					case 1:
						$timezone = "Central Europe Time (UTC +1:00)";
						break;
					case 2:
						$timezone = "(UTC +2:00)";
						break;
					case 3:
						$timezone = "(UTC +3:00)";
						break;
					case 3.5:
						$timezone = "Iranian Time (UTC +3:30)";
						break;
					case 4:
						$timezone = "(UTC +4:00)";
						break;
					case 4.5:
						$timezone = "Afghanistan UTC (+4:30)";
						break;
					case 5:
						$timezone = "Pakistan Standard Time (UTC +5:00)";
						break;
					case 5.5:
						$timezone = "Indian Standard Time (UTC +5:30)";
						break;
					case 5.75:
						$timezone = "Nepal Time (UTC +5:45)";
						break;
					case 6:
						$timezone = "(UTC +6:00)";
						break;
					case 6.5:
						$timezone = "Cocos Islands, Myanmar (UTC +6:30)";
						break;
					case 7:
						$timezone = "(UTC +7:00)";
						break;
					case 8:
						$timezone = "(UTC +8:00)";
						break;
					case 8.75:
						$timezone = "(UTC +8:45)";
						break;
					case 9:
						$timezone = "Japan /Korea Standard Time (UTC +9:00)";
						break;
					case 9.5:
						$timezone = "Australia Central Standard Time (UTC +9:30)";
						break;
					case 10:
						$timezone = "Australian Eastern Standard Time/ Chamorro Standard Time (UTC +10:00)";
						break;
					case 10.5:
						$timezone = "(UTC +10:30)";
						break;
					case 11:
						$timezone = "(UTC +11:00)";
						break;	
					case 11.5:
						$timezone = "Norfolk Island (UTC +11:30)";
						break;	
					case 12:
						$timezone = "(UTC +12:00)";
						break;	
					case 12.75:
						$timezone = "(UTC +12:45)";
						break;	
					case 13:
						$timezone = "(UTC +13:00)";
						break;
					case 14:
						$timezone = "(UTC +14:00)";
						break;
					default:
						$timezone = "Greenwich Mean Time / Universal Time";
					endswitch;	
					return $timezone;
				}

// convert timestamp in to nice date format
			function longdate($timestamp)
				{
					return date ("l jS  F Y",$timestamp);
				}

// collect form data and assign variables
$latdegs = $_POST["latdegs"];
$latmins = $_POST["latmins"];
$latsecs = $_POST["latsecs"];
$longdegs = $_POST["longdegs"];
$longmins = $_POST["longmins"];
$longsecs = $_POST["longsecs"];
$equator = $_POST["equator"];
$meridien = $_POST["meridien"];
$day = $_POST["day"];
$month = $_POST["month"];
$year = $_POST["year"];
$offset = $_POST["offset"];

if (checkdate($month, $day, $year)) {

// convert latitude/longitude into decimal
$lat = DecimalDeg( $latdegs, $latmins, $latsecs);
$long = DecimalDeg( $longdegs, $longmins, $longsecs);

// convert inputed date into timestamp
$timestamp = Date2timestamp($month, $day, $year);
$timezone = TimezoneLongName($offset);
?>
<h2>
<?php 
echo longdate($timestamp);

?></h2><h3>
<?php
echo "$lat $equator  , $long $meridien";

?></h3><h4>
<?php
// redefines $lat/$long as (+/- interger)
$equator == N ? $lat = $lat : $lat = -($lat);
$meridien == W ? $long = -($long) : $long = $long;

// sun time calculations
$zenith=90+(50/60);
echo "Sunrise : ".date_sunrise($timestamp, SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);
echo "<br>Sunset : ".date_sunset($timestamp, SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);


?>
</h4>
<!--<p>The times for sunrise and sunset are based on the ideal situation, where no hills or mountains obscure the view and the flat horizon is at the same altitude as the observer. Sunrise is the time when the upper part of the Sun is visible, and sunset is when the last part of the Sun is about to disappear below the horizon (in clear weather conditions).
<p>If the horizon in the direction of sunrise or sunset is at a higher altitude than that of the observer, the sunrise will be later and sunset earlier than listed (and the reverse: on a high mountain with the horizon below the observer, the sunrise will be earlier and sunset later than listed).</p>
<p>The Earth's atmosphere refracts the incoming light in such a way that the Sun is visible longer than it would be without an atmosphere. The refraction depends on the atmospheric pressure and temperature. These calculations use the standard atmospheric pressure of 101.325 pascal and temperature of 15°C or 59°F. A higher atmospheric pressure or lower temperature than the standard means more refraction, and the sunrise will be earlier and sunset later. In most cases, however, this would affect the rising and setting times by less than a minute. Near the North and South Poles it could have greater impact because of low temperatures and the slow rate of the Sun's rising and setting.</p>
<p>For locations north of 66°34' N or south of 66°34' S latitude, the Sun will be above the horizon all day in the summer and below the horizon all day in the winter.</p>
<p>Technically, sunrise and sunset are calculated based on the true geocentric position of the Sun at 90°50' from the zenith position (directly above the observer).</p>--><h4>
<?php


$zenith=96;
echo "Civilian Twilight start : ".date_sunrise($timestamp, SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);

echo "<br>Civilian Twilight end : ".date_sunset($timestamp, SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);


?>
</h4>
<!--<p>Civil twilight is the period when the Sun is below the horizon but its center is less than 6 degrees below. The "Civil Twilight Starts" time is the dawn or civil dawn, with the center of the Sun at exactly 6 degrees below the horizon. Equally, the "Civil Twilight Ends" time is dusk or civil dusk, when the Sun is 6 degrees below the horizon in the evening.</p>
<p>During civil twilight, the sky is still illuminated, and with clear weather it is brightest in the direction of the Sun. The Moon and the brightest stars and planets may be visible. It is usually bright enough for outdoor activities without additional lighting.</p>
<p>Near the equator, where the Sun sets and rises in an almost vertical direction, the civil twilight period can last only 21 minutes, a very fast nightfall compared to the much longer periods at southern and northern latitudes. In regions north of 60°24' N or south of 60°24' S, there will be at least one night when it does not get darker than this.</p>
<p>Technically, the start and end times are when the true geocentric position of the Sun is 96 degrees from the zenith position.</p>-->
<h4>
<?php


$zenith=102;
echo "Nautical Twilight start : ".date_sunrise($timestamp, SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);
echo "<br>Nautical Twilight end : ".date_sunset($timestamp, SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);


?>
</h4>
<!--<p>Nautical twilight is the period when the center of the Sun is between 6 and 12 degrees below the horizon, when bright stars are still visible in clear weather and the horizon is becoming visible. It is too dark to do outdoor activities without additional lighting.</p>

<p>Nautical twilight starts at nautical dawn, at 12 degrees below the horizon, and nautical twilight ends at nautical dusk, when the Sun is lower than 12 degrees below the horizon. For locations north of 54°34' N or south of 54°34' S latitude, the Sun will never be lower than 12 degrees below the horizon for a period in the summer.</p>

<p>Technically, the start and end times are when the true geocentric position of the Sun is 102 degrees from the zenith position.</p>-->
<h4>
<?php



$zenith=108;
echo "Astronomical Twilight start: ".date_sunrise($timestamp, SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);

echo "<br>Astronomical Twilight end: ".date_sunset($timestamp, SUNFUNCS_RET_STRING, $lat, $long, $zenith, $offset);


?></h4>
<!--<p>Astronomical twilight is the period when the center of the Sun is between 12 and 18 degrees below the horizon. It starts at astronomical dawn, early in the morning when the Sun is higher than 18 degrees below the horizon. From this point, it will be difficult to observe certain faint stars, galaxies, and other objects because the Sun starts to illuminate the sky. Astronomical twilight ends at astronomical dusk in the late evening, when those faint objects again can be visible because the Sun is lower than 18 degrees below the horizon. In locations north of 48°24' N or south of 48°24', it never gets darker than this near the middle of the summer solstice (June or December).</p>
<p>Technically, the start and end times are when the true geocentric position of the Sun is 108 degrees from the zenith position, or directly above the observer.</p>
<p>Astronomical twilight is the period when the center of the Sun is between 12 and 18 degrees below the horizon.</p>
-->
 
<?php



echo "<h4>$timezone</h4>";
} else {
	
echo 	"<h3>please check your date $day/$month/$year is invalid</h3>";

};

?>


<form action="solarinput.php" method="post" enctype="multipart/form-data" id="calcmore">
<input type="submit" value="another time and place ?" />
</form>
</body>
</html>