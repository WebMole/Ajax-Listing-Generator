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

<ul class="nav nav-tabs" id="navigation-tabs">
	<li class="active"><a href="#general-settings" data-toggle="tab">General settings</a></li>
	<li><a href="#database" data-toggle="tab">Database settings</a></li>
	<li><a href="#manage-schools" data-toggle="tab">Manage schools</a></li>
</ul>

<div id="tabs" class="tab-content">

	<div id="general-settings" class="tab-pane active">
		<div id="pagination-settings">
			<h2>Pagination settings</h2>
			<p>How many shools to display per page.</p>
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="pagination-enabled" checked=""> Enable Pagination
							</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="school-per-page">School per page</label>
						<div class="controls">
							<input type="number" class="input-xlarge" id="school-per-page" placeholder="">
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</fieldset>
			</form>
		</div>

		<div id="display-settings">
			<h2>Application settings</h2>
			<p>Some genric parameters.</p>
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="style-enabled" checked=""> Enable CSS
							</label>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="links-enabled" checked=""> Create links for each school
							</label>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="wrapper-enabled" checked=""> Website wrapper (header and footer + sample pages)
							</label>
						</div>
					</div>
					<div class="control-group">
                        <div class="controls">
                            <label class="checkbox">
                                <input type="checkbox" id="execution-time-enabled" checked=""> Show execution time on every pages
                            </label>
                        </div>
                    </div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

	<div id="database" class="tab-pane">
		<div id="database-settings">
			<h2>Database settings</h2>
			<p>MySQL database informations to use with the demo application.</p>
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="database-name">Database name</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="database-name" placeholder="">
						</div>
					</div>
					
					<div class="control-group">
                        <label class="control-label" for="database-table">Database table</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" id="database-table" placeholder="">
                        </div>
                    </div>
                    
                    
					<div class="control-group">
						<label class="control-label" for="database-user">Database user</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="database-user" placeholder="">
						</div>
					</div>
					
					
					<div class="control-group">
						<label class="control-label" for="database-password">Database password</label>
						<div class="controls">
							<input type="password" class="input-xlarge" id="database-password" placeholder="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="database-url">Database url</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="database-url" placeholder="">
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</fieldset>
			</form>
		</div>

		<div id="database-actions">
			<h2>Database actions</h2>
			<p><span class="label label-warning">Warning</span> changes are permanent.</p>
			<a class="btn btn-success"><i class="icon icon-white icon-download"></i> Export database</a>
			<a class="btn btn-primary"><i class="icon icon-white icon-file"></i> Import database</a>
			<a class="btn btn-danger"><i class="icon icon-white icon-trash"></i> Empty Database</a>
		</div>
	</div>

	<div id="manage-schools" class="tab-pane">
		<div id="add-single">
			<h2>Insert a single school</h2>
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="school-name">School name</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="school-name" placeholder="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="school-address">School address</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="school-address" placeholder="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="school-description">School description</label>
						<div class="controls">
							<textarea type="text" class="input-xlarge" id="school-description" placeholder=""></textarea>
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-primary" id="add-single-action">Insert</button>
					</div>
				</fieldset>
			</form>
		</div>

		<div id="add-multiple">
			<h2>Insert multiple randomly generated schools</h2>
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="school-number">Number of schools</label>
						<div class="controls">
							<input type="number" class="input-xlarge" id="school-number" placeholder="">
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" id="add-multiple-action">Insert</button>
					</div>
				</fieldset>
			</form>
			<div id="random-sample">
				<h2>Sample</h2>
				<div class="well">
					<h3>@todo: Random School Name</h3>
					<p>@todo: Random School address</p>
					<p>@todo: Random School description</p>
				</div>
			</div>
		</div>
	</div>
</div>