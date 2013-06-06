<?php
$id = $_POST['id'];

$con = mysql_connect("localhost","root","");
$db= mysql_select_db("school", $con);
$sql = "SELECT * from school where  id=".$id;
$result = mysql_query($sql, $con);
$row = mysql_fetch_array($result);

echo '<ul>';
echo '<li>Adress: <span class="label adress">' . $row['adress'] . '</span></li>';
echo '<li>Description: <span class="label description">' . $row['description'] . '</span></li>';
echo '</ul>';

?>