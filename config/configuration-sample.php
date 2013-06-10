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

define('DEBUG', true);

/****************************************************************
* Database settings
****************************************************************/

define('DB_NAME', 		'');
define('DB_TABLE_NAME', '');
define('DB_USER', 		'');
define('DB_PASSWORD', 	'');
define('DB_HOST', 		'');

/****************************************************************
* Pagination
****************************************************************/

define('PAGINATION_ENABLED', 	'');
define('SCHOOLS_PER_PAGE', 		'');

/****************************************************************
* Application Settings
****************************************************************/

define('CSS_ENABLED', 		'');
define('WRAPPER_ENABLED', 	'');
define('SHOOLS_LINKS', 		'');

?>