<?php

// Obtenez le chemin absolu du répertoire du script
$repertoireActuel = __DIR__;
$fromController = dirname(__DIR__, levels: 3);

///home/vol1000_8/infinityfree.com/if0_35808383/htdocs/storage
///home/vol1000_8/infinityfree.com/if0_35808383/htdocs/.laravel_app/app/http/controller

// Affichez le répertoire d'exécution
//echo 'Le script s\'exécute depuis le répertoire : ' . $repertoireActuel;
//echo 'Le script s\'exécute depuis le répertoire : ' . $repertoireParent;


//// Créez deux dossiers
//$nomDossier1 = 'dossier1';
//$nomDossier2 = 'dossier2';
//
//$dossier1 = $repertoireActuel . '/' . $nomDossier1;
//$dossier2 = $repertoireActuel . '/' . $nomDossier2;
//
//// Vérifiez si les dossiers n'existent pas déjà
//if (!file_exists($dossier1)) {
//    mkdir($dossier1);
//}
//
//if (!file_exists($dossier2)) {
//    mkdir($dossier2);
//}
//
//// Déterminez le nom du lien symbolique
//$nomLienSymbolique = 'lien_symbole';
//
//// Créez le chemin absolu complet vers le lien symbolique
//$cheminLienSymbolique = $repertoireActuel . '/' . $nomLienSymbolique;
//
//// Vérifiez si le lien symbolique n'existe pas déjà
//if (!file_exists($cheminLienSymbolique)) {
//    // Créez le lien symbolique entre les deux dossiers
//    symlink($dossier1, $cheminLienSymbolique);
//    echo 'Le lien symbolique a été créé avec succès.';
//} else {
//    echo 'Le lien symbolique existe déjà.';
//}
//
