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

require_once(dirname(__FILE__) . "/database-helper.php");
require_once(dirname(__FILE__) . "/LoremIpsum.class.php");

class ElementManager {
    
	public $dbHelper = "";

	function __construct()
	{
		// Connect to database
		$this->dbHelper = new databaseHelper();
		
		try
		{
		 	$this->dbHelper->init();
		}
		catch (Exception $e)
		{
		 	echo $e;
		}
	}

	function __destruct() {
		if (DEBUG) echo "ElementManager Destroyed<br />";
	}

    function insertElement($name, $address, $description)
    {
        $this->dbHelper->insert_single($name, $address, $description);
    }
    /**
     * Insert a number of elements
     * @param integer $num_elements Number of elements to insert
     */
    function insertRandomElements($num_elements)
    {
        $textgen = new LoremIpsumGenerator();
        for ($i=0; $i < $num_elements; $i++)
        { 
            $name = $textgen->getContent(3, "txt", false);
            $description = $textgen->getContent(100, "txt", true);
            $address = $textgen->getContent(4, "txt", false);
            $this->dbHelper->insert_single($name, $address, $description);
        }
    }


    /**
     * Retrieve the tiles and ids for the given page
     */
	function getMainList()
	{
	    if(PAGINATION_ENABLED)
        {
            if ( empty($_GET["page_num"]))
            {
                $_GET["page_num"] = 1;
            }
            else if (preg_match("/^[0-9]+$/", $_GET["page_num"]) === 0)
            {
                $_GET["page_num"] = 1;
            }
            
            $this->dbHelper->paginationLimit($_GET["page_num"], ELEMENTS_PER_PAGE);
        }
        $results = $this->dbHelper->request_main();
	 	// Loop to list results
	 	if (!empty($results))
        {
           
            foreach ($results as $row)
    		{
    			echo '<div class="well">';
    				echo '<h3>' . $row["name"] . '</h3>';
    				echo '<input type="button" name="submit" id="submit" class="btn" value="submit" onClick = "getdetails(' . $row["id"] . ')" />';
    				echo '<div id="msg' . $row["id"] . '"></div>';
    			echo '</div>';
    		}
        }
        else
        {
            if ($this->dbHelper->request_count() == 0)
            {
                echo '<div class="alert alert-warning">Table vide</div>';    
            }
            else if(PAGINATION_ENABLED)
            {
                echo '<div class="alert alert-warning">Page vide</div>';
            }
        }
		
	}

	function getElementInfos($id)
	{
		$results = $this->dbHelper->request_infos($id);
        foreach ($results as $row)
        {
            echo '<ul>';
            echo '<li>Address: <p class="alert alert-info Address">' . $row['address'] . '</p></li>';
            echo '<li>Description: <p class="alert alert-info description">' . $row['description'] . '</p></li>';
            echo '</ul>';
        }
		
	}

	function getElement($id)
	{
		$this->dbHelper->request_main($id);
	}
    
    function getNumElements()
    {
        $totalElements = $this->dbHelper->request_count();
        return $totalElements;
    }    

}
