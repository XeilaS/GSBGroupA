<?php

session_start();
$idVisiteur = 7;


require '../../class/gsb.php';
$db = gsb::getInstance();

// récupération des données
$nbNuitee = strtoupper($_POST["nbNuitee"]);
$nbRepas = strtoupper($_POST["nbRepas"]);
$nbEtape = $_POST["nbEtape"];
$nbKm = $_POST["nbKilometres"];

// requête d'ajout
$sql = <<<EOD
    insert into FicheFrais (nbNuitee , nbRepas,nbEtape,nbKm)
           values (:nbNuitee, :nbRepas, :nbEtape, :nbKilometres);
EOD;
$curseur = $db->prepare($sql);
$curseur->bindParam('nbNuitee', $nbNuitee);
$curseur->bindParam('nbRepas', $nbRepas);
$curseur->bindParam('nbEtape', $nbEtape);
$curseur->bindParam('nbKilometres', $nbKm);
$curseur->execute();
echo 0;