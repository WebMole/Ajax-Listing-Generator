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
* Extended Pagination generation
*/
function generatePagination($currentPage, $totalPages, $numLinks = 5, $displayPreviousLink = true, $displayNextLink = true, $displayFirstLink = true, $displayLastLink = true, $ajax = false)
{
    $html = '<div class="pagination pagination-centered"><ul>';

    //@todo: fix even numbers
    if ($numLinks == -1)
    {
        $firstPage = 1;
        $lastPage = $totalPages;
    }
    else if ($numLinks == 0)
    {
        $firstPage = 2;
        $lastPage = 2;
    }
    else if ($numLinks == 1)
    {
        $firstPage = $currentPage;
        $lastPage = $currentPage;
    }
    else
    {
        if ($numLinks % 2 == 0)
        {
            $leftLinks = floor($numLinks / 2) - 1;
            $rightLinks = floor($numLinks / 2);
        }
        else {
            $leftLinks = floor($numLinks / 2);
            $rightLinks = floor($numLinks / 2);
        }
        
 
        $firstPage = $currentPage - $leftLinks;
        $lastPage = $currentPage + $rightLinks;
    }
 
    // More links to the right
    if ($firstPage < 1 && $numLinks != 0)
    {
        $lastPage += 1 - $firstPage;
        $firstPage = 1;
    }
    // More links to the left or just too many links for the given total of pages
    if ($lastPage > $totalPages)
    {
        $firstPage -= $lastPage - $totalPages;
        $lastPage = $totalPages;
    }
    // Too many links for the given total of pages
    if ($firstPage < 1 && $numLinks != 0)
    {
        $firstPage = 1;
    }
 
    if ($displayFirstLink)
    {
        // Past the page 1
        if ($firstPage != 1 && $currentPage != 1)
        {
            $html .= '<li class="first"><a href="./?page_num=1" title="Page 1">1</a></li>';
        }
    }
 
    if ($displayPreviousLink)
    {
        if ($currentPage > 1)
        {
            $previousPage = $currentPage - 1;
            $html .= '<li class="previous"><a href="./?page_num=' . $previousPage . '" title="Page ' . $previousPage . '">&laquo;</a></li>';
        }
        else 
        {
            $html .= '<li class="previous disabled"><a>&laquo;</a></li>';
        }
    }
 
    if ($numLinks != 0)
    {
        // display links from the first to the last
        for ($i = $firstPage; $i <= $lastPage; $i++)
        {
            if ($i == $currentPage)
            {
                $html .= '<li class="active"><a>' . $i . '</a></li>';
            }
            else
            {
                $html .= '<li><a href="./?page_num=' . $i . '" title="Page ' . $i . '">' . $i . '</a></li>';
            }
        }
    }
    
    if ($displayNextLink)
    {
        if ($currentPage < $totalPages)
        {
            $nextPage = $currentPage + 1;
            $html .= '<li class="next"><a href="./?page_num=' . $nextPage . '" title="Page ' . $nextPage . '">&raquo;</a></li>';
        }
        else
        {
            $html .= '<li class="next disabled"><a>&raquo;</a></li>';
        }
    }
    
    if ($displayLastLink)
    {
        // We don't see the end yet
        if ($lastPage != $totalPages && $currentPage != $totalPages)
        {
           $html .= '<li class="last"><a href="./?page_num=' . $totalPages . '" title="Page ' . $totalPages . '">' . $totalPages . '</a></li>';
        }
    }
    
    $html .= '</ul></div>';
 
    return $html;
}



$current_page = 1;

if ( !empty($_GET["page_num"]) && preg_match("/^[0-9]+$/", $_GET["page_num"]) === 1)
{
    $current_page = (int) $_GET["page_num"];
}

$num_elements = $Elements->getNumElements();
$num_pages = ceil($num_elements / ELEMENTS_PER_PAGE);

echo generatePagination($current_page, $num_pages, PAGINATION_NUM_LINKS, PAGINATION_PREVIOUS_ENABLED, PAGINATION_NEXT_ENABLED, PAGINATION_FIRST_ENABLED, PAGINATION_LAST_ENABLED, PAGINATION_AJAX)
?>