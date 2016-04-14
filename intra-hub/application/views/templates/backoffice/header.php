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

<script type="text/javascript">

    $(".singleArchive").on('click', function(event){
        var queryProj = $.ajax({
            type: "POST",
            url: base_url+"backoffice/Project/viewproject",
            data: {id: event.target.id}
        });
        queryProj.done(function(result){
            var data = $.parseJSON(result);
            document.getElementById('Center').innerHTML = data;
        });
    });

    $(".singleArchivePerso").on('click', function(event){
        var queryProj = $.ajax({
            type: "POST",
            url: base_url+"backoffice/Project/viewprojectperso",
            data: {id: event.target.id}
        });
        queryProj.done(function(result){
            var data = $.parseJSON(result);
            document.getElementById('Center').innerHTML = data;
        });
    });

</script>