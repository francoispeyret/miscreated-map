<?php


    include('admin/core/bdd.php');

    if(isset($_POST['id'])) {

        if($_POST['id']=='') {
            $markerUpdate = $bdd->prepare('INSERT INTO `markers`(`id`, `name`, `x`, `y`, `id_group`)
                                      VALUES (:id, :marker_name, :x, :y, :id_group)')or die(print_r($bdd->errorInfo()));

            $markerUpdate->execute(array(
                'id' => null,
                'marker_name' => $_POST['name'],
                'x' => $_POST['x'],
                'y' => $_POST['y'],
                'id_group' => $_POST['group'],
            ));
        } else {
            $markerUpdate = $bdd->prepare('UPDATE `markers`
                                      SET `name` = :marker_name,
                                            `x` = :x, `y` = :y,
                                            `id_group` = :id_group
                                      WHERE `markers`.`id` = :id')or die(print_r($bdd->errorInfo()));

            $markerUpdate->execute(array(
                'id' => $_POST['id'],
                'marker_name' => $_POST['name'],
                'x' => $_POST['x'],
                'y' => $_POST['y'],
                'id_group' => $_POST['group'],
            ));
        }

        if($markerUpdate) {
            ?>

            <div class="container">
                <div class="row">
                    <h2 class="page-heading">Marker Save</h2>
                    <div class="alert alert-success">
                        <i class="glyphicon glyphicon-ok-sign"></i> Marker #<?php echo $_POST['id']; ?> is correctly saved.
                    </div>
                    <nav class="clearfix">
                        <div class="pull-left"><a href="?page=markers" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></div>
                    </nav>

                </div>
            </div>


            <?php

        } else {

        ?>

        <div class="container">
            <div class="row">

                <h2 class="page-heading">Marker Save</h2>

                <div class="alert alert-warning">
                    <i class="glyphicon glyphicon-question-sign"></i> Error while writing the marker in the database.
                </div>
                <nav class="clearfix">
                    <div class="pull-left"><a href="?page=markers" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></div>
                </nav>
            </div>
        </div>

        <?php

        }

    } else {
        ?>

        <div class="container">
            <div class="row">

                <h2 class="page-heading">Marker Save</h2>

                <div class="alert alert-warning">
                    <i class="glyphicon glyphicon-question-sign"></i> Error during saving marker.
                </div>
                <nav class="clearfix">
                    <div class="pull-left"><a href="?page=markers" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></div>
               </nav>
            </div>
        </div>

        <?php
    }

?>