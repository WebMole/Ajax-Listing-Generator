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

$current_page = 1;

if ( !empty($_GET["page_num"]) )
{
    $current_page = (int)$_GET["page_num"];
}

$num_schools = $Schools->getNumSchools();
$num_pages = ceil($num_schools / SCHOOLS_PER_PAGE);

?>

<div class="pagination">
  <ul>
    <?php
    if ($current_page == 1)
        echo '<li class="disabled"><a>&laquo;</a></li>';   
    else
        echo '<li><a href="?page_num=' . ($current_page - 1) . '">&laquo;</a></li>';
    
    for ($i = 1; $i <= $num_pages; $i++)
    {
        if ($current_page == $i)
            echo '<li class="active"><a>' . $current_page . '</a></li>';
        else
            echo '<li><a href="?page_num=' . $i . '">' . $i . '</a></li>';
    }
    
    if ($current_page == $num_pages)
        echo '<li class="disabled"><a>&raquo;</a></li>';
    else
        echo '<li><a href="?page_num=' . ($current_page + 1) . '">&raquo;</a></li>';
    ?>
  </ul>
</div>
