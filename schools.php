<?php

$con = mysql_connect("localhost","root","");
$db= mysql_select_db("school", $con);
$sql = "SELECT id, name from school";
$result = mysql_query($sql, $con);
while ($row = mysql_fetch_assoc($result)) {
	$id = $row["id"];
	$name = $row["name"];
	echo '<h2>' . $name . '</h2>';
	echo '<input type="button" name="submit" id="submit" class="btn" value="submit" onClick = "getdetails(' . $id . ')" />';
	echo '<div id="msg' . $id . '"></div>';	
}
