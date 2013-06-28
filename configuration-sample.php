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
 * Enable this to display php objects status
 */
define('DEBUG', false);


/****************************************************************
* Database settings
****************************************************************/

/**
 * Database name
 */
define('DB_NAME',       '');

/**
 * Table to use in the database
 */
define('DB_TABLE_NAME', '');

/**
 * Database User 
 */
define('DB_USER',       '');

/**
 * Database Password
 */
define('DB_PASSWORD',   '');

/**
 * Database Host, default: localhost
 */
define('DB_HOST',       '');


/****************************************************************
* Pagination
****************************************************************/

/**
 * Enable or disable pagination
 */
define('PAGINATION_ENABLED',    true);

/**
 * Use Ajax to navigate through the pages
 * @todo: implement this
 */
define('PAGINATION_AJAX',       true);

/**
 * Number of links displayed in the navigation menu
 * @todo: implement this
 */
define('PAGINATION_NUM_LINKS',  -1); // -1 to display all links

/**
 * Number of shools to display per page
 */
define('SCHOOLS_PER_PAGE',      30);


/****************************************************************
* Application Settings
****************************************************************/

/**
 * Enable or disable stylesheet
 */
define('CSS_ENABLED',           true);

/**
 * Generate pages for each shool and make the title clickable
 * @todo: implement this
 */
define('SCHOOLS_LINKS',          true);

/**
 * Display total shools in database
 * @todo: implement this
 */
define('SCHOOLS_TOTAL_COUNT',    true);

/**
 * Display total shools in current page
 * @todo: implement this
 */
define('SCHOOLS_PAGE_COUNT',     true);


/****************************************************************
* WRAPPER Settings (pages and components)
****************************************************************/

/**
 * Enable or disable the wrapper globally
 */
define('WRAPPER_ENABLED',   true);

/**
 * Display the header with logo
 */
define('WRAPPER_HEADER',    true);

/**
 * Display the footer
 */
define('WRAPPER_FOOTER',    true);

/**
 * Display a sidebar beside schools
 * @todo: implement this
 */
define('WRAPPER_SIDEBAR',   true);

/**
 * Display page links in the header and the footer.
 * WRAPPER_HEADER and/or WRAPPER_FOOTER must be set to true
 */
define('WRAPPER_PAGES',     true);

?>