<nav id="header" class="navbar navbar-default">
	<div class="container">
		<ul class="nav nav-pills">
			<li <?php
				if (!isset($_GET['page'])) {
					echo 'class="active"';
				}
			?>>
				<a href="admin.php">
                    <i class="glyphicon glyphicon-home"></i> Home
                </a>
			</li>
			<li <?php
				if (isset($_GET['page']) && $_GET['page']=='markers') {
					echo 'class="active"';
				}
			?>>
				<a href="?page=markers">
                    <i class="glyphicon glyphicon-map-marker"></i> Markers
                </a>
			</li>
			<li <?php
			if (isset($_GET['page']) && $_GET['page']=='groups') {
				echo 'class="active"';
			}
			?>>
				<a href="?page=groups">
                    <i class="glyphicon glyphicon-th-large"></i> Groups</a>
			</li>
			<li <?php
			if (isset($_GET['page']) && $_GET['page']=='contributors') {
				echo 'class="active pull-right"';
			} else {
				echo 'class="pull-right"';
			}
			?>>
				<a href="?page=contributors">
                    <i class="glyphicon glyphicon-user"></i> Contributors
                </a>
			</li>
		</ul>
	</div>
</nav>