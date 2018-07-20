<?php


    include('admin/core/bdd.php');

    $markerSelect = $bdd->query('SELECT * FROM `markers` WHERE id='.(int)$_GET['id']);

    $marker = $markerSelect->fetch();

    if($marker || $_GET['id']=='new') {
?>

        <div class="container">
            <div class="row">

                <h2 class="page-heading">Marker Edit</h2>
                <form action="?page=markers&action=save" method="post">
                    <div class="col-sm-6">
                        <input type="hidden" name="id" value="<?php if($marker) echo $marker['id']; ?>">
                        <div class="form-group input-group">
                            <div class="input-group-addon">Name</div>
                            <input type="text" required class="form-control" name="name" id="name" placeholder="Name" value="<?php if($marker) echo $marker['name']; ?>">
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group input-group">
                                    <div class="input-group-addon">X</div>
                                    <input type="text" required class="form-control" name="x" id="x" placeholder="0" value="<?php if($marker) echo $marker['x']; ?>">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group input-group">
                                    <div class="input-group-addon">Y</div>
                                    <input type="text" required class="form-control" name="y" id="y" placeholder="0" value="<?php if($marker) echo $marker['y']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php

                            $groups = $bdd->query('SELECT * FROM `groups`');

                            ?>
                            <label>Group</label>
                            <select name="group" id="" class="form-control form-inline">
                                <?php
                                while ($donnees = $groups->fetch())
                                {
                                    echo '<option value="'.$donnees['id'].'"';
                                    if ($donnees['id'] == $marker['id_group'])
                                        echo ' selected="selected"';
                                    echo '>'.$donnees['name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="map-holder">
                        </div>

                        <script type="text/javascript" src="assets/js/jquery.js"></script>
                        <script type="text/javascript" src="assets/js/p5.min.js"></script>
                        <script type="text/javascript" src="assets/js/marker.js"></script>
                        <script type="text/javascript" src="assets/js/map.js"></script>

                        <script type="text/javascript">
                            $(document).ready(function(){
                                $(document).on('map-init',function(){

                                });
                                $(document).on('map-move',function(){
                                    $('#x').val(client.pos.x);
                                    $('#y').val(client.pos.y);
                                });
                            });
                        </script>
                    </div>

                    <nav class="clearfix col-sm-12">
                        <div class="pull-left"><a href="?page=markers" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></div>
                        <div class="pull-right"><button type="submit" class="btn btn-primary">Save <i class="glyphicon glyphicon-ok"></i></button></div>
                    </nav>
                </form>
            </div>
        </div>

<?php
    } else {
?>
        <div class="container">
            <div class="row">
                <div class="alert alert-warning">
                    <i class="glyphicon glyphicon-question-sign"></i> Error while retrieving the marker in the database.
                </div>
            </div>
        </div>
<?php
    }
?>