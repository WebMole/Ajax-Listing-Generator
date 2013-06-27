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

$page_num = 1;
$last_page_num = 5; // ask mysql here

if ( !empty($_GET["page_num"]) )
{
    $page_num = $_GET["page_num"];
}

?>

<div class="pagination">
  <ul>
      
      
    <?php
    if ($page_num === 1)
    {
        echo '<li class="disabled"><a>&laquo;</a></li>';   
    }
    else
    {
        echo '<li class="disabled"><a href="#">&laquo;</a></li>';
    }
    ?>
    
    <li><a href="?page_num=1">1</a></li>
    <li><a href="?page_num=2">2</a></li>
    <li><a href="?page_num=3">3</a></li>
    <li><a href="?page_num=4">4</a></li>
    <li><a href="?page_num=5">5</a></li>
    <li><a href="#">&raquo;</a></li>
    
  </ul>
</div>
