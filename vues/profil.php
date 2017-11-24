<div class="col-md-8">
    <div class="thumbnail">
        <img src="12.png" alt="alt">
        <div class="caption">

            <?php

            $sql = "SELECT DISTINCT * FROM ecrit JOIN user ON user.id=ecrit.idAmi";
            $querry = $pdo->prepare($sql);
            $querry->execute();
            $nombre = [];

            ?>

        </div>
    </div>
</div>
<div class="col-md-4">
<?php
while ($line = $querry->fetch()) {
    array_push($nombre, $line['id']);

}
if (in_array($_GET['id'], $nombre)) {
    $sql = "SELECT DISTINCT login, user.id, etat, idUtilisateur1, idUtilisateur2 FROM user JOIN ecrit ON idAuteur=user.id JOIN lien ON ecrit.idAuteur = lien.idUtilisateur2 WHERE idUtilisateur1 =? OR idUtilisateur2=?";
    $querry = $pdo->prepare($sql);
    $querry->execute(array($_SESSION["id"],$_SESSION["id"]));
    $nbTour = 1;
    /* if(($line=$querry->fetch())==false){

     }*/
    while ($line = $querry->fetch()) {

        if ($nbTour == 1) {
            echo "<h3>" . $line["login"] . "</h3>";
            $loginUser = $line["login"];
        }
        $nbTour++;
    }
    if ($nbTour==1){

    }


} else {
    header("location:/");
}
if ($loginUser != $_SESSION["login"]) {


    ?>

    <div class="card thumbnail" style="width:'20rem';">
        <img class="card-img-top" src="12.png"  alt="img"/>
        <div class="card-body">
            <h4 class="card-title"><?php echo $loginUser;?></h4>
            <p class="card-text">Avec du texte pour dire voilà</p>
            <a href="#" class="btn btn-primary">YES</a>
        </div>
    </div>
    <?php }
?>
<h2>YES LIFE</h2 >
    <div class="card thumbnail" style="width:'20rem';">
        <img class="card-img-top" src="12.png"  alt="img"/>
        <div class="card-body">
            <h4 class="card-title">Card Title</h4>
            <p class="card-text">Avec du texte pour dire voilà</p>
            <a href="#" class="btn btn-primary">YES</a>
        </div>
    </div>
</div >
