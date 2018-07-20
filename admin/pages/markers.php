
<div class="container">
    <div class="row">
        <div class="col-xs-12">

            <h3 class="page-subheading"><i class="glyphicon glyphicon-map-marker"></i> Markers
				<a href="?page=markers&action=edit&id=new" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus-sign"></i> Add Marker</a>
			</h3>
            <?php

            include('admin/core/bdd.php');

			$pages = $bdd->query('SELECT COUNT(*) FROM `markers`');
			$nbElement = (int)$pages->fetch()['COUNT(*)'];
			$pages->closeCursor();

			$nbElementPerPage = 5;

            if(isset($_GET['nb'])) {
                $currentPage = $_GET['nb'];
            } else {
                $currentPage = 1;
            }

            $req = $bdd->query('SELECT * FROM `markers` LIMIT '.(($currentPage-1)*$nbElementPerPage).','.$nbElementPerPage);

            ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Group</th>
                        <th>X</th>
                        <th>Y</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($donnees = $req->fetch())
                {
                    echo '<tr>';
                    echo '<td><small>'. $donnees['id'] . '</small></td>';
                    echo '<td>'. $donnees['name'] .'</td>';

                    if(isset($donnees['id_group']) && $donnees['id_group']) {
						$group = $bdd->query('SELECT * FROM `groups` WHERE id='.$donnees['id_group']);
						if($groupData = $group->fetch()) {
							do {
								echo '<td><span class="label" style="background: '.$groupData['color'].';">'. $groupData['name'] . '</span></td>';
							} while ($groupData = $group->fetch());
						} else {
							echo '<td> --- </td>';
						}
						$group->closeCursor();
					} else {
						echo '<td> --- </td>';
					}

                    echo '<td>'. $donnees['x'] . '</td>';
                    echo '<td>'. $donnees['y'] . '</td>';
                    echo '<td>';
                        echo'<a href="?page=markers&action=edit&id='.$donnees['id'].'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i></a> ';
                        echo'<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a> ';
                    echo'</td>';
                    echo '</tr>';
                }

                ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li<?php if($currentPage<2) echo' class="disabled"'; ?>>
                        <a <?php if($currentPage<2) {} else {?> href="?page=markers&nb=<?php if($currentPage>2)echo $currentPage-1;else echo '1'; ?>" <?php } ?> aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php
                        $i = 1;
                        while ($i <= ceil($nbElement / $nbElementPerPage)) {
                            if($i == $currentPage) {
                                echo '<li class="active">';
                            } else {
                                echo '<li>';
                            }
                            echo '<a href="?page=markers&nb='.$i.'">'.$i.'</a></li>';
                            $i++;
                        }
                    ?>
                    <li<?php if($currentPage>=ceil($nbElement / $nbElementPerPage)) echo' class="disabled"'; ?>>
                        <a <?php if($currentPage>=ceil($nbElement / $nbElementPerPage)) {} else { ?> href="?page=markers&nb=<?php if($currentPage<ceil($nbElement / $nbElementPerPage)) echo $currentPage+1; else echo ceil($nbElement / $nbElementPerPage); ?>" <?php } ?> aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>