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

class DatabaseHelper
{
	public $con;
	public $isConnected;
	public $limit;

	function __destruct()
	{
		if (!empty($con))
		{
			mysqli_close($this->con);
			if(DEBUG) echo "Disconnected from database\n";
		}
		if(DEBUG) echo "DatabaseHelper Destroyed\n";
	}

	public function init()
	{
		$this->testConnection();
		$this->connectToDatabase();
	}

	public function testConnection()
	{
		if (DB_NAME == "" || DB_USER == "" || DB_HOST == "")
			throw new Exception('Missing Database Informations in config file.');
	}
	
	public function connectToDatabase()
	{
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

		if (!$con)
		{
			throw new Exception('<div class="alert alert-error"><b>Failed to connect to MySQL</b>: <i>' . mysqli_error() . '</i></div>');
		}
		else
		{
			$db = mysqli_select_db($con, DB_NAME);
			if (!$db) {
				throw new Exception('<div class="alert alert-error"><b>Cannot select Database</b>: <i>' . mysqli_error() . '</i></div>');
			}
			if(DEBUG) echo "Successfully connected to Database.\n";
			$this->isConnected = true;
			$this->con = $con;
			return $con;
		}
	}

	private function request($sql)
	{
		if ($this->isConnected)
		{
			$result = mysqli_query($this->con, $sql);
			
			if (!$result)
			{
				throw new Exception('<div class="alert alert-error"><b>SQL request failed</b>: <i>' . mysqli_error($this->con) . '</i></div>');
			}
			else
			{
				while($row = mysqli_fetch_array($result))
                {
                    $rows[] = $row;
                } 
            
                return $rows;
            }
            
		}
	}

	public function request_infos($id)
	{
		$sql = "SELECT adress, description from " . DB_TABLE_NAME . " WHERE id=" . $id . " " . $this->limit;
		return $this->request($sql);
	}

	public function request_main()
	{
		$sql = "SELECT id, name from " . DB_TABLE_NAME . $this->limit;
		return $this->request($sql);
	}
	
	public function paginationLimit($current_position, $school_per_page)
	{
		$start = (int)($current_position - 1) * $school_per_page; 
		$school_per_page = (int)$school_per_page;

		$limit = "";
		if($pagination_activated)
		{
			$limit = " LIMIT {$start}, {$school_per_page}";	
		}
		
		$this->limit = $limit;
	}
}
?>