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
?>
    
<h2>Contact us!</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ullamcorper mi sit amet dui luctus consequat. Integer mollis congue ligula, et euismod nibh ultricies vel.</p>
<form class="">
  <div class="row">
        <div class="span4">
            <label>First Name</label>
            <input type="text" class="span4" placeholder="Your First Name">
            <label>Last Name</label>
            <input type="text" class="span4" placeholder="Your Last Name">
            <label>Email Address</label>
            <input type="text" class="span4" placeholder="Your email address">
            <label>Subject</label>
            <select id="subject" name="subject" class="span4">
                <option value="na" selected="">Choose One:</option>
                <option value="service">General Customer Service</option>
                <option value="suggestions">Suggestions</option>
                <option value="product">Product Support</option>
            </select>
        </div>
        <div class="span8">
            <label>Message</label>
            <textarea name="message" id="message" class="input-xxlarge span8" rows="11"></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary pull-right">Send</button>
    </div>
</form>

