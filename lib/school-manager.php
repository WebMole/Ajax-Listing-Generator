<?php
/*
    WebMole, an automated explorer and tester for Web 2.0 applications
    Copyright (C) 2012-2013 Gabriel Le Breton, Fabien Maronnaud,
    Sylvain Hallé et al.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/* Prevent direct access to this file. */
if ($access != 'authorized')
    die('You are not allowed to view this file');

require_once("lib/database-helper.php");

class SchoolManager {
    
	public $dbHelper = "";

	function __construct()
	{
		// Connect to database
		$this->dbHelper = new databaseHelper();
		
		try {
		 	$this->dbHelper->init();
		 } catch (Exception $e) {
		 	echo $e;
		 }
	}

	function __destruct() {
		if (DEBUG) echo "SchoolManager Destroyed\n";
	}

	function mainList()
	{
	 	$results = $this->dbHelper->request_main();
	 	// Loop to list results
		foreach ($results as $row)
		{
			echo '<div class="well">';
				echo '<h2>' . $row["name"] . '</h2>';
				echo '<input type="button" name="submit" id="submit" class="btn" value="submit" onClick = "getdetails(' . $row["id"] . ')" />';
				echo '<div id="msg' . $row["id"] . '"></div>';
			echo '</div>';
		}
	}

	function getSchoolInfos($id)
	{
		$results = $this->dbHelper->request_infos($id);
	 	// Loop to list results
		foreach ($results as $row)
		{
			echo '<ul>';
			echo '<li>Adress: <span class="label adress">' . $row['adress'] . '</span></li>';
			echo '<li>Description: <span class="label description">' . $row['description'] . '</span></li>';
			echo '</ul>';
		}
	}

	function getSchool($id)
	{
		$this->dbHelper->request_main($id);
	}

}
