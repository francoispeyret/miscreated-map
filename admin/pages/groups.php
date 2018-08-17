
<div class="container">
    <div class="row">
        <div class="col-xs-12">

			<h3 class="page-subheading"><i class="glyphicon glyphicon-th"></i> Groups
				<a href="?page=groups&action=edit&id=new" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus-sign"></i> Add Group</a>
			</h3>
            <?php

            include('admin/core/bdd.php');
            $req = $bdd->query('SELECT * FROM `groups`');

            ?>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Color</th>
                    <th>Description</th>
                    <th>Tools</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
                {
                    echo '<tr>';
                    echo '<td><small>'. $donnees['id'] . '</small></td>';
                    echo '<td>'. $donnees['name'] . '</td>';
                    echo '<td><span class="label" style="background: '.$donnees['color'].';">'. $donnees['color'] . '</span></td>';
                    echo '<td>'. $donnees['description'] . '</td>';
                    echo '<td>';
                        echo'<a href="?page=groups&action=edit&id='.$donnees['id'].'" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i></a> ';
                        echo'<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a> ';
                    echo'</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>