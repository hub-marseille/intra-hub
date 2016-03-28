<!DOCTYPE html>
<html lang="en" ng-app="intraApp" id="lolwut">
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo css_url("materialize.min"); ?>"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo css_url("backofficeStyle"); ?>"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo css_url("style"); ?>"  media="screen,projection"/>
    <script type="text/javascript" src="<?php echo js_url("libraries/jquery-2.2.1.min"); ?>"></script>
    <script type="text/javascript" src="<?php echo js_url("libraries/materialize.min"); ?>"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>Hub Epitech Marseille - Backoffice</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper light-blue darken-1">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?php echo base_url()."backoffice/projects";?>">Projets</a></li>
                <?php if ($this->session->userdata('id') != null):?><li><a href="<?php echo base_url()."backoffice/home/signout";?>">Se déconnecter</a></li>
				<?php endif;?>
                <li><a href=""></a></li>
            </ul>
        </div>
    </nav>
    <?php //if ($this->session->userdata('id') != null):?>
    <div class="row">
        <ul class="side-nav fixed" style="left: 0px;" data-collapsible="accordion">
            <li id="logo"><h4>IntraHub</h4></li>
            <li id="subtitle"><h5>Backoffice</h5></li>
            <li id="profilePic"><img class="responsive-img" src="<?php echo base_url("assets/images/nopic.png"); ?>"></img></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a id="profil" class="collapsible-header  waves-effect waves-blue active">Profil</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>page profil</li>
                                <li>mon ziz</li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a id="projets" class="collapsible-header  waves-effect waves-blue">Mes Projets</a>
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
                        <a id="archives" class="collapsible-header  waves-effect waves-blue">Projets Archivés</a>
                        <div class="collapsible-body">
                            <?php echo $oldProj ?>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <?php //endif;?>

<script type="text/javascript">

    $(".singleArchive").on('click', function(event){
        var queryProj = $.ajax({
            type: "POST",
            url: base_url+"backoffice/Project/viewproject",
            data: {id: event.target.id}
        });
        queryProj.done(function(result){
            var data = $.parseJSON(result);
            document.getElementById('Center').innerHTML = "";
            document.getElementById('Center').innerHTML +=
                '<div class="row" id="name"><h2>'+data["name"]+'</h2></div>';
            document.getElementById('Center').innerHTML +=
                '<div class="row" id="main_picture"><img src="'+base_url+'assets/images/projets/'+data["main_picture"]+'"></div>';
            document.getElementById('Center').innerHTML +=
                '<div class="row" id="short_description">'+data["short_description"]+'</div>';
            document.getElementById('Center').innerHTML +=
                '<div class="row" id="description">'+data["description"]+'</div>';
        });
        queryProj.fail(function(data){
          alert("cacaprout");
        });
    });

</script>