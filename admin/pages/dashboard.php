<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-3">
			<div class="card panel panel-default">
				<div class="panel-body">
					<div class="glyphicon glyphicon-map-marker big-icon"></div>
					<p class="nb">350 Markers</p>
					<p><a href="?page=markers" class="btn btn-default">See Markers</a></p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<div class="card panel panel-default">
				<div class="panel-body">
					<div class="glyphicon glyphicon-th-large big-icon"></div>
					<p class="nb">15 Marker Groups</p>
					<p><a href="?page=groups" class="btn btn-default">See Marker Groups</a></p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<div class="card panel panel-default">
				<div class="panel-body">
					<div class="glyphicon glyphicon-user big-icon"></div>
					<p class="nb">15 Contributors</p>
					<p><a href="?page=contributors" class="btn btn-default">See Contributors</a></p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<div class="card panel panel-default">
				<div class="panel-body">
					<div class="glyphicon glyphicon-cloud big-icon"></div>
					<p class="nb"><?php echo count(scandir(ini_get("session.save_path"))); ?> Contributor(s) online</p>
					<p class="nb"><?php echo count(scandir(ini_get("session.save_path"))); ?> User(s) online</p>
				</div>
			</div>
		</div>

	</div>
</div>