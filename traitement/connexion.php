<?php
$sql = "SELECT * FROM user WHERE login=? AND mdp=PASSWORD(?)";
$querry = $pdo->prepare($sql);
$querry->execute(array($_POST['identifiant'],$_POST['mdp']));
$line=$querry->fetch();
if ($line==false){
    set_alert("Vous avez entrer de mauvais <b>identifiants</b> !","warning");
header("Location:index.php?action=login");
}else{
    $_SESSION['id']=$line['id'];
    $_SESSION['login']=$line['login'];
    header("Location:index.php");

}