<?php
$sql = "SELECT * FROM user WHERE login=?";
$querry = $pdo->prepare($sql);
$querry->execute($_SESSION['login']);
$line=$querry->fetch();
if ($line==false){
    header("Location:index.php?action=login");
}else{
    $_SESSION['id']=$line['id'];
    $_SESSION['login']=$line['login'];
    header("Location:index.php");

}?>

<div class="row">
    <div class="col-md-4"></div>
    <div id="formulaire" class="col-md-4 col-sm-12">
        <form method="post" action="index.php?action=creer">
            <fieldset>
                <legend>Création de compte</legend>
                <label for="identifiant">Votre identifiant : </label><input class="form-control" type="text"
                                                                            id="identifiant" name="identifiant">
                <label for="email">Votre email : </label><input type="email" id="email" name="email"
                                                                class="form-control" required>
                <label for="chooseMdp">Votre mot de passe : </label><input type="password" id="chooseMdp"
                                                                           name="chooseMdp" class="form-control"
                                                                           onkeyup="verifBis(this);">
                <label for="conf">Confirmer votre mot de passe : </label><input type="password" id="conf" name="conf"
                                                                                class="form-control"
                                                                                onkeyup="verif(this);"><br>
                <input type="submit" class="btn btn-success btn-block" value="Créer" id="valider">
                <?php
                //echo "<p class='label-danger>'";
                if (isset($_SESSION['error'])) {
                    echo "<p class='bg-danger'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']);
                }

                // echo "</p>"?>

            </fieldset>
        </form>
        <div class="col-md-4"></div>

</div>