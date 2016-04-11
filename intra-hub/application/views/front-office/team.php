<link type="text/css" rel="stylesheet" href="<?php echo css_url("team");?>"  media="screen,projection"/>
<div class="section scrollspy" id="team">
    <div class="container">
        <h2 class="header text_b"> L'équipe </h2>
        <div class="row">
			<?php $nb_members = count($members);?>
			<?php for ($i = 0; $i < $nb_members; $i++):?>
            <div class="col s12 m3">
                <div class="card card-avatar">
                    <div class="waves-effect waves-block waves-light">
                        <img class="activator" src="<?php if($members[$i]['img'] == '') echo img_url("users/anonymous.png");else echo img_url($members[$i]['img']);?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?php echo $members[$i]['username']?> <br/>
                            <small><em><a class="red-text text-darken-1" href="#"><?php echo $members[$i]['role']?></a></em></small></span>
                        <p>
                            <a class="blue-text text-lighten-2" href="https://www.facebook.com/<?php echo $members[$i]['facebook']?>">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://twitter.com/<?php echo $members[$i]['twitter']?>">
                                <i class="fa fa-twitter-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://plus.google.com/u/0/+<?php echo $members[$i]['gplus']?>">
                                <i class="fa fa-google-plus-square"></i>
                            </a>
                            <a class="blue-text text-lighten-2" href="https://www.linkedin.com/in/<?php echo $members[$i]['linkedin']?>">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
		<?php endfor; ?>
        </div>
    </div>
</div>
