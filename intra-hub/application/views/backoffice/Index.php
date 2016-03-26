<main class="container row">
    <div id="leftCol" class="col s2">
        <img class="responsive-img" src="<?php echo base_url("assets/images/nopic.png"); ?>"></img>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header">Profil</div>
                <div class="collapsible-body">
                    <ul>
                        <li>photo</li>
                        <li>page profil</li>
                        <li>mon ziz</li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header">Projets en cours</div>
                <div class="collapsible-body">
                    <ul>
                        <li>A remplacer</li>
                        <li>par un truc</li>
                        <li>en lien avec</li>
                        <li>la bdd</li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header">Projets archivés</div>
                <div class="collapsible-body">
                    <?php echo $oldProj ?>
                </div>
            </li>
        </ul>
    </div>
    <div id="Center" class="col s8 valign">
        <p>EN CHANTIER</p>
    </div>
    <div id="RightCol" class="col s2">
        <p>Espace reservé, pub, vidéos coquines, etc...</p>
    </div>
</main>