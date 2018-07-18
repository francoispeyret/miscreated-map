
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php

				include('admin/core/bdd.php');
				$req = $bdd->query('SELECT * FROM `accounts`');

			?>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>E-Mail</th>
						<th>Active</th>
						<th>Tools</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while ($donnees = $req->fetch())
						{
							echo '<tr>';
								echo '<td><small>'. $donnees['id'] . '</small></td>';
								echo '<td>'. $donnees['name'] . '</td>';
								echo '<td>'. $donnees['email'] . '</td>';
								if($donnees['active']==1) {
                                    echo '<td><i class="glyphicon glyphicon-ok"></i></td>';
                                } else {
                                    echo '<td><i class="glyphicon glyphicon-remove"></i></td>';
                                }
								echo '<td><i class="glyphicon glyphicon-pencil"></i></td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>