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

/* This is to prevent direct access to other php files */
$access = 'authorized';

if (file_exists(dirname(__FILE__) . '/../configuration.php'))
    require_once(dirname(__FILE__) . '/../configuration.php');
else
    die("No configuration detected");

if (file_exists(dirname(__FILE__) . '/element-manager.php'))
    require_once(dirname(__FILE__) . '/element-manager.php');
else
    die("No element-manager detected");

if (isset($_POST['id']))
{
	$id = $_POST['id'];
	$Elements = new ElementManager();
	$data = $Elements->getElementInfos($id);
}

?>