<?php
session_start();
?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Administration - Miscreated Interactive Map</title>
	<link rel="stylesheet" type="text/css" href="assets/css/admin.css">

	</head>
	<body>
		<?php
			if(isset($_SESSION['email']) && $_SESSION['email']!='') {
				include('admin/includes/header.php');
				if(isset($_GET['page']) && $_GET['page']) {
					$page = stripslashes($_GET['page']);
				} else {
					$page = '';
				}
				switch ($page) {
					case 'contributors':
						include('admin/pages/contributors.php');
						break;
					case 'groups':
						if(isset($_GET['action'])) {
							if($_GET['action']=='edit') {
								include('admin/pages/groups-edit.php');
							}
							if($_GET['action']=='save') {
								include('admin/pages/groups-save.php');
							}
						} else {
							include('admin/pages/groups.php');
						}
						break;
					case 'markers':
					    if(isset($_GET['action'])) {
                            if($_GET['action']=='edit') {
                                include('admin/pages/markers-edit.php');
                            }
                            if($_GET['action']=='save') {
                                include('admin/pages/markers-save.php');
                            }
                        } else {
                            include('admin/pages/markers.php');
                        }
						break;
                    case 'map':
                        include('admin/pages/map.php');
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
