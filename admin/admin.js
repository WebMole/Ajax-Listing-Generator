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
		insertRandomElements(e);
		});
	
	// Ajax requests
	function insertSingle()
	{
		$.ajax({
			type: "POST",
			url: "ajax.php",
			data: {action_type:"insert_single", element_name:$("#element-name").val(), element_address:$("#element-address").val(), element_description:$("#element-description").val()}
		}).done(function( result )
		{
			$("#msg").html( result );
		});
	}
	
	function insertRandomElements()
	{
		$.ajax({
			type: "POST",
			url: "ajax.php",
			data: {action_type:"insert_multiple", num_random_elements:$("#element-number").val()}
		}).done(function( result )
		{
			$("#msg").html( result );
		});
	}
});