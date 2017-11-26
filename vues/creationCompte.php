<div class="col-md-4"></div>
<div id="formulaire" class="col-md-4 col-sm-12">
    <form method="post" action="index.php?action=creer">
        <fieldset>
            <legend>Création de compte</legend>
            <?php show_alert($_SESSION);?>
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

        </fieldset>
    </form>
</div>
<div class="col-md-4"></div>