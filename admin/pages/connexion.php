<?php

include('admin/core/account.php');

?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-offset-4 col-sm-4">
			<br><br>
			<h1 class="page-header text-center">Administration</h1>
			<div class="panel panel-primary">
				<div class="panel-body">
					<?php
						if(isset($error) && $error) {
							?>
							<div class="alert alert-warning">
								<?php echo $error; ?>
							</div>
							<?php
						}
					?>
					<form action="admin.php" method="post">
						<div class="form-group">
							<label for="login_name">Email address</label>
							<input placeholder="Email" type="text" class="form-control" name="login_name" value="<?php if(isset($_POST['login_name'])) echo $_POST['login_name']; ?>">
						</div>
						<div class="form-group">
							<label for="login_pass">Password</label>
							<input placeholder="Password" type="password" class="form-control" name="login_pass">
						</div>
						<button class="btn btn-primary btn btn-block" type="submit">Connexion <span class="glyphicon glyphicon-log-in"></span></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>