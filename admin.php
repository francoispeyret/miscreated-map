<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Administration - Miscreated Interactive Map</title>
	<link rel="stylesheet" type="text/css" href="assets/css/admin.css">

	</head>
	<body>
		<?php
			session_start();
			if(isset($_SESSION['email']) && $_SESSION['email']!='') {
				include('admin/includes/header.php');
				switch ($_GET['page']) {
					case 'contributors':
						include('admin/pages/contributors.php');
						break;
					case 'groups':
						include('admin/pages/groups.php');
						break;
					case 'markers':
						include('admin/pages/markers.php');
						break;
					default:
						include('admin/pages/dashboard.php');
				}
			} else {
				include('admin/pages/connexion.php');
			}
		?>
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	</body>
</html>
