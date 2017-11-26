<?php

$sql = "SELECT * FROM user WHERE login=?";
$querry = $pdo->prepare($sql);
$querry -> execute(array($_POST['identifiant']));
$line= $querry->fetch();
if ($line==false){
    $_SESSION["error"] = "";
    $sql = "INSERT INTO user (login, mdp, email) VALUES (?,PASSWORD(?),?)";
    $querry = $pdo->prepare($sql);
    $querry -> execute(array($_POST['identifiant'],$_POST['chooseMdp'],$_POST['email']));
    header("location:index.php?action=login");

}else{
    set_alert("Cet identifiant est déja prit !","danger");
    header("location:index.php?action=creationCompte");
}
