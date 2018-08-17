<?php


    include('admin/core/bdd.php');

    $groupSelect = $bdd->query('SELECT * FROM `groups` WHERE id='.(int)$_GET['id']);

    $group = $groupSelect->fetch();

    if($group || $_GET['id']=='new') {
?>

        <div class="container">
            <div class="row">

                <h2 class="page-heading">Group Edit</h2>
                <form action="?page=groups&action=save" method="post">
                    <input type="hidden" name="id" value="<?php if($group) echo $group['id']; ?>">
                    <div class="form-group input-group">
                    </div>
                    <div class="row">
						<div class="col-sm-6">
							<div class="form-group input-group">
								<div class="input-group-addon">Name</div>
								<input type="text" required class="form-control" name="name" id="name" placeholder="Name" value="<?php if($group) echo $group['name']; ?>">
							</div>
						</div>
                        <div class="col-sm-6">
                            <div class="form-group input-group">
                                <div class="input-group-addon">Color</div>
                                <input type="color" required class="form-control" name="color" id="color" placeholder="0" value="<?php if($group) echo $group['color']; ?>">
                            </div>
                        </div>
                    </div>
					<div class="form-group input-group">
						<label for="description" class="">Description</label><br>
						<textarea name="description" id="description" cols="180" rows="3" class="form-control"><?php if($group) echo $group['description']; ?></textarea>
					</div>

                    <nav class="clearfix">
                        <div class="pull-left"><a href="?page=groups" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a></div>
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
                    <i class="glyphicon glyphicon-question-sign"></i> Error while retrieving the group in the database.
                </div>
            </div>
        </div>
<?php
    }
?>