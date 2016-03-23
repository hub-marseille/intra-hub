<h3><?php echo $name; ?></h3>
<img src="<?php echo "/assets/images/projets/".$main_picture; ?>" ><br />
<text><?php echo $short_description; ?></text><br />
<text><?php echo $description;?></text><br />
<a href="<?php echo site_url('backoffice/projects/'.$id.'/edit'); ?>">Edit project</a>
<a href="<?php echo site_url('backoffice/Project/delete/'.$id); ?>">Delete project</a>
