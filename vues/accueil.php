<?php
    if (isset($_SESSION["id"]) && isset($_SESSION["login"])) { ?>
        <div id="fil" class="col-md-8">

                <h2>Fil d'actualité</h2>
                <hr>
                <dl>
                    <form action="index.php?action=envoyer" method="POST">
                        
                    <textarea id="generalInput" name="statut" class="input-lg" placeholder="Écrivez votre statut ..."></textarea>
                    <input type="file" name="fichier" class="custom-file-input">
                    <input type="submit" name="submit" value="Envoyer" class="btn btn-success btn-lg btn-block">

                    </form>

                    <hr>

                    <?php
                    echo quelEtat($pdo,"1","6")[1];
                    $nom = [];
                    $sql = "SELECT DISTINCT * FROM user";
                    $querry = $pdo->prepare($sql);
                    $querry->execute();
                    while ($line = $querry->fetch()) {
                        $nom[$line["id"]] = $line["login"];
                    }


                    $sql = "SELECT login,ecrit.id, titre, contenu, dateEcrit, idAuteur, idAmi FROM user JOIN ecrit ON idAuteur=user.id JOIN lien ON ecrit.idAuteur = lien.idUtilisateur2  WHERE etat = 'amis' AND (idUtilisateur1=? OR idUtilisateur2=?)ORDER BY dateEcrit DESC";
                    $querry = $pdo->prepare($sql);
                    $querry->execute(array($_SESSION['id'],$_SESSION['id']));

                    while ($line = $querry->fetch()) {
                        echo "<div class='panel panel-primary'>";
                        echo "<div class='panel-heading'>" . $line["titre"] ;
                        if($line['idAuteur']==$_SESSION['id']){
                            echo "<button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                        }
                        echo "</div>";
                        echo "<div class='panel-body'>" . $line["contenu"] . "</div>";

                        if ($line["idAuteur"] == $line["idAmi"]) {
                            echo "<div class='panel-footer'>Écrit par <a href='index.php?action=profil&id=" . $line["idAuteur"] . "'>" . $line["login"] . "</a> <br />Le " . date('d-m-Y à H:i', strtotime($line["dateEcrit"])) . "</div>";
                        } else {
                            echo "<div class='panel-footer'>Écrit par <a href='index.php?action=profil&id=" . $line["idAuteur"] . "'>" . $line["login"] . "</a> sur le mur de <a href='index.php?action=profil&id=".$line["idAmi"]."'>" .$nom[$line["idAmi"]]." </a><br />Le ". date('d-m-Y à H:i', strtotime($line["dateEcrit"])) . "</div>";
                        }
                        echo "</div>";
                    }
                    ?>
                </dl>
            </div>



        <?php

    }

    ?>
    <!--<p class='text-justify'>lorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssoulorem Ipssou</p>-->
