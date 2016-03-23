<main>
    <div id="EditProject">
        <h1>Edit Project </h1>
        <?php echo validation_errors(); ?>
        <form name="editproject "method="post" action="<?php echo "/backoffice/projects/".$id."/edit/"; ?>" />
        <input id="name" name="name" value="<?php echo $name; ?>" type="text"><br />
        <label for="main_picture">Main Picture</label><br />
        <img src="<?php echo "/assets/images/projets/".$main_picture; ?>" >
        <input id="main_picture" name="main_picture" type="file" accept="image/*" value="<?php echo "/assets/images/projets/".$main_picture; ?>"><br />
        <textarea name="description" placeholder="project description" ><?php echo $description; ?></textarea><br />
        <textarea name="short_description" placeholder="description"><?php echo $short_description; ?></textarea><br />
        <input class="waves-effect waves-light btn-large" type="submit" value="Submit"/>
        </form>
        <a class="waves-effect waves-light btn-large" href="<?php echo base_url()."backoffice/projects"?>">Go back to projects</a>
    </div>
</main>
