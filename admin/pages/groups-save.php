<?php


    include('admin/core/bdd.php');

    if(isset($_POST['id'])) {

        if($_POST['id']=='') {
            $groupUpdate = $bdd->prepare('INSERT INTO `groups`(`id`, `name`, `color`, `description`)
                                      VALUES (:id, :group_name, :color, :description)')or die(print_r($bdd->errorInfo()));

            $groupUpdate->execute(array(
                'id' => null,
                'group_name' => $_POST['name'],
                'color' => $_POST['color'],
                'description' => $_POST['description'],
            ));
        } else {
            $groupUpdate = $bdd->prepare('UPDATE `groups`
                                      SET `name` = :group_name,`color` = :color, `description` = :description
                                      WHERE `groups`.`id` = :id')or die(print_r($bdd->errorInfo()));

            $groupUpdate->execute(array(
                'id' => $_POST['id'],
				'group_name' => $_POST['name'],
				'color' => $_POST['color'],
				'description' => $_POST['description'],
            ));
        }

        if($groupUpdate) {
            ?>

            <div class="container">
                <div class="row">
                    <h2 class="page-heading">Group Save</h2>
                    <div class="alert alert-success">
                        <i class="glyphicon glyphicon-ok-sign"></i> Group #<?php echo $_POST['id']; ?> is correctly saved.
                    </div>
                    <nav class="clearfix">
                        <div class="pull-left"><a href="?page=groups" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></div>
                    </nav>

                </div>
            </div>


            <?php

        } else {

        ?>

        <div class="container">
            <div class="row">

                <h2 class="page-heading">Group Save</h2>

                <div class="alert alert-warning">
                    <i class="glyphicon glyphicon-question-sign"></i> Error while writing the marker in the database.
                </div>
                <nav class="clearfix">
                    <div class="pull-left"><a href="?page=groups" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></div>
                </nav>
            </div>
        </div>

        <?php

        }

    } else {
        ?>

        <div class="container">
            <div class="row">

                <h2 class="page-heading">Group Save</h2>

                <div class="alert alert-warning">
                    <i class="glyphicon glyphicon-question-sign"></i> Error during saving marker.
                </div>
                <nav class="clearfix">
                    <div class="pull-left"><a href="?page=groups" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></div>
               </nav>
            </div>
        </div>

        <?php
    }

?>