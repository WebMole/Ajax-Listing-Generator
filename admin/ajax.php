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

/* Allow direct access to other files. */
$access = 'authorized';

if (file_exists(dirname(__FILE__) . '/../configuration.php'))
    require_once(dirname(__FILE__) . '/../configuration.php');
else
    die("No configuration detected");

if (file_exists(dirname(__FILE__) . '/../lib/school-manager.php'))
    require_once(dirname(__FILE__) . '/../lib/school-manager.php');
else
    die("No school-manager detected");

$action_type = mysql_real_escape_string($_POST["action_type"]);

/****************************************************************
* Insert single school
****************************************************************/
if ($action_type == "insert_single")
{
    $Schools = new SchoolManager();
    $school_name = mysql_real_escape_string($_POST["school_name"]);
    $school_address = mysql_real_escape_string($_POST["school_address"]);
    $school_description = mysql_real_escape_string($_POST["school_description"]);
    
    if(!empty($school_name) && !empty($school_description) && !empty($school_address))
    {
        $Schools->insertSchool($school_name, $school_address, $school_description);
        echo "<div class='alert alert-success'>Successfully inserted school <b>" . $school_name . "</b> in database</div>";
    }
    else
    {
        echo "<div class='alert alert-error'>You need to fill all the forms</div>";
    }
}
/****************************************************************
* Insert random schools
****************************************************************/
if ($action_type == "insert_multiple")
{
    $Schools = new SchoolManager();
    $num_random_schools = mysql_real_escape_string(intval($_POST['num_random_schools']));
    if(!empty($num_random_schools))
    {
        $time_start = microtime(true);
        
        $Schools->insertRandomSchools($num_random_schools);
        
        $time_end = microtime(true);
        $execution_time = ($time_end - $time_start);
        
        echo '<div class="alert alert-success">';
        echo 'Successfully inserted <b class="label label-info">' . $num_random_schools . ' schools</b> in database.<br />';
        echo 'Total Execution Time: <b class="label label-info">' . $execution_time . '</b> seconds';
        echo '</div>';
    }
    else
    {
        echo "<div class='alert alert-error'>You need to specify a number</div>";
    }
}
?>