<?php

$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$con)
{
	echo '<div class="alert alert-error"><b>Failed to connect to MySQL</b>: <i>' . mysql_error() . '</i></div>';
}
else
{
	$db = mysql_select_db(DB_NAME, $con);
	if (!$db) {
		echo '<div class="alert alert-error"><b>Cannot select Database</b>: <i>' . mysql_error() . '</i></div>';
	}
	else
	{
		$sql = "SELECT id, name from " . DB_NAME;
		$result = mysql_query($sql, $con);
		if (!$result)
		{
			echo '<div class="alert alert-error"><b>SQL request failed</b>: <i>' . mysql_error() . '</i></div>';
		}
		else
		{
			// Loop to list results
			while ($row = mysql_fetch_assoc($result))
			{
				$id = $row["id"];
				$name = $row["name"];
				echo '<div class="well">';
					echo '<h2>' . $name . '</h2>';
					echo '<input type="button" name="submit" id="submit" class="btn" value="submit" onClick = "getdetails(' . $id . ')" />';
					echo '<div id="msg' . $id . '"></div>';
				echo '</div>';
			}
		}
	}
	mysql_close($con);	
}