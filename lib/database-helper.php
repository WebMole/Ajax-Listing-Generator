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

/**
 * Helper class to manage application's database
 */
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
			if(DEBUG) echo "Disconnected from database<br />";
		}
		if(DEBUG) echo "DatabaseHelper Destroyed<br />";
	}

    /**
     * Verify connection before connecting to database
     */
	public function init()
	{
		$this->testConnection();
		$this->connectToDatabase();
	}

    /**
     * Verify connection link
     * @todo verify database connectivity, table existance, etc.
     */
    public function testConnection()
	{
		if (DB_NAME == "" || DB_USER == "")
			throw new Exception('Missing Database Informations in config file.');
	}
	
    /**
     * Connect to database using defined credentials in configuration.php
     */
	public function connectToDatabase()
	{
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
        
        if (mysqli_connect_errno($con)) {
           throw new Exception('<div class="alert alert-error"><b>Failed to connect to MySQL</b>: <i>' .  mysqli_connect_error() . '</i></div>');
        }
        else if (!$con)
		{
			throw new Exception('<div class="alert alert-error"><b>An error occured with MySQL</b>: <i>' . mysqli_error() . '</i></div>');
		}
		else
		{
			$db = mysqli_select_db($con, DB_NAME);
			if (!$db) {
				throw new Exception('<div class="alert alert-error"><b>Cannot select Database</b>: <i>' . mysqli_error($con) . '</i></div>');
			}
			if(DEBUG) echo "Successfully connected to Database.<br />";
			$this->isConnected = true;
			$this->con = $con;
			return $con;
		}
	}
    
	private function request($sql, $insert = false)
	{
		if ($this->isConnected)
		{
			$request = mysqli_query($this->con, $sql);
			
			if (!$request)
			{
				throw new Exception('<div class="alert alert-error"><b>SQL request failed</b>: <i>' . mysqli_error($this->con) . '</i></div>');
			}
			else
			{
			    if(!$insert)
                {
                    $rows = array();
                    while($row = mysqli_fetch_array($request))
                    {
                        $rows[] = $row;
                    } 
                    
                    return $rows;
                }
            }
		}
	}

    public function request_infos($id)
	{
		$sql = "SELECT address, description from " . DB_TABLE_NAME . " WHERE id=" . $id . " " . $this->limit . ";";
		return $this->request($sql);
	}
    
    public function request_count()
    {
        $sql = "SELECT COUNT(*) FROM " . DB_TABLE_NAME . ";";
        $request = mysqli_query($this->con, $sql);
        if (!$request)
        {
            throw new Exception('<div class="alert alert-error"><b>SQL request failed</b>: <i>' . mysqli_error($this->con) . '</i></div>');
        }
        else
        {
            $answer = mysqli_fetch_row($request); 
        }
        return $answer[0];
    }
    
    public function insert_single($name, $address, $description)
    {
        $sql = "INSERT INTO " . DB_TABLE_NAME . " (name, address, description) VALUES ( '" . $name . "', '" . $address . "', '" . $description . "');"; 
        return $this->request($sql, true);
    }

	public function request_main()
	{
		$sql = "SELECT id, name from " . DB_TABLE_NAME . " " . $this->limit . ";";
		return $this->request($sql);
	}
	
	public function paginationLimit($current_position, $element_per_page)
	{
		$start = (int)($current_position - 1) * $element_per_page; 
		$element_per_page = (int)$element_per_page;
		$limit = " LIMIT " . $start . ", " . $element_per_page;
		$this->limit = $limit;
	}
    
    public function remove_all()
    {
        $sql = "TRUNCATE " . DB_TABLE_NAME . ";";
        $request = mysqli_query($this->con, $sql);
        if (!$request)
        {
            throw new Exception('<div class="alert alert-error"><b>SQL request failed</b>: <i>' . mysqli_error($this->con) . '</i></div>');
            return false;
        }
        else
        {
            return true;
        }
    }
}
?>