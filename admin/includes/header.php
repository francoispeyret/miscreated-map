<nav id="header" class="navbar navbar-default">
	<div class="container">
		<ul class="nav nav-pills">
			<li <?php
				if (!isset($_GET['page'])) {
					echo 'class="active"';
				}
			?>>
				<a href="admin.php">Home</a>
			</li>
			<li <?php
				if (isset($_GET['page']) && $_GET['page']=='markers') {
					echo 'class="active"';
				}
			?>>
				<a href="?page=markers">Markers</a>
			</li>
			<li <?php
			if (isset($_GET['page']) && $_GET['page']=='groups') {
				echo 'class="active"';
			}
			?>>
				<a href="?page=groups">Groups</a>
			</li>
			<li <?php
			if (isset($_GET['page']) && $_GET['page']=='contributors') {
				echo 'class="active pull-right"';
			} else {
				echo 'class="pull-right"';
			}
			?>>
				<a href="?page=contributors">Contributors</a>
			</li>
		</ul>
	</div>
</nav>