
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php

				include('admin/core/bdd.php');
				$req = $bdd->query('SELECT * FROM accounts');

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
								echo '<td>'. $donnees['id'] . '</td>';
								echo '<td>'. $donnees['name'] . '</td>';
								echo '<td>'. $donnees['email'] . '</td>';
								echo '<td>'. $donnees['active'] . '</td>';
								echo '<td>'. $donnees['active'] . '</td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>