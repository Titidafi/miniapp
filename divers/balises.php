<?php

function gras($v) {
    return "<b>$v</b>";

}

function options($attributes) {
    $o = "";
    foreach ($attributes as $attr => $v) {
        $o = $o . "$attr='$v'";
    }
    return $o;
}

function lien($link, $texte, $attributes = array()) {
    $o = "";
    foreach ($attributes as $attr => $v) {
        $o = $o . "$attr='$v'";
    }
    return "<a href='$link' $o>$texte</a>";
}

function item($contenu, $attributes = array()) {
    $o = options($attributes);
    return "<li $o>$contenu</li>";
}

function table($table2Dim) {
    $tmp = "";
    foreach ($table2Dim as $table1Dim) {  // Je parcours ma table à 2 Dim, chaque entréee est
        // une table à 1 dim
        $tmp = $tmp . "<tr>"; // J'ai donc une nouvelle ligne
        foreach ($table1Dim as $cellule) { // Chaque entrée de la table à 1 dim est une donnée
            $tmp = $tmp . "<td>$cellule</td>"; // Je la met entre td!
        }

        $tmp = $tmp . "</tr>"; // Je dois fermer la ligne

    }

    return $tmp;
}

function message($msg) {
    $_SESSION['info'] = $msg;
}

function activeLink($type){
    if(isset($_GET['action'])) {
        if ($_GET['action'] == $type) {
            echo 'active';
        } else {
        }
    }else{
    }
}
function AfficherAmis($pdo,$idUtilisateur){
    $resultat ="";
    $sql = "SELECT DISTINCT  login, avatar, user.id FROM user JOIN lien ON lien.idUtilisateur1 WHERE etat = 'amis' and (idUtilisateur2=? OR idUtilisateur1=?) ORDER BY login"; //requête SQL
    $querry = $pdo->prepare($sql);
    $querry -> execute(array($idUtilisateur,$idUtilisateur));
    while ($line = $querry->fetch()) {

        if($line["login"]!=$_SESSION["login"]){
            $resultat .= "<div class='panel panel-default'>
            <a href='/profil-".$line["id"]."'><div class='panel-heading nom-amis'>
            <img src='12.png' alt='icon' height='40px'>";
            $resultat .= "<span></span>".$line['login']."</a><span></a>";
            $resultat .= "</div></div>";
        }
    }
return $resultat;
}
function nombreAmis($pdo,$idUtilisateur){
    $resultat =0;
    $sql = "SELECT DISTINCT  login FROM user JOIN lien ON lien.idUtilisateur1 WHERE etat = 'amis' and (idUtilisateur2=? OR idUtilisateur1=?) ORDER BY login"; //requête SQL
    $querry = $pdo->prepare($sql);
    $querry -> execute(array($idUtilisateur,$idUtilisateur));
    while ($line = $querry->fetch()) {

        if($line["login"]!=$_SESSION["login"]){
          $resultat = $resultat+1;
        }
    }
    return $resultat;
}
function quelEtat($pdo,$connected_user,$id_user2){
    $sql = "SELECT idUtilisateur2, idUtilisateur1, etat FROM user JOIN lien ON user.id = lien.idUtilisateur2  WHERE  (idUtilisateur1=? AND idUtilisateur2=?) OR (idUtilisateur2=? AND idUtilisateur1=?)";
    $querry = $pdo->prepare($sql);
    $querry->execute(array($connected_user,$id_user2,$connected_user,$id_user2));
    $line= $querry->fetch();
    if ($line!=false){
        //actions à faire
        return   array($line["etat"],$line["idUtilisateur1"],$line["idUtilisateur2"]);

    }else{
        return "na";
    }

}
function affichage_bouton_profil($pdo,$connected_user,$id_user2){
    if(quelEtat($pdo,$connected_user,$id_user2) == "na"){
        echo "<a href='index.php?action=ajouter&id=$id_user2' class='btn btn-primary'>Demander en ami</a>";
    }
    if(quelEtat($pdo,$connected_user,$id_user2) == "amis"){

        echo "<a href='index.php?action=ajouter&id=$id_user2' class='btn btn-primary'>Supprimer</a>";
    }
}













