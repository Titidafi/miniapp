
<div class="col-md-4" ></div>
<div id="formulaire" class="col-md-4 col-xs-12">
<form method="post" action="index.php?action=connexion">
    <fieldset>
        <legend>Connexion</legend>
        <?php show_alert($_SESSION);?>
        <div class="form-group">
       <label for="identifiant">Votre identifiant : </label><input class="form-control" type="text" id="identifiant" name="identifiant">
        </div>
        <div class="form-group">
        <label for="mdp">Votre mot de passe : </label><input type="password" id="mdp" name="mdp" class="form-control">
        </div>
        <div class="checkbox">
             <label for="rm">
                 <input class="checkbox" type="checkbox" name="rm" id="rm">Se rappeler de moi
             </label>
        </div>
        <input type="submit" class="btn btn-success btn-block" value="Connexion"  >


    </fieldset>
</form>
</div>
<div class="col-md-4"></div>
