
<div class="container">
    <div class="row">
        <div class="col-xs-12">
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
                </tr>
                </thead>
                <tbody>
                <?php
                while ($donnees = $req->fetch())
                {
                    echo '<tr>';
                    echo '<td><small>'. $donnees['id'] . '</small></td>';
                    echo '<td>'. $donnees['name'] . '</td>';
                    echo '<td><span class="label" style="background: '.$donnees['color'].';">'. $donnees['color'] . '</span></td>';
                    echo '<td>'. $donnees['description'] . '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>