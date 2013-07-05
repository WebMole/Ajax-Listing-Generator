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

if (file_exists(dirname(__FILE__) . '/../lib/element-manager.php'))
    require_once(dirname(__FILE__) . '/../lib/element-manager.php');
else
    die("No element-manager detected");

$action_type = mysql_real_escape_string($_POST["action_type"]);

/****************************************************************
* Insert single element
****************************************************************/
if ($action_type == "insert_single")
{
    $Elements = new ElementManager();
    $element_name = mysql_real_escape_string($_POST["element_name"]);
    $element_address = mysql_real_escape_string($_POST["element_address"]);
    $element_description = mysql_real_escape_string($_POST["element_description"]);
    
    if(!empty($element_name) && !empty($element_description) && !empty($element_address))
    {
        $Elements->insertElement($element_name, $element_address, $element_description);
        echo "<div class='alert alert-success'>Successfully inserted element <b>" . $element_name . "</b> in database</div>";
    }
    else
    {
        echo "<div class='alert alert-error'>You need to fill all the forms</div>";
    }
}

/****************************************************************
* Insert random elements
****************************************************************/
if ($action_type == "insert_multiple")
{
    $Elements = new ElementManager();
    $num_random_elements = mysql_real_escape_string(intval($_POST['num_random_elements']));
    if(!empty($num_random_elements))
    {
        $time_start = microtime(true);
        
        $Elements->insertRandomElements($num_random_elements);
        
        $time_end = microtime(true);
        $execution_time = ($time_end - $time_start);
        
        echo '<div class="alert alert-success">';
        echo 'Successfully inserted <b class="label label-info">' . $num_random_elements . ' elements</b> in database.<br />';
        echo 'Total Execution Time: <b class="label label-info">' . $execution_time . '</b> seconds';
        echo '</div>';
    }
    else
    {
        echo "<div class='alert alert-error'>You need to specify a number</div>";
    }
}


/****************************************************************
* Truncate Selected Table (remove all elements from the table)
****************************************************************/
if ($action_type == "remove_all")
{
    $Elements = new ElementManager();
    
    try
    {
        $time_start = microtime(true);
        if ($Elements->dbHelper->remove_all())
        {
            $time_end = microtime(true);
            $execution_time = ($time_end - $time_start);
            echo '<div class="alert alert-success">';
            echo 'Successfully <b class="label label-info">removed all elements</b> in database.<br />';
            echo 'Total Execution Time: <b class="label label-info">' . $execution_time . '</b> seconds';
            echo '</div>';
        }
    }
    catch (Exception $e)
    {
        echo $e;
    }
}
?>