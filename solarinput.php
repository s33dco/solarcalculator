<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Solar Calculator</title>
</head>

<body>

<!--form to get geo co-ordinates and date, set validation so degrees <180 mins & secs <60 -->
<h1>Sun Calculator</h1>
<h4>enter the latitude and longitude of a location<br />
to calculate the sun times for a chosen date</h4>
<form action="solarresults.php" method="post" enctype="multipart/form-data" id="timeandplace">
<h3>Latitude</h3>
<p>
<label><input name="latdegs" type="text" size="2" maxlength="2" /> degrees</label>
<label><input name="latmins" type="text" size="2" maxlength="2"  /> mins</label>
<label><input name="latsecs" type="text" size="5" maxlength="5"  /> secs</label>
<label><input name="equator" type="radio" value="N" checked="checked">North</label>
<label><input type="radio" value="S" name="equator">South</label></p>
<h3>Longitude</h3>
<p>
<label><input name="longdegs" type="text" size="2" maxlength="2" /> degrees</label>
<label><input name="longmins" type="text" size="2" maxlength="2" /> mins</label>
<label><input name="longsecs" type="text" size="5" maxlength="5" /> secs</label>
<label><input name="meridien" type="radio" value="W" checked="checked">West</label>
<label><input type="radio" value="E" name="meridien">East</label></p>

<select name="day">  
 <option value="1"> 1st  
 <option value="2"> 2nd  
 <option value="3"> 3rd
 <option value="4"> 4th
 <option value="5"> 5th
 <option value="6"> 6th
 <option value="7"> 7th
 <option value="8"> 8th
 <option value="9"> 9th
 <option value="10"> 10th
 <option value="11"> 11th
 <option value="12"> 12th
 <option value="13"> 13th
 <option value="14"> 14th
 <option value="15"> 15th
 <option value="16"> 16th
 <option value="17"> 17th
 <option value="18"> 18th
 <option value="19"> 19th
 <option value="20"> 20th
 <option value="21"> 21st
 <option value="22"> 22nd
 <option value="23"> 23rd
 <option value="24"> 24th
  <option value="25"> 25th
  <option value="26"> 26th
  <option value="27"> 27th
  <option value="28"> 28th
  <option value="29"> 29th
  <option value="30"> 30th
  <option value="31"> 31st
</select>

<select name="month">  
 <option value="1"> january 
 <option value="2"> february
 <option value="3"> march
 <option value="4"> april
 <option value="5"> may
 <option value="6"> june
 <option value="7"> july
 <option value="8"> august
 <option value="9"> september
 <option value="10"> october
 <option value="11"> november
 <option value="12"> december
</select>

<label><input name="year" type="text" size="4" maxlength="4" /> year</label>
<!--
<select name="offset">
	<option value="0"> UTC/GMT</option>
    <option value="1"> UTC +1</option>
    <option value="2"> UTC +2</option>
    <option value="3"> UTC +3</option>
    <option value="4"> UTC +4</option>
    <option value="5"> UTC +5</option>
    <option value="6"> UTC +6</option>
    <option value="7"> UTC +7</option>
    <option value="8"> UTC +8</option>
    
</select>-->
<br />
<input type="submit" value="calculate sun times" />
</form>

</body>
</html>