<?php


header('Content-Type: application/json');

if(!isset($_GET['type']) || (isset($_GET['type']) && $_GET['type']=='markers')) {

    include('admin/core/bdd.php');
    $req = $bdd->query('SELECT * FROM `markers`');
    $data = [];
    $i = 0;
    while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
        if($donnees['id_group']) {
            $group = $bdd->query('SELECT `name` FROM `groups` WHERE `id`='.$donnees['id_group']);
            $donnees['id_group'] = $group->fetch(PDO::FETCH_ASSOC)['name'];
        }
        $data[$i] = $donnees;
        $i++;
    }
    echo json_encode($data);

} else if (isset($_GET['type']) && $_GET['type']=='groups') {

    include('admin/core/bdd.php');
    $req = $bdd->query('SELECT * FROM `groups`');
    $data = [];
    $i = 0;
    while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
        $data[$i] = $donnees;
        $i++;
    }
    echo json_encode($data);

}