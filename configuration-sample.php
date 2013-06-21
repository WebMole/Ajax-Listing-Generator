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

define('DEBUG', false);

/****************************************************************
* Database settings
****************************************************************/

define('DB_NAME',       '');
define('DB_TABLE_NAME', '');
define('DB_USER',       '');
define('DB_PASSWORD',   '');
define('DB_HOST',       '');

/****************************************************************
* Pagination
****************************************************************/

define('PAGINATION_ENABLED',    true);
define('PAGINATION_AJAX',       true);
define('PAGINATION_NUM_LINKS',  5);
define('SCHOOLS_PER_PAGE',      30);

/****************************************************************
* Application Settings
****************************************************************/

define('CSS_ENABLED',       true);
define('SHOOLS_LINKS',      true);
define('SHOOLS_COUNT',      true);
define('SHOOLS_COUNT',      true);

/****************************************************************
* WRAPPER Settings (pages and components)
****************************************************************/

define('WRAPPER_ENABLED',   true);
define('WRAPPER_HEADER',    true);
define('WRAPPER_FOOTER',    true);
define('WRAPPER_SIDEBAR',   true);
define('WRAPPER_PAGES',     true);

?>