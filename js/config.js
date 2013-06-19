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

$(document).ready(function() {
	// Navigation
	$('#navigation-tabs li a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});
	
	$("#add-single-action").click(function(e) {
		e.preventDefault();
		insertSingle(e);
		});
	$("#add-multiple-action").click(function(e) {
		e.preventDefault();
		insertRandomSchools(e);
		});
	
	// Ajax requests
	function insertSingle()
	{
		$.ajax({
			type: "POST",
			url: "config-ajax.php",
			data: {insert_type:"insert_single", school_name:$("#school-name").val(), school_address:$("#school-address").val(), school_description:$("#school-description").val()}
		}).done(function( result )
		{
			$("#msg").html( result );
		});
	}
	
	function insertRandomSchools()
	{
		$.ajax({
			type: "POST",
			url: "config-ajax.php",
			data: {insert_type:"insert_multiple", num_random_schools:$("#school-number").val()}
		}).done(function( result )
		{
			$("#msg").html( result );
		});
	}
});